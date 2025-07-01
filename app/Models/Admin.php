<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;

class Admin extends Authenticatable implements FilamentUser, HasAvatar
{
    protected $fillable = ['username', 'email', 'name', 'password', 'role'];
    protected $hidden = ['password'];

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            // Panel Trash2Move hanya untuk role ceoT2m & trash2move
            'trash2move' => in_array($this->role, ['ceoT2m', 'trash2move']),

            // Panel Ecoahto hanya untuk role ceoEco & ecoahto
            'ecoahto'    => in_array($this->role, ['ceoEco', 'ecoahto']),

            default      => false, 
        };
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return null;
    }
}
