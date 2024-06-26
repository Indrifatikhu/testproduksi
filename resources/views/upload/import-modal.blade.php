<!-- Modal -->
<div class="modal fade" id="import-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Import File Produksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="formFile" class="form-label">Format File: Excel</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-upload mr-2"></i>Import</button>
            </div>
        </form>
    </div>
</div>
</div>