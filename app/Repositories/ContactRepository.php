<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true)
    {
        $contactInquiries = Contact::filter()->select($cols)->latest();

        if (count($relations)) {
            $contactInquiries = $contactInquiries->with($relations);
        }

        if ($paginate) {
            return $contactInquiries->paginate();
        }

        return $contactInquiries->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Contact::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function update(Contact $contactInquiry, array $data)
    {
        return $contactInquiry->update($data);
    }

    public function delete(Contact $contactInquiry)
    {
        return $contactInquiry->delete();
    }
}
