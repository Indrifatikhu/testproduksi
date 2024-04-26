<!-- Delete confirmation dialog -->
@foreach ($allData as $data)
    
<div class="delete-confirmation modal fade" id="deleteModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">Hapus Data By Id: {{ $data->id }}</h4>
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <form action="{{ url('upload/' . $data->id) }}" method="post">
                @method("DELETE")
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger delete-confirmation-button">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Delete confirmation dialog -->
@endforeach

<!-- Delete Multiple confirmation dialog -->
{{-- <div class="delete-multiple-confirmation modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Hapus</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Batal</button>
                <button type="button" class="btn btn-danger delete-multiple-confirmation-button" data-target="#deleteMultipleModal">
                    Hapus</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- End of Delete Multiple confirmation dialog -->