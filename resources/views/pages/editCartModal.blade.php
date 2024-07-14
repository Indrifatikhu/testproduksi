@foreach ($distribusi as $data)
<div class="modal fade" id="editCartModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">EDIT DATA DISTRIBUSI</h4>
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
                                <select name="id_produksi" id="" class="form-control js-example-basic-single form-control @error('bangsa') is invalid @enderror">
                                    <option value="" disabled selected> [Bangsa / Nama / Kode Bull / Kode Batch] - [Produksi/Sisa]</option>
                                    @foreach($produksi as $row)
                                        <option {{ $data->id_produksi == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ '[' . $row->bangsa . ' / ' . $row->nama_bull . ' / ' . $row->kode_bull . ' / ' . $row->kode_batch . '] - [' . $row->produksi . '/' . $row->sisa . ']' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="col-md col-form-label text-md-left">Tanggal Distribusi</label>
                            <div class="col-md">
                                <input type="date" class="form-control @error('tanggal') is invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-md col-form-label text-md-left">Jumlah Distribusi</label>
                            <div class="col-md">
                                <input type="number" class="form-control @error('jumlah') is invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', $data->jumlah) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="tujuan" class="col-md col-form-label text-md-left">Tujuan Distribusi - Provinsi</label>
                            <div class="col-md">
                                <select name="provinsi_id" id="provinsi_id_edit" class="js-example-basic-single form-control" required>
                                    <option value="" selected disabled>- Pilih Provinsi -</option>
                                    @foreach($provinsi as $p)
                                        <option {{ $p->id == $data->provinsi_id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tujuan" class="col-md col-form-label text-md-left">Tujuan Distribusi - Kabupaten</label>
                            <div class="col-md">
                                <select name="kabupaten_id" id="regency_id_edit" class="js-example-basic-single form-control" required disabled>
                                    <option value="" selected disabled>- Pilih Kabupaten/Kota -</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="container" class="col-md col-form-label text-md-left">Container</label>
                            <div class="col-md">
                                <input type="text" class="form-control @error('container') is invalid @enderror" id="container" name="container" value="{{ old('container', $data->container) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Batal</button>
                        <button type="submit" id="updateBtn" class="btn btn-sm btn-primary" href="javascript:void(0)"><i class="fas fa-save mr-2"></i>Update</button>
                    </div>
                </form>
                <input type="hidden" name="kabupaten_id_old" value="{{ $data->kabupaten_id }}">
            </div>

        </div>
    </div>
</div>

<div class="delete-confirmation modal fade" id="deleteCartModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">Hapus Data Distribusi</h4>
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <form action="{{ url('pages/cart/'.$data->id) }}" method="post">
                @method("DELETE")
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Batal</button>
                    <button type="submit" class="btn btn-sm btn-danger delete-confirmation-button"><i class="fas fa-trash mr-2"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var idid = {{ $data->id }};
        $(`[id^="editCartModal${ idid }"]`).on('shown.bs.modal', function(event) {
            var modal = $(this);
            var provinsi_id = modal.find('select[name="provinsi_id"]').val();
            var kabupaten_id = modal.find('input[name="kabupaten_id_old"]').val();

            getRegency(provinsi_id, modal, kabupaten_id);

            modal.find('select[name="provinsi_id"]').change(function(){
                var provinsi_id = $(this).val();
                getRegency(provinsi_id, modal);
            });
            modal.find('select[name="provinsi_id"]').select2()
        });

        function getRegency(provinsi_id, modal, kabupaten_id){
            var regencySelect = modal.find('select[name="kabupaten_id"]');
            $.ajax({
                url: '/getRegencyByProvinceId/' + provinsi_id,
                type: 'get',
                beforeSend: function(){
                    regencySelect.empty()
                }, success: function(res){
                    regencySelect.append(`<option value="" selected disabled>- Pilih Kabupaten/Kota -</option>`)
                    for (let i = 0; i < res.length; i++) {
                        if(kabupaten_id == res[i].id){
                            regencySelect.append(`<option value="${ res[i].id }" selected>${ res[i].name }</option>`)
                        }else{
                            regencySelect.append(`<option value="${ res[i].id }">${ res[i].name }</option>`)
                        }
                    }

                    regencySelect.attr('disabled', false)
                }
            })
            regencySelect.select2()
        }
    });
</script>
@endforeach