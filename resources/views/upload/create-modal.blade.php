<div class="modal fade" id="produksi-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Production Data Manually</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.store') }}" method="POST" id="produksiForm" name="produksiForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-12">
                            <input type="date" formatDate="dd-mm-yyyy" class="form-control" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" value="{{ old('tanggal') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bangsa" class="col-sm-3 control-label">Bangsa</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('bangsa') is invalid @enderror" id="bangsa" name="bangsa" placeholder="bangsa" value="{{ old('bangsa') }}">

                            @error('bangsa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_bull" class="col-sm-3 control-label">Nama Bull</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('nama_bull') is invalid @enderror" id="nama_bull" name="nama_bull" placeholder="nama_bull" value="{{ old('nama_bull') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_bull" class="col-sm-3 control-label">Kode Bull</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('kode_bull') is invalid @enderror" id="kode_bull" name="kode_bull" placeholder="kode_bull" value="{{ old('kode_bull') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_batch" class="col-sm-3 control-label">Kode Batch</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('kode_batch') is invalid @enderror" id="kode_batch" name="kode_batch" placeholder="kode_batch" value="{{ old('kode_batch') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="produksi" class="col-sm-3 control-label">Produksi</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('produksi') is invalid @enderror" id="produksi" name="produksi" placeholder="produksi" value="{{ old('produksi') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ptm" class="col-sm-3 control-label">PTM</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('ptm') is invalid @enderror" id="ptm" name="ptm" placeholder="write the value in decimal like 0.5" value="{{ old('ptm') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konsentrasi" class="col-sm-3 control-label">Konsentrasi</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('konsentrasi') is invalid @enderror" id="konsentrasi" name="konsentrasi" placeholder="write the value in decimal like 0.5" value="{{ old('konsentrasi') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="button-group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
        
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>