@extends('adminlte::page')

@section('title', 'Master Data Bangsa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-light pt-4 pb-3 shadow-sm">
                            <h5 class="text-dark text-capitalize ps-3"><b>Data Bangsa</b></h5>
                        </div>
                    </div>
                    <div class="card-body pb-2 m-auto w-100">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('bangsa.store') }}">
                                    @csrf
        
                                    <div id="target_fields">
                                        <div class="form-group row">
                                            <label for="bulan" class="col-md-2 col-form-label text-md-right">Nama Bangsa</label>
                                            <div class="col-md-8 mb-3">
                                                <input type="text" class="form-control" name="bangsa" required>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-2">
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
                            <div class="col-md">
                                <table id="targetTable" class="table table-stripped position-relative text-center">
                                    <thead id="theadTarget">
                                        <tr>
                                            <th width="10%">Action</th>
                                            <th class="text-left">Bangsa</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach ($bangsa as $data)
                                        <tr>
                                            <td>
                                                <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteTargetModal{{ $data->id }}"
                                                    style="border: none !important; background-color:transparent">
                                                    <i class="fa-solid fas-xs fa-trash-can"></i></button> &nbsp;
                                                <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editTargetModal{{ $data->id }}"
                                                    style="border: none !important; background-color:transparent">
                                                    <i class="fa-solid fas-xs fa-pencil">
                                                    </i>
                                                </button>    
                                            </td>
                                            <td class="text-left">{{  $data->bangsa }}</td>
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

    @foreach ($bangsa as $row)

    <div class="modal fade" id="editTargetModal{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Edit Data Bangsa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" >
                    <!-- Form fields for editing target data -->
                    <form action="{{ url('bangsa/'.$row->id) }}" href="javascript:void(0)" method="POST" id="editTargetForm{{ $row->id }}" name="editTargetForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="editTahun">Bangsa :</label>
                            <input type="text" class="form-control @error('bangsa') is invalid @enderror" name="bangsa" value="{{ old('bangsa', $row->bangsa) }}">
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
        
    <div class="delete-confirmation modal fade" id="deleteTargetModal{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Hapus Data Bangsa</h4>
                    <p>Apakah anda yakin ingin menghapus data?</p>
                </div>
                <form action="{{ url('bangsa/'.$row->id) }}" method="post">
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