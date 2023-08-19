@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="Title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" class="form-control" name="content" id="content" aria-describedby="Content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" name="image" id="image" aria-describedby="Image">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
