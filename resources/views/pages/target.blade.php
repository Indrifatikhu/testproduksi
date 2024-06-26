@extends('adminlte::page')

@section('title', 'Data Target')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-light pt-4 pb-3 shadow-sm">
                            <h5 class="text-dark text-capitalize ps-3"><b>Data Target Bulanan dan Tahunan</b></h5>
                        </div>
                    </div>
                    <div class="card-body pb-2 m-auto w-100">
                        <div class="row">
                            <div class="col-auto">
                                <form method="POST" action="{{ route('target.store') }}">
                                    @csrf
        
                                    <div id="target_fields">
                                        <div class="form-group row">
                                            <label for="bulan" class="col-md-4 col-form-label text-md-right">Bulan</label>
                                            <div class="col-md-6 mb-3">
                                                {{-- <input id="bulan" type="month" class="form-control" name="bulan" required> --}}
                                                <select name="bulan" id="bulan" class="form-control" required>
                                                    @foreach(range(1, 12) as $m)
                                                        <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label for="tahun" class="col-md-4 col-form-label text-md-right">Tahun</label>
                                            <div class="col-md-6 mb-3">
                                                <input id="tahun" type="number" class="form-control" name="tahun" required>
                                            </div>

                                            <label for="target_bulanan" class="col-md-4 col-form-label text-md-right">Target Bulanan</label>
                                            <div class="col-md-6 mb-3">
                                                <input id="target_bulanan" type="number" class="form-control" name="target_bulanan" required>
                                            </div>

                                            <label for="target_tahunan" class="col-md-4 col-form-label text-md-right">Target Tahunan</label>
                                            <div class="col-md-6">
                                                <input id="target_tahunan" type="number" class="form-control" name="target_tahunan" required>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
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
                        <div class="row">
                            <div class="col-md">
                                <table id="targetTable" class="table table-stripped position-relative text-center">
                                    <thead id="theadTarget">
                                        <tr>
                                            <th width="10%">Action</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Target Bulanan</th>
                                            <th>Target Tahunan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyTarget">
                                        @foreach ($data_target as $data)
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
                                            <td>{{  date('F', mktime(0, 0, 0, $data->bulan, 10)) }}</td>
                                            <td>{{ $data->tahun }}</td>
                                            <td>{{ $data->target_bulanan }}</td>
                                            <td>{{ $data->target_tahunan }}</td>
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

    @foreach ($data_target as $data)

    <div class="modal fade" id="editTargetModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Edit Data Target</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" >
                    <!-- Form fields for editing target data -->
                    <form action="{{ url('target/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editTargetForm{{ $data->id }}" name="editTargetForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="editBulan">Bulan</label>
                            <select name="bulan" id="bulan" class="form-control @error('bulan') is invalid @enderror" required>
                                @foreach(range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ old('bulan', $data->bulan) == $m ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 10)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editTahun">Tahun :</label>
                            <input type="number" class="form-control @error('tahun') is invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $data->tahun) }}">
                        </div>
                        <div class="form-group">
                            <label for="editTargetBulan">Target Bulanan :</label>
                            <input type="number" class="form-control @error('target_bulanan') is invalid @enderror" id="target_bulanan" name="target_bulanan" value="{{ old('target_bulanan', $data->target_bulanan) }}">
                        </div>
                        <div class="form-group">
                            <label for="editTargetTahun">Target Tahunan :</label>
                            <input type="number" class="form-control @error('target_tahunan') is invalid @enderror" id="target_tahunan" name="target_tahunan" value="{{ old('target_tahunan', $data->target_tahunan) }}">
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
        
    <div class="delete-confirmation modal fade" id="deleteTargetModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Hapus Data Target</h4>
                    <p>Apakah anda yakin ingin menghapus data?</p>
                </div>
                <form action="{{ url('target/'.$data->id) }}" method="post">
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