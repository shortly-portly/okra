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

    public function create()
    {
        return view('objective.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'description'      => ['required', 'min:2', 'max:255'],
            'start_date'       => ['required', 'date_format:d/m/Y'],
            'end_date'         => ['required', 'date_format:d/m/Y'],
            'next_review_date' => ['nullable', 'date_format:d/m/Y'],
        ]);

        $attributes['user_id'] = request()->user()->id;

        Objective::create($attributes);

        return redirect('/objective');
    }
}
