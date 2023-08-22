@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <button type="button" class="btn btn-primary">
                <a href="{{route('admin.post.create')}}" class="text-white">Add new post</a>
            </button>
        </div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
        @endforeach
        <div>
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
