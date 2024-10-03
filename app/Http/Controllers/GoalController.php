<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Goal;
use App\Traits\ImageUpload;

class GoalController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all();
        return view('admin.goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGoalRequest $request)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $inputs['image'] = $this->storeImage($request->file('image'), 'goals');
        }
        Goal::create($inputs);

        return redirect()->route('goals.index')->with($this->notification('Goal added successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        return view('admin.goals.show', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        return view('admin.goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGoalRequest $request, Goal $goal)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $inputs['image'] = $this->storeImage($request->file('image'), 'goals');
        }

        $goal->update($inputs);
        $notification = array(
            'message' => 'Goal updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('goals.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        $this->deleteImage($goal->image, 'goals');
        $goal->delete();
        return redirect()->route('goals.index')->with($this->notification('Goal deleted successfully.'));
    }
}
