<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\OfferRepositoryInterface;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Models\Offer;

class OfferController extends Controller
{
    public function __construct(
        private OfferRepositoryInterface $offerRepository
    ) {
        $this->middleware('can:view-offers')->only(['index', 'show']);
        $this->middleware('can:update-offers')->only(['edit', 'update']);
        $this->middleware('can:delete-offers')->only(['destroy']);
        $this->middleware('can:create-offers')->only(['create', 'store']);

    }

    public function index()
    {
        $offers = $this->offerRepository->getAll();

        return view('dashboard.pages.offer.index', compact('offers'));
    }

    public function create()
    {
        return view('dashboard.pages.offer.create');
    }

    public function store(StoreOfferRequest $request)
    {
        try {
            $this->offerRepository->create($request->validated());

            toast('تمت العمليه بنجاح', 'success');

        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.offers.index');
    }

    public function show(Offer $offer)
    {
        $offer->load('details', 'media');

        return view('dashboard.pages.offer.show', compact('offer'));
    }

    public function edit(Offer $offer)
    {
        $offer->load('details', 'media');

        return view('dashboard.pages.offer.edit', compact('offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        try {
            $this->offerRepository->update($offer, $request->validated());

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.offers.index');
    }

    public function destroy(Offer $offer)
    {
        try {
            $this->offerRepository->delete($offer);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.offers.index');
    }

    public function updateStatus(Offer $offer)
    {
        try {
            $status = $offer->status->is(Status::ACTIVE) ? Status::INACTIVE : Status::ACTIVE;

            $offer->update([
                'status' => $status,
            ]);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {

            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.offers.index')->with('success', 'Offer updated successfully');
    }
}
