
<div class="container">
    <h1>Fișiere</h1>
    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Fişier</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Incarca fisier</button>
    </form>
    <hr>
    <h2>Fișiere încărcate</h2>
    <ul>
        @foreach($files as $file)
            <li>{{ $file->file_name }}</li>
        @endforeach
    </ul>
</div>
