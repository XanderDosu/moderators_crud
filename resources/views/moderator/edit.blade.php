@extends('layouts.main')
@section('content')

<div>
    <form action='{{ route('moderator.update', $moderator->id) }}' method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name='name' class="form-control" id="name"  placeholder="Enter name" value="{{ $moderator->name }}">
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <textarea class="form-control" name='email' id="email" placeholder="Enter email">{{ $moderator->email }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>
@endsection
