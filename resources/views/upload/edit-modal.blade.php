@foreach ($allData as $data)

<div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Edit User by ID : {{ $data->id }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" >
                <!-- Form fields for editing user data -->
                <form action="{{ url('upload/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editForm" name="editForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="editTanggal">Tanggal Produksi :</label>
                        <input type="text" class="form-control @error('created_at') is invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}">
                    </div>
                    <div class="form-group">
                        <label for="editKodeBull">Kode Bull :</label>
                        <input type="text" class="form-control @error('kode_bull') is invalid @enderror" id="kode_bull" name="kode_bull" value="{{ old('kode_bull', $data->kode_bull) }}">
                    </div>
                    <div class="form-group">
                        <label for="editBangsa">Bangsa :</label>
                        <input type="text" class="form-control @error('bangsa') is invalid @enderror" id="bangsa" name="bangsa" value="{{ old('bangsa', $data->bangsa) }}">
                    </div>
                    <div class="form-group">
                        <label for="editKodeBatch">Kode Batch :</label>
                        <input type="text" class="form-control @error('kode_batch') is invalid @enderror" id="kode_batch" name="kode_batch" value="{{ old('kode_batch', $data->kode_batch) }}">
                    </div>
                    <div class="form-group">
                        <label for="editProduksi">Produksi :</label>
                        <input type="text" class="form-control @error('produksi') is invalid @enderror" id="produksi" name="produksi" value="{{ old('produksi', $data->produksi) }}">
                    </div>
                    <div class="form-group">
                        <label for="editPtm">PTM:</label>
                        <input type="char" class="form-control @error('ptm') is invalid @enderror" id="ptm" name="ptm" value="{{ old('ptm', $data->ptm) }}">
                    </div>
                    <div class="form-group">
                        <label for="editKonsentrasi">Konsentrasi :</label>
                        <input type="char" class="form-control @error('konsentrasi') is invalid @enderror" id="konsentrasi" name="konsentrasi" value="{{ old('konsentrasi', $data->konsentrasi) }}">
                    </div>
                    <button type="submit" id="updateBtn" class="btn btn-primary" href="javascript:void(0)">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endforeach