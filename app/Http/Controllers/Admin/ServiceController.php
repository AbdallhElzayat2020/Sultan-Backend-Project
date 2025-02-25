<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ServiceRepositoryInterface;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __construct(
        private ServiceRepositoryInterface $serviceRepository
    ) {
        $this->middleware('can:update-services')->only(['edit', 'update']);
        $this->middleware('can:delete-services')->only(['destroy']);
        $this->middleware('can:create-services')->only(['create', 'store']);
        $this->middleware('can:view-services')->only(['index', 'show']);
    }

    public function index()
    {
        $services = $this->serviceRepository->getAll();

        return view('dashboard.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.pages.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        try {
            $this->serviceRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            throw $exception;
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.services.index');
    }

    public function show(Service $service)
    {
        return view('dashboard.pages.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $service->load('features');

        return view('dashboard.pages.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $this->serviceRepository->update($service, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        try {
            $this->serviceRepository->delete($service);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.services.index');
    }

    public function updateStatus(Service $service)
    {
        try {
            $status = $service->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;

            $service->update([
                'status' => $status,
            ]);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.services.index')->with('success', 'Service updated successfully');
    }
}
