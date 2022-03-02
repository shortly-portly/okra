<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (!auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials coult not be verified']);
        }

        // could also have done do:
        // throw ValidationException::withMessage([
        //  'email' => 'Your provided credentials coult not be verified']);
        //
        // This will automatically return the Input so you don't have to.

        session()->regenerate();
        return redirect('/')->with('success', 'Weclome Back');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
