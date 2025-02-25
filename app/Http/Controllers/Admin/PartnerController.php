<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Partner\StorePartnerRequest;
use App\Http\Requests\Admin\Partner\UpdatePartnerRequest;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::with('media')->latest()->paginate(PAGINATE_VALUE);

        return view('dashboard.pages.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.pages.partner.create');
    }

    public function store(StorePartnerRequest $request)
    {
        try {
            $partner = Partner::create($request->validated());

            if ($request->file('logo')) {
                $partner->addMediaFromRequest('logo')->toMediaCollection('logo');
            }

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.partners.index');
    }

    public function edit(Partner $partner)
    {
        return view('dashboard.pages.partner.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        try {
            $partner->update($request->validated());

            if ($request->file('logo')) {
                $partner->addMediaFromRequest('logo')->toMediaCollection('logo');
            }

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.partners.index');
    }

    public function destroy(Partner $partner)
    {
        try {
            $partner->delete();

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $throwable) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.partners.index');
    }

    public function updateStatus(Partner $partner)
    {
        try {
            $status = $partner->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;

            $partner->update([
                'status' => $status,
            ]);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.partners.index')->with('success', 'Partner updated successfully');
    }
}
