<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeyResultRequest;
use App\Models\KeyResult;
use App\Models\Objective;

class KeyResultController extends Controller
{
    public function show(KeyResult $keyResult)
    {
        return view('keyResult.show', [
            'keyResult' => $keyResult,
        ]);
    }

    public function create(Objective $objective)
    {
        return view('keyResult.create', [
            'objective' => $objective,
        ]);
    }

    public function store(KeyResultRequest $request, Objective $objective)
    {
        $validated = $request->validated();
        $validated['objective_id'] = $objective->id;
        $validated['status'] = 'New';

        KeyResult::create($validated);
        

        return redirect()->route('objective', [$objective]);
    }
}
