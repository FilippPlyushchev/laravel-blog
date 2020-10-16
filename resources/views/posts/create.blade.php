@extends('layouts.app')
@section('title', 'Добавить пост')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Добавить пост</h3>
        <div class="form-group">
            <label for="title">Название поста</label>
            <input type="text" class="form-control" name="title" id="title">

        </div>
        <div class="form-group">
            <label for="description">Содержимое поста</label><textarea name="description" id="description" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Изображение</label>
            <input type="file" class="form-control-file" name="img" id="img">
        </div>

        <input type="submit" value="Добавить пост" class="btn btn-outline-success">
    </form>
@endsection
