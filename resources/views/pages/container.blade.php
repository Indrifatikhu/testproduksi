@extends('adminlte::page')

@section('title', 'Master Data Bangsa')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Data Containers</b></h5>
                    </div>
                </div>
                <div class="card-body pb-2 m-auto w-100">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('containers.store') }}">
                                @csrf
    
                                <div id="target_fields">
                                    <div class="form-group row">
                                        <label for="bulan" class="col-md-3 col-form-label text-md-right">Nama Container</label>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" name="code" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bulan" class="col-md-3 col-form-label text-md-right">Nomor Container</label>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" name="nama_container" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bulan" class="col-md-3 col-form-label text-md-right">Type Container</label>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" name="type_container" required>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-sm btn-block btn-primary"><i class="fas fa-save mr-2"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if ($errors->any())
                            <div class="my-3">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        @if (session('success'))
                            <div class="my-3">
                                <div class="alert alert-success">
                                    {{ session('success')    }}
                                </div>
                            </div>                                    
                        @endif
                    </div>
                    <hr>
                    <input type="text" id="myInput" class="form-control form-control-sm" placeholder="Search ...">
                    <div class="row">
                        <div class="col-md" style="max-height: 700px; overflow:auto">
                            <table id="targetTable" class="table table-stripped position-relative text-center">
                                <thead id="theadTarget">
                                    <tr>
                                        <th width="10%">Action</th>
                                        <th class="text-left" width="10%">Nama Container</th>
                                        <th class="text-left" width="10%">Nomor Container</th>
                                        <th class="text-left">Type Container</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($containers as $data)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent">
                                                <i class="fa-solid fas-xs fa-trash-can"></i></button> &nbsp;
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent">
                                                <i class="fa-solid fas-xs fa-pencil">
                                                </i>
                                            </button>
                                            <button class="icon-button btn-detail-container" 
                                                data-id="{{ $data->id }}"
                                                data-container="{{ $data->code }}"
                                                data-nomor="{{ $data->nama_container }}"
                                                data-type="{{ $data->type_container }}"
                                                style="border: none !important; background-color:transparent">
                                                <i class="fa-solid fas-xs fa-eye">
                                                </i>
                                            </button>
                                        </td>
                                        <td class="text-left">{{  $data->code }}</td>
                                        <td class="text-left">{{  $data->nama_container }}</td>
                                        <td class="text-left">{{  $data->type_container }}</td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="staticBackdropLabel">Edit Data Container</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body" >
                                                    <!-- Form fields for editing target data -->
                                                    <form action="{{ url('containers/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editTargetForm{{ $data->id }}" name="editTargetForm" class="form-horizontal" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="editTahun">Nama Container</label>
                                                                    <input type="text" class="form-control" name="code" value="{{ $data->code }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="editTahun">Nomor Container</label>
                                                                    <input type="text" class="form-control" name="nama_container" value="{{ $data->nama_container }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="editTahun">Type Container</label>
                                                                    <input type="text" class="form-control" name="type_container" value="{{ $data->type_container }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-end">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
                                                            <button type="submit" id="updateBtn" class="btn btn-sm btn-primary" href="javascript:void(0)"><i class="fas fa-save mr-2"></i>Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="delete-confirmation modal fade" id="deleteModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="modal-title">Hapus Data Container</h4>
                                                    <p>Apakah anda yakin ingin menghapus data?</p>
                                                </div>
                                                <form action="{{ url('containers/'.$data->id) }}" method="post">
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Detail Container : <strong class="detail-container-name">HC007</strong></h4>        
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-fixed table-bordered text-center mb-2 mt-2 table-hover" style="table-layout: fixed">
                    <thead>
                        <tr>
                            <th>Nama Bull</th>
                            <th>Kode Bull</th>
                            <th>Bangsa</th>
                            <th>Kode Batch</th>
                            <th>PTM (%)</th>
                            <th>Konsentrasi</th>
                            <th>Produksi</th>
                            <th>Distribusi</th>
                        </tr>
                    </thead>
                    <tbody id="table-history">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default btn-block" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Tutup</button>
            </div>
        </div>
    </div>
</div>
@stop