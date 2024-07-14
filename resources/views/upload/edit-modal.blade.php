@foreach ($allData as $data)

<div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Edit Data Produksi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" >
                <!-- Form fields for editing user data -->
                <form action="{{ url('upload/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editForm" name="editForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="editTanggal">Tanggal Produksi</label>
                        <input type="date" class="form-control @error('created_at') is invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}">
                    </div>
                    <div class="form-group">
                        <label for="bangsa" class="control-label">Bangsa</label>
                        <select id="select-bangsa-{{ $data->id }}" name="id_bangsa" class="js-example-basic-single form-control @error('id_bangsa') is invalid @enderror" required>
                            <option value="" disabled selected>- PILIH BANGSA -</option>
                            @foreach($bangsa as $b)
                                <option {{ $data->id_bangsa == $b->id ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bangsa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_bull" class="col-sm-3 control-label">Bull</label>
                        <select id="select-bull-{{ $data->id }}" name="id_bull" class="js-example-basic-single form-control" required disabled>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editKodeBatch">Kode Batch</label>
                        <input type="text" class="form-control @error('kode_batch') is invalid @enderror" id="kode_batch" name="kode_batch" value="{{ old('kode_batch', $data->kode_batch) }}">
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="editProduksi">Produksi</label>
                                <input type="text" class="form-control @error('produksi') is invalid @enderror" id="produksi" name="produksi" value="{{ old('produksi', $data->produksi) }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="editPtm">PTM</label>
                                <input type="char" class="form-control @error('ptm') is invalid @enderror" id="ptm" name="ptm" value="{{ old('ptm', $data->ptm) }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="editKonsentrasi">Konsentrasi</label>
                                <input type="char" class="form-control @error('konsentrasi') is invalid @enderror" id="konsentrasi" name="konsentrasi" value="{{ old('konsentrasi', $data->konsentrasi) }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Batal</button>
                        <button type="submit" id="updateBtn" class="btn btn-sm btn-primary" href="javascript:void(0)"><i class="fas fa-save mr-2"></i>Update</button>
                    </div>
                </form>

                <input type="hidden" name="id_bull_old" value="{{ $data->id_bull }}">
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var idid = {{ $data->id }};
        $(`[id^="editModal${ idid }"]`).on('shown.bs.modal', function(event) {
            var modal = $(this);
            var idbangsa = modal.find('select[name="id_bangsa"]').val();
            var idbull = modal.find('input[name="id_bull_old"]').val();

            getBull(idbangsa, modal, idbull);

            modal.find('select[name="id_bangsa"]').change(function(){
                var idbgs = $(this).val();
                getBull(idbgs, modal);
            });

        });

        function getBull(idbangsa, modal, idbull) {
            var bullSelect = modal.find('select[name="id_bull"]');
            $.ajax({
                url: 'bullsByBangsa/' + idbangsa,
                type: 'get',
                beforeSend: function(){
                    bullSelect.empty();
                },
                success: function(res) {
                    bullSelect.append(`<option selected disabled>- PILIH BULL -</option>`);
                    for (let i = 0; i < res.length; i++) {
                        if(idbull == res[i].id){
                            bullSelect.append(`<option value="${ res[i].id }" selected> ${ res[i].kode_bull } - ${ res[i].bull }</option>`);
                        } else {
                            bullSelect.append(`<option value="${ res[i].id }"> ${ res[i].kode_bull } - ${ res[i].bull }</option>`);
                        }
                    }
                    bullSelect.attr('disabled', false);
                }
            });
        }
    });
</script>
<!-- <script>
    var idbull = {{ $data->id_bull }};
    var idbangsa = {{ $data->id_bangsa }};
    var idid = {{ $data->id }};

    getBull{{ $data->id }}(idbangsa);

    $('#select-bangsa-' + idid).change(function(){
        var idbgs = $(this).val()
        getBull{{ $data->id }}(idbgs)
    })

    function getBull{{ $data->id }}(idb){
        $.ajax({
            url: 'bullsByBangsa/' + idb,
            type: 'get',
            beforeSend: function(){
                $('#select-bull-' + idid).empty()
            }, success: function(res){
                $('#select-bull-' + idid).append(`<option selected disabled>- PILIH BULL -</option>`)
                for (let i = 0; i < res.length; i++) {
                    if(idbull === res[i].id){
                        $('#select-bull-' + idid).append(`<option value="${ res[i].id }" selected> ${ res[i].kode_bull } - ${ res[i].bull }</option>`)
                    }else{
                        $('#select-bull-' + idid).append(`<option value="${ res[i].id }"> ${ res[i].kode_bull } - ${ res[i].bull }</option>`)
                    }
                }
                $('#select-bull-' + idid).attr('disabled', false)
            }
        })
    }
</script> -->
@endforeach