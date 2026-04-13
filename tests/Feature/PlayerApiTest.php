<?php

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function bearer(User $user): array
{
    $token = $user->createToken('test')->plainTextToken;

    return [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ];
}

test('player routes return 401 without bearer token', function () {
    $this->getJson('/api/v1/players')->assertUnauthorized();
    $this->postJson('/api/v1/players', [
        'name' => 'X',
        'price' => 1,
    ])->assertUnauthorized();
    $this->getJson('/api/v1/players/1')->assertUnauthorized();
    $this->putJson('/api/v1/players/1', [
        'name' => 'Y',
        'price' => 2,
    ])->assertUnauthorized();
    $this->deleteJson('/api/v1/players/1')->assertUnauthorized();
});

test('authenticated user can create and list own players', function () {
    $user = User::factory()->create();

    $create = $this->withHeaders(bearer($user))->postJson('/api/v1/players', [
        'name' => 'Signed Athlete',
        'price' => 1200,
    ]);

    $create->assertCreated();
    expect($create->json('data.user_id'))->toBe($user->id);

    $list = $this->withHeaders(bearer($user))->getJson('/api/v1/players');

    $list->assertOk();
    $data = $list->json('data.data') ?? $list->json('data');
    expect(collect($data)->pluck('name')->all())->toContain('Signed Athlete');
});

test('authenticated user can show update and delete own player', function () {
    $user = User::factory()->create();
    $player = Player::factory()->for($user)->create([
        'name' => 'Original',
        'price' => 100,
    ]);

    $this->withHeaders(bearer($user))
        ->getJson("/api/v1/players/{$player->id}")
        ->assertOk()
        ->assertJsonPath('data.name', 'Original');

    $this->withHeaders(bearer($user))
        ->putJson("/api/v1/players/{$player->id}", [
            'name' => 'Updated',
            'price' => 200,
        ])
        ->assertOk()
        ->assertJsonPath('data.name', 'Updated');

    $this->withHeaders(bearer($user))
        ->deleteJson("/api/v1/players/{$player->id}")
        ->assertOk();

    expect(Player::query()->whereKey($player->id)->exists())->toBeFalse();
});

test('user cannot access another users player through the api', function () {
    $owner = User::factory()->create();
    $intruder = User::factory()->create();
    $player = Player::factory()->for($owner)->create();

    $this->withHeaders(bearer($intruder))
        ->getJson("/api/v1/players/{$player->id}")
        ->assertNotFound();

    $this->withHeaders(bearer($intruder))
        ->putJson("/api/v1/players/{$player->id}", [
            'name' => 'Hacked',
            'price' => 1,
        ])
        ->assertNotFound();

    $this->withHeaders(bearer($intruder))
        ->deleteJson("/api/v1/players/{$player->id}")
        ->assertNotFound();

    expect(Player::query()->whereKey($player->id)->exists())->toBeTrue();
});

test('player index only returns the authenticated users players', function () {
    $alice = User::factory()->create();
    $bob = User::factory()->create();
    Player::factory()->for($alice)->create(['name' => 'Alice Only']);
    Player::factory()->for($bob)->create(['name' => 'Bob Only']);

    $response = $this->withHeaders(bearer($alice))->getJson('/api/v1/players?per_page=0');

    $response->assertOk();
    $names = collect($response->json('data'))->pluck('name')->all();
    expect($names)->toContain('Alice Only')->not->toContain('Bob Only');
});
