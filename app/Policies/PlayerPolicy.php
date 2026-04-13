<?php

namespace App\Policies;

use App\Models\Player;
use App\Models\User;

class PlayerPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Player $player): bool
    {
        return $player->user_id !== null && (int) $player->user_id === (int) $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Player $player): bool
    {
        return $this->view($user, $player);
    }

    public function delete(User $user, Player $player): bool
    {
        return $this->view($user, $player);
    }
}
