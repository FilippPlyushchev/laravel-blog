@extends('layouts.app')
@section('title', 'Блог')

@section('content')
    <div class="container">

        @if(isset($_GET['search']))
            @if(count($posts) > 0)
                <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
                <p class="lead">Всего найдено {{ count($posts) }} постов</p>
            @else
                <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Отобразить все посты</a>
            @endif
        @endif

        <div class="row">
            @foreach($posts as $post)
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">{{ $post->short_title }}</div>
                        <div class="card-body">{{ $post->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(!isset($_GET['search']))
            {{ $posts->links() }}
        @endif
    </div>
@endsection
