<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Traits\ImageUpload;

class PartnerController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $inputs['image'] = $this->storeImage($request->file('image'), 'partners');
        }
        Partner::create($inputs);

        return redirect()->route('partners.index')->with($this->notification('Partner added successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $this->deleteImage($partner->image, 'partners');
            $inputs['image'] = $this->storeImage($request->file('image'), 'partners');
        }
        $partner->update($inputs);
        return redirect()->route('partners.index')->with($this->notification('Partner updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $this->deleteImage($partner->image, 'partners');
        $partner->delete();
        return redirect()->route('partners.index')->with($this->notification('Partner deleted successfully.'));
    }
}
