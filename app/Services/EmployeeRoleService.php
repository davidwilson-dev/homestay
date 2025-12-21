<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;

class EmployeeRoleService
{
    /**
     * Map position -> roles (array)
     */
    public function mapRolesByPosition(string $position): array
    {
        // Map position to roles
        $positionRoleMap = [
            'manager'      => ['manager'],
            'accountant'   => ['staff'],
            'receptionist' => ['staff'],
            'cleaner'      => ['staff'],
            'security'     => ['staff'],
        ];

        // Assign roles based on position
        return $positionRoleMap[$position] ?? ['staff'];
    }

    /**
     * Assign roles based on positions
     */
    public function syncUserRolesByPosition(User $user, string $position): void
    {
        $roles = $this->mapRolesByPosition($position);

        $roleIds = Role::whereIn('name', $roles)->pluck('id');

        $user->roles()->sync($roleIds);
    }
}
