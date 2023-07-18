<?php

namespace App\Repositories\backend;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Role\RoleCreated;
use App\Events\Backend\Role\RoleUpdated;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * @param array $data
     *
     * @return Role
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data): Role
    {
        // Make sure it doesn't already exist
        if ($this->roleExists($data['name'])) {
            throw new GeneralException('A role already exists with the name ' . e($data['name']));
        }
        return DB::transaction(function () use ($data) {
            $role = parent::create(['name' => strtolower($data['name'])]);
            if ($role) {
                event(new RoleCreated($role));
                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
        });
    }

    /**
     * @param Role $role
     * @param array $data
     *
     * @return mixed
     * @throws \Throwable
     * @throws GeneralException
     */
    public function update(Role $role, array $data)
    {
        if ($role->isAdmin()) {
            throw new GeneralException('You can not edit the administrator role.');
        }
        // If the name is changing make sure it doesn't already exist
        if ($role->name !== strtolower($data['name'])) {
            if ($this->roleExists($data['name'])) {
                throw new GeneralException('A role already exists with the name ' . $data['name']);
            }
        }
        return DB::transaction(function () use ($role, $data) {
            $role->update([
                'name' => strtolower($data['name']),
            ]);
            event(new RoleUpdated($role));
            return $role;
        });
    }

    protected function roleExists($name): bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
