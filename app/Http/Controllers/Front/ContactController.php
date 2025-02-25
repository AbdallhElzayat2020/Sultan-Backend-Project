<?php

namespace App\Http\Controllers\Front;

use App\Contracts\Repositories\ContactRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Service;

class ContactController extends Controller
{
    public function __construct(private ContactRepositoryInterface $contactRepository) {}

    public function index()
    {
        $services = Service::get(['id', 'title']);

        return view('website.pages.ContactUs', compact('services'));
    }

    public function store(ContactRequest $request)
    {
        $this->contactRepository->create($request->validated());

        return to_route('contact')->with('message', 'Your message has been sent.');
    }
}
