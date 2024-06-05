<!-- Delete confirmation dialog -->
@foreach ($data_distribusi as $data)
    
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
            <form action="{{ url('pages/cart/'.$data->id) }}" method="post">
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

@endforeach