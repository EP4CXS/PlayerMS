<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Services\PlayerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiPlayerController extends Controller
{
    public function __construct(
        private PlayerService $playerService
    ) {}

    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $perPage = (int) $request->query('per_page', 15);

        if ($request->has('search')) {
            $players = $this->playerService->searchPlayers($user, (string) $request->search);

            return $this->successResponse($players);
        }

        $players = $perPage > 0
            ? $this->playerService->getPaginatedPlayers($user, $perPage)
            : $this->playerService->getAllPlayers($user);

        return $this->successResponse($players);
    }

    public function store(StorePlayerRequest $request): JsonResponse
    {
        $this->authorize('create', Player::class);

        $player = $this->playerService->createPlayer($request->validated(), $request->user());

        return response()->json(['message' => 'Player created successfully'], 201);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $player = $this->playerService->getPlayerById($request->user(), $id);

        if (! $player) {
            return $this->notFoundResponse();
        }

        $this->authorize('view', $player);

        return $this->successResponse($player);
    }

    public function update(UpdatePlayerRequest $request, int $id): JsonResponse
    {
        $player = $this->playerService->getPlayerById($request->user(), $id);

        if (! $player) {
            return $this->notFoundResponse();
        }

        $this->authorize('update', $player);

        $updatedPlayer = $this->playerService->updatePlayer($player, $request->validated());

        return $this->updatedResponse($updatedPlayer);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        $player = $this->playerService->getPlayerById($request->user(), $id);

        if (! $player) {
            return $this->notFoundResponse();
        }

        $this->authorize('delete', $player);

        $this->playerService->deletePlayer($player);

        return $this->deletedResponse();
    }
}
