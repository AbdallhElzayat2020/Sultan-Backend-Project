<?php

namespace App\Repositories;

use App\Contracts\Repositories\MailSubscriptionRepositoryInterface;
use App\Models\MailSubscription;

class MailSubscriptionRepository implements MailSubscriptionRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true)
    {
        $blogs = MailSubscription::filter()->select($cols)->latest();

        if ($paginate) {
            return $blogs->paginate();
        }

        return $blogs->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return MailSubscription::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        return MailSubscription::create($data);
    }

    public function delete(MailSubscription $subscription)
    {
        return $subscription->delete();
    }
}
