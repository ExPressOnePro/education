
<div class="container mt-4">

    @auth
        @if(Auth::user()->role === 'Admin')
            <h1>Fișiere</h1>
            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Fișier</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <div class="mb-3">
                    <label for="file_name" class="form-label">Nume fișier</label>
                    <input type="text" class="form-control" id="file_name" name="file_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Încărcați fișierul</button>
            </form>
            <hr>
        @endif
    @endauth


    <h2>Fișiere încărcate</h2>
    <table class="table table-hover  mt-4">
        <thead>
        <tr>
            <th>Nume fișier</th>
            @auth
                @if(Auth::user()->role === 'Admin')
            <th>Data adăugării</th>
                @endif
            @endauth
            <th>Data publicării</th>
            <th>Anul</th>
            @auth
                @if(Auth::user()->role === 'Admin')
                    <th>Dimensiune fișier</th>
                    <th>Acțiuni</th>
                @endif
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr data-file-id="{{ $file->id }}" data-file-name="{{ $file->file_name }}" data-year="{{ $file->year }}" data-publication-date="{{ $file->publication_date }}">
                <td onclick="window.open('{{ route('files.open', $file->id) }}', '_blank');">
                    <a href="#" class="h6">{{ $file->file_name }}</a>
                </td>
                @auth
                    @if(Auth::user()->role === 'Admin')
                        <td>{{ $file->created_at }}</td>
                    @endif
                @endauth
                <td>{{ $file->publication_date }}</td>
                <td>{{ $file->year }}</td>
                @auth
                    @if(Auth::user()->role === 'Admin')
                        <td>{{ $file->file_size }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary edit-btn">Editați</button>
                            <form action="{{ route('files.destroy', $file->id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Șterge</button>
                            </form>
                        </td>
                    @endif
                @endauth

            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit File Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" action="{{ route('files.update', 'fileId') }}">
                    @csrf
                    <input type="hidden" name="file_id" id="fileId">
                    <div class="form-group">
                        <label for="editFileName">File Name</label>
                        <input type="text" class="form-control" id="editFileName" name="file_name">
                    </div>
                    <div class="form-group">
                        <label for="editYear">Year</label>
                        <input type="text" class="form-control" id="editYear" name="year">
                    </div>
                    <div class="form-group">
                        <label for="editPublicationDate">Publication Date</label>
                        <input type="date" class="form-control" id="editPublicationDate" name="publication_date">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var fileId = $(this).closest('tr').data('file-id');
            var fileName = $(this).closest('tr').data('file-name');
            var year = $(this).closest('tr').data('year');
            var publicationDate = $(this).closest('tr').data('publication-date');

            $('#fileId').val(fileId);
            $('#editFileName').val(fileName);
            $('#editYear').val(year);
            $('#editPublicationDate').val(publicationDate);

            var form = $('#editForm');
            var action = form.attr('action');
            action = action.replace('fileId', fileId);
            form.attr('action', action);

            $('#editModal').modal('show');
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var formData = form.serialize();

            $.ajax({
                type: 'post',
                url: url,
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    // Обработка ошибок, если есть
                }
            });
        });
    });
</script>
