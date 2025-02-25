<?php

namespace App\Http\Controllers\Front;

use App\Contracts\Repositories\MailSubscriptionRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\MailSubscriptionRequest;

class MailSubscriptionController extends Controller
{
    public function __construct(private MailSubscriptionRepositoryInterface $mailSubscriptionRepository) {}

    public function __invoke(MailSubscriptionRequest $request)
    {
        $this->mailSubscriptionRepository->create($request->validated());

        return to_route('home');
    }
}
