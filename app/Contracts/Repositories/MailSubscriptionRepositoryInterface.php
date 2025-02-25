<?php

namespace App\Contracts\Repositories;

use App\Models\MailSubscription;

interface MailSubscriptionRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true);

    public function getById(int $id, array $cols = ['*']);

    public function create(array $data);

    public function delete(MailSubscription $subscription);
}
