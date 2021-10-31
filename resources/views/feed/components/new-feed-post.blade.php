<div>
    <h3>Add new post</h3>
   
    <form wire:submit.prevent="save_post">
        <div class="form-group">
        Username*:
        </div>
        <br/>
        <div class="form-group">
        Post text*:
        </div>
        <br/>
        <textarea wire:model.defer="post_content" rows="3" class="form-control" maxlength="500"></textarea>
        @error('post_content')
        <div style="color: red; font-size: 12px">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>
