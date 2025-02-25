<?php

namespace App\Contracts\Repositories;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Blog $blog, array $data);

    public function delete(Blog $blog);
}
