<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function index(Request $request)
    {
        $objectives = $request->user()->objectives()->paginate(5);

        return view('objective.index', [
            'objectives' => $objectives,
        ]);
    }

    public function show(Objective $objective)
    {

        return view('objective.show', [
            'objective' => $objective,
        ]);
    }
}
