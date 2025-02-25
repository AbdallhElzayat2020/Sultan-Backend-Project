<?php

namespace App\Http\Controllers\Front;

use App\Enums\OpportunityType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\InternshipRequest;
use App\Models\Opportunity;
use Illuminate\Support\Facades\DB;

class InternshipController extends Controller
{
    public function index()
    {
        return view('website.pages.Internship');
    }

    public function store(InternshipRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $opportunity = Opportunity::create([...$request->validated(), 'type' => OpportunityType::TRAINING]);

                if ($request->hasFile('file')) {
                    $opportunity->addMediaFromRequest('file')->toMediaCollection('resume');
                }
            });
        } catch (\Throwable $throwable) {
            return to_route('internship')->with('message', 'Something went wrong');
        }

        return to_route('internship')->with('message', 'Your application has been submitted');
    }
}
