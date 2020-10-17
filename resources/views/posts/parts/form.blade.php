<div class="form-group">
    <label for="title">Название поста</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $post->title ?? '' }}">

</div>
<div class="form-group">
    <label for="description">Содержимое поста</label><textarea name="description" id="description" rows="10" class="form-control">{{ old('description') ?? $post->description ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="img">Изображение</label>
    <input type="file" class="form-control-file" name="img" id="img">
</div>
