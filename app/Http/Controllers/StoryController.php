<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::all();
        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoryRequest $request)
    {
        $inputs = $request->all();
        Story::create($inputs);
        return redirect()->route('stories.index')->with($this->notification('Story created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryRequest $request, Story $story)
    {
        $inputs = $request->all();
        $story->update($inputs);
        return redirect()->route('stories.index')->with($this->notification('Story updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('stories.index')->with($this->notification('Story deleted successfully.'));
    }
}
