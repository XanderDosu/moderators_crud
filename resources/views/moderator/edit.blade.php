@extends('layouts.main')
@section('content')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
        @endif
    @endforeach
</div>
<div class="col-md-12">
    @if ($errors->any())
        <div class="flash-message">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif
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
            <input type="text" name='email' class="form-control" id="email"  placeholder="Enter email" value="{{ $moderator->email }}">
        </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>
@endsection
