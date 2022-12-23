<div class="form-group">
    <label for="name">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $article->title }}" class="form-control" required>
    <div>{{ $errors->first('title') }}</div>
</div>

<div class="form-group">
    <label for="body">Description</label>
    <textarea name="body" cols="30" rows="10" class="form-control" required>{{ old('body') ?? $article->body }}</textarea>
    <div>{{ $errors->first('body') }}</div>
</div>

<div class="form-group">
    <label for="user_id">Author</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $user->id == $article->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input accept=".jpg, .jpeg" type="file" class="image form-control" name="image">
    <div>{{ $errors->first('image') }}</div>
</div>

@csrf
