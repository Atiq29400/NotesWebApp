@extends('master')

@section('content')
<div class="row">
    @if ($notes->isEmpty())
        <div class="col-md-12">
            <div class="alert alert-warning mt-3">
                No notes found.
            </div>
        </div>
    @else
        @foreach ($notes as $note)
        <div class="card m-3 bg-secondary" style="width: 18rem;">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title text-light">{{ $note->title }}</h5>
                <p class="card-text text-light">{{ $note->desc }}.</p>
                <div class="d-flex justify-content-center">
                    {{-- <a href="{{route('edit.note', $note->id)}}"><button type="button" class="btn btn-warning">Edit</button></a> --}}
                    <a href="{{ route('delete.note', [$note->id, 'view'=>'done']) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                    {{-- <a href="{{route('done.note', $note->id)}}"><button type="button" class="btn btn-success">Done</button></a> --}}
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection