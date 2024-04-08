<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);

        if ($user) {
            $user->update($data);
            return $user;
        }

        return null;
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return $user;
        }

        return null;
    }
}
