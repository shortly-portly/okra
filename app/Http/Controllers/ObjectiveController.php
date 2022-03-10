<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{

    public function index(Request $request)
    {
        $objectives = $request->user()->objectives()->orderBy('created_at', 'DESC')->paginate(5);

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
            'start_date'       => ['required', 'date'],
            'end_date'         => ['required', 'date', 'after:start_date'],
            'next_review_date' => ['nullable', 'date', 'after:start_date', 'before:end_date'],
        ]);

        $attributes['user_id'] = request()->user()->id;
        $attributes['status']  = 'New';

        Objective::create($attributes);

        return redirect('/objective');
    }
}
