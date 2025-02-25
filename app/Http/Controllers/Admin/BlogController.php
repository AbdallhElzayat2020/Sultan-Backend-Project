<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\BlogRepositoryInterface;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct(private BlogRepositoryInterface $blogRepository)
    {
        $this->middleware('can:create-blogs')->only(['create', 'store']);
        $this->middleware('can:view-blogs')->only(['index', 'show']);
        $this->middleware('can:update-blogs')->only(['edit', 'update']);
        $this->middleware('can:delete-blogs')->only(['destroy']);
    }

    public function index()
    {
        $blogs = $this->blogRepository->getAll(relations: [
            'author:id,name',
        ]);

        return view('dashboard.pages.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.pages.blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        try {
            $this->blogRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.blogs.index');
    }

    public function show(Blog $blog)
    {
        return view('dashboard.pages.blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.pages.blog.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            $this->blogRepository->update($blog, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        try {
            $this->blogRepository->delete($blog);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.blogs.index');
    }

    public function updateStatus(Blog $blog)
    {
        try {
            $status = $blog->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;

            $blog->update([
                'status' => $status,
            ]);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }
}
