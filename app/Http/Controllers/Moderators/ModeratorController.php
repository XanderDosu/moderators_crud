<?php

namespace App\Http\Controllers\Moderators;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Validation\Rule;

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
            'email' => 'required||unique:moderators|email:rfc,dns|max:255'
        ]);
        $moderator = Moderator::create($data);
        session()->flash('success', 'New moderator was successfully saved.');
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
            'email' => [
                'required',
                Rule::unique('moderators')->ignore($moderator->id),
                'email:rfc,dns'
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ]
        ]);
        $moderator->update($data);
        return redirect(route('moderator.show', $moderator->id));
    }
    public function destroy(Moderator $moderator)
    {
        $moderator->delete();
        session()->flash('success', 'The moderator was successfully deleted.');
        return redirect(route('moderator.index'));
    }
}
