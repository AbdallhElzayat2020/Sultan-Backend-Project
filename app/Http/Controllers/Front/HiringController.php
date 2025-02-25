<?php

namespace App\Http\Controllers\Front;

use App\Enums\OpportunityType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\HiringRequest;
use App\Models\Opportunity;
use Illuminate\Support\Facades\DB;

class HiringController extends Controller
{
    public function index()
    {
        return view('website.pages.Hireing');
    }

    public function store(HiringRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $opportunity = Opportunity::create([...$request->validated(), 'type' => OpportunityType::EMPLOYMENT]);

                if ($request->hasFile('file')) {
                    $opportunity->addMediaFromRequest('file')->toMediaCollection('resume');
                }
            });
        } catch (\Throwable $throwable) {
            return to_route('internship')->with('message', 'Something went wrong');
        }

        return to_route('apply')->with('message', 'Your application has been submitted');
    }
}
