<div class="modal fade-lg" id="produksi-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <label for="date" class="col-sm-3 control-label">Tanggal Produksi</label>
                        <div class="col-sm-12">
                            <input type="date" formatDate="dd-mm-yyyy" class="form-control" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" value="{{ old('tanggal') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bangsa" class="col-sm-3 control-label">Bangsa</label>
                        <div class="col-sm-12">
                            <select id="select-bangsa" name="id_bangsa" class="js-example-basic-single form-control @error('id_bangsa') is invalid @enderror" required>
                                <option value="" disabled selected>- PILIH BANGSA -</option>
                                @foreach($bangsa as $b)
                                    <option {{ old('bangsa') == $b->id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bangsa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_bull" class="col-sm-3 control-label">Bull</label>
                        <div class="col-sm-12">
                            <select id="select-bull" name="id_bull" class="js-example-basic-single form-control @error('id_bull') is invalid @enderror" required disabled>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_batch" class="col-sm-3 control-label">Kode Batch</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('kode_batch') is invalid @enderror" id="kode_batch" name="kode_batch" placeholder="Kode Batch" value="{{ old('kode_batch') }}">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="produksi" class="control-label">Produksi</label>
                                <input type="number" class="form-control @error('produksi') is invalid @enderror" id="produksi" name="produksi" placeholder="Jumlah Produksi" value="{{ old('produksi') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ptm" class="control-label">PTM</label>
                                <input type="text" class="form-control @error('ptm') is invalid @enderror" id="ptm" name="ptm" placeholder="value in decimal like 0.5" value="{{ old('ptm') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="konsentrasi" class="control-label">Konsentrasi</label>
                                <input type="text" class="form-control @error('konsentrasi') is invalid @enderror" id="konsentrasi" name="konsentrasi" placeholder="value in decimal like 0.5" value="{{ old('konsentrasi') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="button-group">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-2"></i>Save Changes</button>
                        </div>
        
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>