<?php

namespace App\Models;

use App\Support\Exceptions\DatabaseException;
use App\Support\Models\ModelProvider;

/**
 * @property User|null $model
 */
class UserProvider extends ModelProvider
{
    public function modelClass(): string
    {
        return User::class;
    }

    /**
     * @throws DatabaseException
     */
    public function system(): ?User
    {
        return $this->firstByKey(User::SYSTEM_ID);
    }

    /**
     * @throws DatabaseException
     */
    public function owner(): ?User
    {
        return $this->firstByKey(User::OWNER_ID);
    }
}