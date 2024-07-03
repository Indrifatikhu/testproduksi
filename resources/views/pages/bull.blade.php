@extends('adminlte::page')

@section('title', 'Master Data Bangsa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-light pt-4 pb-3 shadow-sm">
                            <h5 class="text-dark text-capitalize ps-3"><b>Data Bull</b></h5>
                        </div>
                    </div>
                    <div class="card-body pb-2 m-auto w-100">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('bull.store') }}">
                                    @csrf
        
                                    <div id="target_fields">
                                        <div class="form-group row">
                                            <label for="editBulan" class="col-md-3 col-form-label text-md-right">Bangsa</label>
                                            <div class="col-md-6 mb-3">
                                                <select name="id_bangsa" class="form-control @error('id_bangsa') is invalid @enderror" required>
                                                    <option value="" disabled selected>- PILIH BANGSA -</option>
                                                    @foreach($bangsa as $b)
                                                        <option value="{{ $b->id }}">{{ $b->bangsa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bulan" class="col-md-3 col-form-label text-md-right">Nama Bull</label>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" name="bull" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bulan" class="col-md-3 col-form-label text-md-right">Kode Bull</label>
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" name="kode_bull" required>
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
                                            <th class="text-left" width="10%">Bangsa</th>
                                            <th class="text-left">Nama Bull</th>
                                            <th class="text-left" width="10%">Kode Bull</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach ($bull as $data)
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
                                            </td>
                                            <td class="text-left">{{  $data->bangsa->bangsa }}</td>
                                            <td class="text-left">{{  $data->bull }}</td>
                                            <td class="text-left">{{  $data->kode_bull }}</td>
                                        </tr>
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


    {{-- Modal Blade --}}

    @foreach ($bull as $row)

    <div class="modal fade" id="editModal{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Edit Data Bangsa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" >
                    <!-- Form fields for editing target data -->
                    <form action="{{ url('bull/'.$row->id) }}" href="javascript:void(0)" method="POST" id="editTargetForm{{ $row->id }}" name="editTargetForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editTahun">Bangsa</label>
                                    <select name="id_bangsa" class="form-control" required>
                                        <option value="" disabled selected>- PILIH BANGSA -</option>
                                        @foreach($bangsa as $b)
                                            <option {{ $b->id == $row->id_bangsa ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->bangsa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="editTahun">Bull</label>
                                    <input type="text" class="form-control" name="bull" value="{{ $row->bull }}" required>
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

    <!-- Delete confirmation dialog -->
    <div class="delete-confirmation modal fade" id="deleteModal{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Hapus Data Bull</h4>
                    <p>Apakah anda yakin ingin menghapus data?</p>
                </div>
                <form action="{{ url('bull/'.$row->id) }}" method="post">
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

@stop