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
    <a href="{{ route('moderator.create') }}" class="btn btn-primary mb-3">Add new moderator</a>
</div>
    <div>
       @foreach($moderators as $moderator)
       <div><a href="{{ route('moderator.show', $moderator->id) }}">{{ $moderator->name }}</a></div>
        @endforeach
    </div>
@endsection
