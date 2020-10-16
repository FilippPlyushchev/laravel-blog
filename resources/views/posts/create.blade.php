@extends('layouts.app')
@section('title', 'Добавить пост')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Добавить пост</h3>

        @include('posts.parts.form')

        <input type="submit" value="Добавить пост" class="btn btn-outline-success">
    </form>
@endsection
