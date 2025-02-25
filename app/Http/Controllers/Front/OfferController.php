<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::active()->websiteFilters()->latest()->get();

        return view('website.pages.offers', compact('offers'));
    }

    public function show(string $offerSlug)
    {
        $offer = Offer::active()->firstWhere(['slug' => $offerSlug]);

        if (! $offer) {
            abort(404);
        }

        $offer->loadMissing(['media', 'details']);

        [$property_specifications, $property_contents, $property_features, $financial_communication] = [
            $offer->details->firstWhere('key', 'property_specifications'),
            $offer->details->firstWhere('key', 'property_contents'),
            $offer->details->firstWhere('key', 'property_features'),
            $offer->details->firstWhere('key', 'financial_communication'),
        ];

        $other_offers = Offer::active()->latest()->whereNot('id', $offer->id)->with(['media'])->get();

        return view('website.pages.offer-details',
            compact('offer', 'property_specifications', 'property_contents', 'property_features',
                'financial_communication', 'other_offers'));
    }
}
