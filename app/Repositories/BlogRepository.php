<?php

namespace App\Repositories;

use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true)
    {
        $blogs = Blog::filter()->select($cols)->orderByDesc('created_at');

        if (count($relations)) {
            $blogs = $blogs->with($relations);
        }

        if ($paginate) {
            return $blogs->paginate();
        }

        return $blogs->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Blog::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {

            $slug = Str::slug($data['title']['en'].'-'.time());

            $data['slug'] = $slug;

            $blog = Blog::create($data);

            if (request()->hasFile('file')) {
                $blog->addMediaFromRequest('file')
                    ->toMediaCollection('image');
            }
        });
    }

    public function update(Blog $blog, array $data)
    {
        DB::transaction(function () use ($data, $blog) {
            $blog->update($data);

            if (request()->hasFile('file')) {
                $blog->addMediaFromRequest('file')
                    ->toMediaCollection('image');
            }

        });
    }

    public function delete(Blog $blog)
    {
        return $blog->delete();
    }
}
