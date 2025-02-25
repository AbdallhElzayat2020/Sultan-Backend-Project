<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ContactRepositoryInterface;
use App\Contracts\Repositories\ServiceRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
        private ServiceRepositoryInterface $serviceRepository
    ) {
        $this->middleware('can:view-contacts')->only(['index', 'show']);
        $this->middleware('can:update-contacts')->only(['edit', 'update']);
        $this->middleware('can:delete-contacts')->only(['destroy']);
        $this->middleware('can:view-contacts')->only(['index', 'show']);
    }

    public function index()
    {
        $contacts = $this->contactRepository->getAll(relations: [
            'service:id,title',
        ]);

        $services = $this->serviceRepository->getAll(cols: ['id', 'title']);

        return view('dashboard.pages.contact.index', compact('contacts', 'services'));
    }

    public function create()
    {
        return view('dashboard.pages.contact.create');
    }

    public function store(ContactRequest $request)
    {
        try {
            $this->contactRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.contacts.index');
    }

    public function show(Contact $contact)
    {
        return view('dashboard.pages.contact.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('dashboard.pages.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        try {
            $this->contactRepository->update($contact, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.contacts.index');
    }

    public function destroy(Contact $contact)
    {
        try {
            $this->contactRepository->delete($contact);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.contacts.index');
    }
}
