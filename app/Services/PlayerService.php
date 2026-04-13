<?php

namespace App\Services;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerService
{
    /**
     * @return Builder<Player>
     */
    private function scopedQuery(?User $forUser): Builder
    {
        $query = Player::query()->orderBy('id', 'desc');

        if ($forUser === null) {
            $query->whereNull('user_id');
        } else {
            $query->where('user_id', $forUser->id);
        }

        return $query;
    }

    public function getAllPlayers(?User $forUser = null): Collection
    {
        return $this->scopedQuery($forUser)->get();
    }

    public function getPaginatedPlayers(?User $forUser, int $perPage = 15): LengthAwarePaginator
    {
        return $this->scopedQuery($forUser)->paginate($perPage);
    }

    public function getPlayerById(?User $forUser, int $id): ?Player
    {
        return $this->scopedQuery($forUser)->whereKey($id)->first();
    }

    public function createPlayer(array $data, ?User $forUser = null): Player
    {
        $payload = $data;
        if ($forUser !== null) {
            $payload['user_id'] = $forUser->id;
        }

        return Player::create($payload);
    }

    public function updatePlayer(Player $player, array $data): Player
    {
        $player->update($data);

        return $player->fresh();
    }

    public function deletePlayer(Player $player): bool
    {
        return $player->delete();
    }

    public function searchPlayers(?User $forUser, string $search): Collection
    {
        return $this->scopedQuery($forUser)
            ->where('name', 'like', "%{$search}%")
            ->get();
    }
}
