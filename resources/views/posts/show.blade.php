@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>{{ $post->title }}</h4></div>
                <div class="card-body">
                    <div class="card-img card-img__max"
                         style="background-image: url({{ $post->img ?? asset('img/no-image.svg') }})"></div>
                    <div class="card-description">{{ $post->description }}</div>
                    <div class="card-author">Автор: {{ $post->name }}</div>
                    <div class="card-date">Пост создан: {{ $post->created_at->diffForHumans() }}</div>
                    <div class="car-btn">
                        <a href="{{ route('post.index') }}" class="btn btn-outline-primary">На главную</a>
                        <a href="{{ route('post.edit', ['post' => $post->post_id]) }}" class="btn btn-outline-success">Редактировать</a>
                        <form action="{{ route('post.destroy', ['post' => $post->post_id]) }}" method="post" onsubmit="return confirm('Точно удалить пост ?');">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-outline-danger" value="Удалить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
