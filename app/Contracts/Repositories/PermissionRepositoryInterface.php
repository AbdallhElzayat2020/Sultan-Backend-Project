<?php

namespace App\Contracts\Repositories;

interface PermissionRepositoryInterface
{
    public function getAll(array $cols = ['*']);

    public function getById(int $id, array $cols = ['*']);
}
