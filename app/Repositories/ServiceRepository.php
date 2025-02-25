<?php

namespace App\Repositories;

use App\Contracts\Repositories\ServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll(array $cols = ['*'], bool $paginate = true)
    {
        $services = Service::filter()->select($cols)->latest();

        if ($paginate) {
            return $services->paginate();
        }

        return $services->get();
    }

    public function getAllWithFeatures()
    {
        return Service::query()->with(['features'])->paginate();
    }

    public function getById(int $id, array $cols = ['*'])
    {
        return Service::findOrFail($id, $cols);
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $slug = Str::slug($data['title']['en'].'-'.time());

            $data['slug'] = $slug;

            $service = Service::create($data);

            $features = [];

            foreach ($data['features'] as $feature) {
                $features[] = [
                    'service_id' => $service->id,
                    'feature' => json_encode($feature),
                ];
            }

            DB::table('service_features')->insert($features);

            if (request()->hasFile('file')) {
                $service->addMediaFromRequest('file')->toMediaCollection('image');
            }

            if (request()->hasFile('icon')) {
                $service->addMediaFromRequest('icon')->toMediaCollection('icon');
            }
        });
    }

    public function update(Service $service, array $data)
    {
        DB::transaction(function () use ($service, $data) {
            $service->update($data);

            $service->features()->delete();

            $features = [];

            foreach ($data['features'] as $feature) {
                $features[] = [
                    'service_id' => $service->id,
                    'feature' => json_encode($feature),
                ];
            }

            DB::table('service_features')->insert($features);

            if (request()->hasFile('file')) {
                $service->addMediaFromRequest('file')->toMediaCollection('image');
            }

            if (request()->hasFile('icon')) {
                $service->addMediaFromRequest('icon')->toMediaCollection('icon');
            }
        });
    }

    public function delete(Service $service)
    {
        $service->features()->delete();
        $service->delete();
    }
}
