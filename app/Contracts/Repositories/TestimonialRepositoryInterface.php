<?php

namespace App\Contracts\Repositories;

use App\Models\Testimonial;

interface TestimonialRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function update(Testimonial $testimonial, array $data);

    public function delete(Testimonial $testimonial);
}
