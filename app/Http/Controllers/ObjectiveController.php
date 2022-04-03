<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectiveRequest;
use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{

    public function index(Request $request)
    {
        $objectives = $request
            ->user()
            ->objectives()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('objective.index', [
            'objectives' => $objectives,
        ]);
    }

    public function show(Objective $objective)
    {
        return view('objective.show', [
            'objective' => $objective->load('keyResults'),
        ]);
    }

    public function create()
    {
        return view('objective.create');
    }

    public function store(ObjectiveRequest $request)
    {
        $validated            = $request->validated();
        $validated['user_id'] = request()->user()->id;
        $validated['status']  = 'New';

        Objective::create($validated);

        return redirect('/objective');
    }

    public function edit(Objective $objective)
    {
        return view('objective.edit', [
            'objective' => $objective,
        ]);
    }

    public function update(ObjectiveRequest $request, Objective $objective)
    {
        $validated = $request->validated();
        $objective->update($validated);

        return redirect('/objective');
    }
}
