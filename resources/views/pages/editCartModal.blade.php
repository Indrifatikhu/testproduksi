@foreach ($data_distribusi as $data)

<div class="modal fade" id="editCartModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Edit User by ID : <b>{{ $data->id }}</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" >
                <!-- Form fields for editing user data -->
                <form action="{{ url('pages/cart/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editCartForm{{ $data->id }}" name="editCartForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div id="target_fields">
                        <div class="form-group">
                            <label for="bangsa" class="col-md col-form-label text-md-left">Bangsa</label>
                            <div class="col-md">
                                <input type="text" class="form-control @error('bangsa') is invalid @enderror" id="bangsa" name="bangsa" value="{{ old('bangsa', $data->bangsa) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_batch" class="col-md col-form-label text-md-left">Kode Batch</label>
                            <div class="col-md">
                                <input type="char" class="form-control @error('kode_batch') is invalid @enderror" id="kode_batch" name="kode_batch" value="{{ old('kode_batch', $data->kode_batch) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_bull" class="col-md col-form-label text-md-left">Kode Bull</label>
                            <div class="col-md">
                                <input type="char" class="form-control @error('kode_bull') is invalid @enderror" id="kode_bull" name="kode_bull" value="{{ old('kode_bull', $data->kode_bull) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_bull" class="col-md col-form-label text-md-left">Nama Bull</label>
                            <div class="col-md">
                                <input type="char" class="form-control @error('nama_bull') is invalid @enderror" id="nama_bull" name="nama_bull" value="{{ old('nama_bull', $data->nama_bull) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_distribusi" class="col-md col-form-label text-md-left">Tanggal Distribusi</label>
                            <div class="col-md">
                                <input type="date" class="form-control @error('tgl_distribusi') is invalid @enderror" id="tgl_distribusi" name="tgl_distribusi" value="{{ old('tgl_distribusi', $data->tgl_distribusi) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jml_distribusi" class="col-md col-form-label text-md-left">Jumlah Distribusi</label>
                            <div class="col-md">
                                <input type="number" class="form-control @error('jml_distribusi') is invalid @enderror" id="jml_distribusi" name="jml_distribusi" value="{{ old('jml_distribusi', $data->jml_distribusi) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan_distribusi" class="col-md col-form-label text-md-left">Tujuan Distribusi</label>
                            <div class="col-md">
                                <input type="char" class="form-control @error('tujuan_distribusi') is invalid @enderror" id="tujuan_distribusi" name="tujuan_distribusi" value="{{ old('tujuan_distribusi', $data->tujuan_distribusi) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="updateBtn" class="btn btn-primary" href="javascript:void(0)">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endforeach