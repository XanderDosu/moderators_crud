@extends('layouts.main')
@section('content')

<div>
    <a href="{{ route('moderator.create') }}" class="btn btn-primary mb-3">Add new moderator</a>
</div>
    <div>
       @foreach($moderators as $moderator)
       <div><a href="{{ route('moderator.show', $moderator->id) }}">{{ $moderator->name }}</a></div>
        @endforeach
    </div>
@endsection
