@extends('layouts.main')
@section('content')

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
