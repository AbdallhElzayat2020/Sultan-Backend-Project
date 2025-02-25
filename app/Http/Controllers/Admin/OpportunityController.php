<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\OpportunityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OpportunityRequest;
use App\Models\Opportunity;

class OpportunityController extends Controller
{
    public function __construct(
        private OpportunityRepositoryInterface $opportunityRepository
    ) {
        $this->middleware('can:update-opportunities')->only(['edit', 'update']);
        $this->middleware('can:delete-opportunities')->only(['destroy']);
        $this->middleware('can:create-opportunities')->only(['create', 'store']);
        $this->middleware('can:view-opportunities')->only(['index', 'show']);
    }

    public function index()
    {
        $opportunities = $this->opportunityRepository->getAll();

        return view('dashboard.pages.opportunity.index', compact('opportunities'));
    }

    public function create()
    {
        return view('dashboard.pages.opportunity.create');
    }

    public function store(OpportunityRequest $request)
    {
        $this->opportunityRepository->create($request->validated());

        return to_route('admin.opportunities.index');
    }

    public function show(Opportunity $opportunity)
    {
        return view('dashboard.pages.opportunity.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('dashboard.pages.opportunity.edit', compact('opportunity'));
    }

    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        $this->opportunityRepository->update($opportunity, $request->validated());

        return to_route('admin.opportunities.index');
    }

    public function destroy(Opportunity $opportunity)
    {
        try {
            $this->opportunityRepository->delete($opportunity);

            toast('تمت العمليه بنجاح', 'success');
        } catch (\Throwable $exception) {
            toast('حدث خطأ جرب لاحقا', 'error');
        }

        return to_route('admin.opportunities.index');
    }
}
