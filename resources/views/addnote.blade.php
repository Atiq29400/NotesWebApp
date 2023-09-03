@extends('master')

@section('content')

    <form method="POST" action="{{route('addnew.note')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label text-light">Title</label>
            <input type="hidden" name="note_id" value="{{old('add', $id)}}">
            <input type="text" class="form-control bg-secondary border border-0 text-light" id="title" name="title" value="{{ old('title', $note['title']) }}">
            <div class="mb-3">
                <label for="email" class="form-label text-light">Description</label>
            <textarea name="desc" id="desc" cols="100" class="form-control bg-secondary border border-0 text-light" rows="10">{{ old('desc', $note['desc']) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection