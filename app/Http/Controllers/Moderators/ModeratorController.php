<?php

namespace App\Http\Controllers\Moderators;

use App\Http\Controllers\Controller;
use App\Models\Moderator;

class ModeratorController extends Controller
{
    public function index()
    {
        $moderators = Moderator::all();
        return view('moderator.index', compact('moderators'));
    }

    public function create()
    {
        $moderators = Moderator::all();
        return view('moderator.create', compact('moderators'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required||unique:moderators|email:rfc,dns',
        ]);
        $moderator = Moderator::create($data);
        return redirect(route('moderator.index'));
    }
    public function show(Moderator $moderator)
    {
        return view('moderator.show', compact('moderator'));
    }

    public function edit(Moderator $moderator)
    {
        $moderators = Moderator::all();
        return view('moderator.edit', compact('moderator', 'moderators'));
    }
    public function update(Moderator $moderator)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|unique:moderators|email:rfc,dns',
        ]);
        $moderator->update($data);
        return redirect(route('moderator.show', $moderator->id));
    }
    public function destroy(Moderator $moderator)
    {
        $moderator->delete();
        return redirect(route('moderator.index'));
    }
}
