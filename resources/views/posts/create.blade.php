@extends('layouts.app')
@section('title', 'Добавить пост')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Добавить пост</h3>
        <div class="form-group">
            <input type="text" class="form-group" name="title">
        </div>
        <div class="form-group">
            <textarea name="description" id="description" class="form-group"></textarea>
        </div>
        <div class="form-group">
            <input type="file">
        </div>

        <input type="submit" value="Добавить пост" class="btn btn-outline-success">
    </form>
@endsection
