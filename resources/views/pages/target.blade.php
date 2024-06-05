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
                                            <div class="col-md-6">
                                                {{-- <input id="bulan" type="month" class="form-control" name="bulan" required> --}}
                                                <select name="bulan" id="bulan" class="form-control" required>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>

                                            <label for="target_bulanan" class="col-md-4 col-form-label text-md-right">Target Bulanan</label>
                                            <div class="col-md-6">
                                                <input id="target_bulanan" type="number" class="form-control" name="target_bulanan" required>
                                            </div>

                                            <label for="tahun" class="col-md-4 col-form-label text-md-right">Tahun</label>
                                            <div class="col-md-6">
                                                <input id="tahun" type="text" class="form-control" name="tahun" required>
                                            </div>

                                            <label for="target_tahunan" class="col-md-4 col-form-label text-md-right">Target Tahunan</label>
                                            <div class="col-md-6">
                                                <input id="target_tahunan" type="number" class="form-control" name="target_tahunan" required>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
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
                                            <th>Action</th>
                                            <th>Bulan</th>
                                            <th>Taget</th>
                                            <th>Tahun</th>
                                            <th>Target</th>
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
                                            <td>{{ $data->bulan }}</td>
                                            <td>{{ $data->target_bulanan }}</td>
                                            <td>{{ $data->tahun }}</td>
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
                    <h4 class="modal-title" id="staticBackdropLabel">Edit Target by ID : <b>{{ $data->id }}</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" >
                    <!-- Form fields for editing target data -->
                    <form action="{{ url('target/'.$data->id) }}" href="javascript:void(0)" method="POST" id="editTargetForm{{ $data->id }}" name="editTargetForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="editBulan">Bulan</label>
                            <input type="text" class="form-control @error('bulan') is invalid @enderror" id="bulan" name="bulan" value="{{ old('bulan', $data->bulan) }}">
                        </div>
                        <div class="form-group">
                            <label for="editTargetBulan">Target Bulanan :</label>
                            <input type="text" class="form-control @error('target_bulanan') is invalid @enderror" id="target_bulanan" name="target_bulanan" value="{{ old('target_bulanan', $data->target_bulanan) }}">
                        </div>
                        <div class="form-group">
                            <label for="editTahun">Tahun :</label>
                            <input type="text" class="form-control @error('tahun') is invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $data->tahun) }}">
                        </div>
                        <div class="form-group">
                            <label for="editTargetTahun">Target Tahunan :</label>
                            <input type="text" class="form-control @error('target_tahunan') is invalid @enderror" id="target_tahunan" name="target_tahunan" value="{{ old('target_tahunan', $data->target_tahunan) }}">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="updateBtn" class="btn btn-primary" href="javascript:void(0)">Update</button>
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
                    <h4 class="modal-title">Hapus Data By Id: {{ $data->id }}</h4>
                    <p>Apakah anda yakin ingin menghapus data?</p>
                </div>
                <form action="{{ url('target/'.$data->id) }}" method="post">
                    @method("DELETE")
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger delete-confirmation-button">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@stop