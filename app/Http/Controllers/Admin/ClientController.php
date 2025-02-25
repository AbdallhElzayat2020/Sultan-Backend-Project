<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\StoreClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('media')->latest()->paginate(PAGINATE_VALUE);

        return view('dashboard.pages.client.index', compact('clients'));
    }

    public function create()
    {
        return view('dashboard.pages.client.create');
    }

    public function store(StoreClientRequest $request)
    {
        try {
            $client = Client::create($request->validated());

            if ($request->file('logo')) {
                $client->addMediaFromRequest('logo')->toMediaCollection('logo');
            }

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        return view('dashboard.pages.client.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        try {
            $client->update($request->validated());

            if ($request->file('logo')) {
                $client->addMediaFromRequest('logo')->toMediaCollection('logo');
            }

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.clients.index');
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.clients.index');
    }

    public function updateStatus(Client $client)
    {
        try {
            $status = $client->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;

            $client->update([
                'status' => $status,
            ]);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.clients.index')->with('success', 'Client updated successfully');
    }
}
