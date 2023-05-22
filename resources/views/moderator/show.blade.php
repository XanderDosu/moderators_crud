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
       <h5><strong>{{ $moderator->name }}</strong></h5>
       <h5><strong>{{ $moderator->email }}</strong></h5>
       <div>{{ $moderator->created_at }}</div>
</div>
<div>
    <a href="{{ route('moderator.edit', $moderator->id) }}">Edit</a>
</div>
<div>
    <form action="{{ route('moderator.destroy', $moderator->id) }}" method="post">
        @csrf
        @method('delete')
        <input type='submit' value='Delete' class='btn btn-danger'>
    </form>
</div>
<div>
    <a href="{{ route('moderator.index') }}">Back</a>
</div>
@endsection
