<?php

namespace App\Repositories;

use App\Contracts\Repositories\OfferRepositoryInterface;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

class OfferRepository implements OfferRepositoryInterface
{
    public function getAll(array $cols = ['*'], array $relations = [], bool $paginate = true)
    {
        $offers = Offer::filter()->select($cols);

        if (count($relations)) {
            $offers = $offers->with($relations);
        }

        if ($paginate) {
            return $offers->paginate();
        }

        return $offers->get();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Offer::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $slug = Str::slug($data['title']['en'].'-'.time());

            $data['slug'] = $slug;

            $offer = Offer::create($data);

            $this->CreateDetails($data, $offer);

            if (request()->hasFile('files')) {
                $offer->addMultipleMediaFromRequest(['files'])
                    ->each(function (FileAdder $fileAdder) {
                        $fileAdder->toMediaCollection('gallery');
                    });
            }

            if (request()->hasFile('brochure')) {
                $offer->addMediaFromRequest('brochure')
                    ->toMediaCollection('brochure');
            }
        });
    }

    public function update(Offer $offer, array $data)
    {
        DB::transaction(function () use ($offer, $data) {
            $offer->update($data);

            $offer->details()->delete();

            $this->CreateDetails($data, $offer);

            if (request()->hasFile('files')) {

                $offer->load('media');

                // Delete old media files associated with this offer
                $offer->media->each(function ($media) {
                    $media->delete();
                });

                $offer->addMultipleMediaFromRequest(['files'])
                    ->each(function (FileAdder $fileAdder) {
                        $fileAdder->toMediaCollection('gallery');
                    });
            }

            if (request()->hasFile('brochure')) {
                $offer->addMediaFromRequest('brochure')
                    ->toMediaCollection('brochure');
            }
        });
    }

    public function delete(Offer $offer)
    {
        DB::transaction(function () use ($offer) {

            $offer->details()->delete();

            $offer->delete();
        });
    }

    public function CreateDetails(array $data, Offer $offer): void
    {
        $details = [
            [
                'key' => 'property_specifications',
                'section' => json_encode(['ar' => 'مواصفات العقار', 'en' => 'Property Specifications']),
                'data' => json_encode($data['property_specifications']),
                'offer_id' => $offer->id,
            ],
            [
                'key' => 'property_contents',
                'section' => json_encode(['ar' => 'محتويات العقار', 'en' => 'Property Contents']),
                'data' => json_encode($data['property_contents']),
                'offer_id' => $offer->id,
            ],
            [
                'key' => 'property_features',
                'section' => json_encode(['ar' => 'مميزات العقار', 'en' => 'Property Features']),
                'data' => json_encode($data['property_features']),
                'offer_id' => $offer->id,
            ],
            [
                'key' => 'financial_communication',
                'section' => json_encode(['ar' => 'المالية والتواصل', 'en' => 'Financial & Communication']),
                'data' => json_encode($data['financial_communication']),
                'offer_id' => $offer->id,
            ],
        ];

        DB::table('offer_details')->insert($details);
    }
}
