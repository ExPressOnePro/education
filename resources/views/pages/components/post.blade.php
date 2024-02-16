
<style>
    .lead {
        font-size:1.2rem;
        font-weight:400;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
    }
</style>

<div class="row featurette d-flex justify-content-center">
    <div class="col-md-8">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{$post->title}}</h3>
                <div class="mb-1 text-body-secondary">{{ $post->created_at }} | просмотрено {{ $post->views }}</div>
            </div>


        </div>
        <p class="lead">{{ $post->content }}</p>

        </div>

</div>
<div class="container">
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="photos" class="form-label">Photos</label>
            <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
