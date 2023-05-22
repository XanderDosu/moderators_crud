@extends('layouts.main')
@section('content')
<div>
    <form action='{{ route('moderator.store') }}' method="post">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name='name' class="form-control" id="name"  placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="content">{{ __('Email') }}</label>
            <textarea class="form-control" name='email' id="content" placeholder="Enter email"></textarea>
        </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>
@endsection
