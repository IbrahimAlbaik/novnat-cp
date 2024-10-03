<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Models\FAQ;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFAQRequest $request)
    {
        $inputs = $request->all();
        FAQ::create($inputs);
        return redirect()->route('faqs.index')->with($this->notification('FAQ added successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFAQRequest $request, FAQ $faq)
    {
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with($this->notification('FAQ updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $FAQ)
    {
        $FAQ->delete();
        return redirect()->route('faqs.index')->with($this->notification('FAQ deleted successfully.'));
    }
}
