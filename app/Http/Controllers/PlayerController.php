<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(
        private PlayerService $playerService
    ) {}

    public function index(Request $request)
    {
        $search = $request->query('search');
        $user = $request->user();

        if ($search) {
            $players = $this->playerService->searchPlayers($user, $search);
        } else {
            $players = $this->playerService->getAllPlayers($user);
        }

        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(StorePlayerRequest $request)
    {
        $this->playerService->createPlayer($request->validated(), $request->user());

        return redirect('/players')->with('success', 'Player created successfully!');
    }

    public function edit(Player $player)
    {
        $this->authorizeWebPlayer($player);

        return view('players.edit', compact('player'));
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $this->authorizeWebPlayer($player);

        $this->playerService->updatePlayer($player, $request->validated());

        return redirect('/players')->with('success', 'Player updated successfully!');
    }

    public function destroy(Player $player)
    {
        $this->authorizeWebPlayer($player);

        $this->playerService->deletePlayer($player);

        return redirect('/players')->with('success', 'Player deleted successfully!');
    }

    private function authorizeWebPlayer(Player $player): void
    {
        $user = auth()->user();

        if ($player->user_id === null) {
            return;
        }

        abort_unless(
            $user !== null && (int) $user->id === (int) $player->user_id,
            403
        );
    }
}
