<?php

namespace App\Repositories;

use App\Contracts\Repositories\TestimonialRepositoryInterface;
use App\Models\Testimonial;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true)
    {
        $testimonials = Testimonial::filter()->select($cols)->orderByDesc('created_at');

        if ($paginate) {
            return $testimonials->paginate();
        }

        return $testimonials->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Testimonial::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        return Testimonial::create($data);
    }

    public function update(Testimonial $testimonial, array $data)
    {
        return $testimonial->update($data);
    }

    public function delete(Testimonial $testimonial)
    {
        return $testimonial->delete();
    }
}
