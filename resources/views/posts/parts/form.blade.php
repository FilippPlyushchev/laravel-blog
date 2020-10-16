@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif

<div class="form-group">
    <label for="title">Название поста</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title ?? '' }}">

</div>
<div class="form-group">
    <label for="description">Содержимое поста</label><textarea name="description" id="description" rows="10" class="form-control">{{ $post->description ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="img">Изображение</label>
    <input type="file" class="form-control-file" name="img" id="img">
</div>
