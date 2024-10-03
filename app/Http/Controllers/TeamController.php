<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Traits\ImageUpload;

class TeamController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $inputs['image'] = $this->storeImage($request->file('image'), 'teams');
        }
        Team::create($inputs);
        return redirect()->route('teams.index')->with($this->notification('Team member added successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $this->deleteImage($team->image, 'teams');
            $inputs['image'] = $this->storeImage($request->file('image'), 'teams');
        }
        $team->fill($inputs);
        return redirect()->route('teams.index')->with($this->notification('Team member updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $this->deleteImage($team->image, 'teams');
        $team->delete();
        return redirect()->route('teams.index')->with($this->notification('Team member deleted successfully.'));
    }
}
