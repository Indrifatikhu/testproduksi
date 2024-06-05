@extends('adminlte::page')

@section('title', 'Data Target')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Tambah Data Distribusi Semen Beku</b></h5>
                    </div>
                </div>
                <div class="card-body pb-2 m-auto w-100">
                    <div class="row">
                        <div class="col-auto">
                            <form method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <div id="target_fields">
                                    <div class="form-group row">
                                        <label for="bangsa" class="col-sm-3 col-form-label text-md-left">Bangsa</label>
                                        <div class="col-sm-7">
                                            <input id="bangsa" type="text" class="form-control" name="bangsa" required>
                                        </div>

                                        <label for="kode_batch" class="col-sm-3 col-form-label text-md-left">Kode Batch</label>
                                        <div class="col-sm-7">
                                            <input id="kode_batch" type="text" class="form-control" name="kode_batch" required>
                                        </div>

                                        <label for="kode_bull" class="col-sm-3 col-form-label text-md-left">Kode Bull</label>
                                        <div class="col-sm-7">
                                            <input id="kode_bull" type="text" class="form-control" name="kode_bull" required>
                                        </div>
                                        
                                        <label for="nama_bull" class="col-sm-3 col-form-label text-md-left">Nama Bull</label>
                                        <div class="col-sm-7">
                                            <input id="nama_bull" type="text" class="form-control" name="nama_bull" required>
                                        </div>
                                        
                                        <label for="tgl_distribusi" class="col-sm-3 col-form-label text-md-left">Tanggal Distribusi</label>
                                        <div class="col-sm-7">
                                            <input id="tgl_distribusi" type="date" class="form-control" name="tgl_distribusi" required>
                                        </div>

                                        <label for="jml_distribusi" class="col-sm-3 col-form-label text-md-left">Jumlah Distribusi</label>
                                        <div class="col-sm-7">
                                            <input id="jml_distribusi" type="number" class="form-control" name="jml_distribusi" required>
                                        </div>

                                        <label for="tujuan_distribusi" class="col-sm-3 col-form-label text-md-left">Tujuan Distribusi</label>
                                        <div class="col-sm-7">
                                            <input id="tujuan_distribusi" type="text" class="form-control" name="tujuan_distribusi" required>
                                        </div>

                                        <label for="container" class="col-sm-3 col-form-label text-md-left">Container</label>
                                        <div class="col-sm-7">
                                            <input id="container" type="text" class="form-control" name="container" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>

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
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-fixed table-bordered" id="myTable" 
                                style="table-layout: fixed; text-align:center; vertical-align: middle; display:none">
                                <thead class="table-success">
                                    <tr>
                                        <th style="width: 4%; text-align: center">
                                        
                                        </th>
                                        <th style="width: 8%; text-align: center">
                                            <div class="floatU">
                                                Action
                                            </div>
                                        </th>
                                        <th style="width: 10%; text-align: center">Date</th>
                                        <th style="width: 14%; text-align: center">Bangsa</th>
                                        <th style="width: 10%; text-align: center">Kode Bull</th>
                                        <th style="width: 12%; text-align: center">Kode Batch</th>
                                        <th style="width: 12%; text-align: center">Produksi</th>
                                        <th style="width: 9%; text-align: center">PTM (%)</th>
                                        <th style="width: 13%; text-align: center">Konsentrasi (Juta)</th>
                                        <th style="width: 8%; text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->kode_bull }}</td>
                                            <td>{{ $data->bangsa }}</td>
                                            <td>{{ $data->kode_batch }}</td>
                                            <td>{{ $data->produksi }}</td>
                                            <td>{{ $data->ptm }}</td>
                                            <td>{{ $data->konsentrasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <table id="targetTable" class="table table-striped position-relative text-center">
                                <thead id="theadTarget">
                                    <tr>
                                        <th>Action</th>
                                        <th>Bangsa</th>
                                        <th>Kode Batch</th>
                                        <th>Kode Bull</th>
                                        <th>Nama Bull</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Tujuan</th>
                                        <th>Container</th>
                                        <th>Sisa</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyDistribusi">
                                @foreach ($data_distribusi as $data)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteCartModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fas fa-xs fa-trash"></i></button> &nbsp; 
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editCartModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fas fa-xs fa-pen-square"></i></button>
                                        </td>
                                        <td>{{ $data->bangsa }}</td>
                                        <td>{{ $data->kode_batch }}</td>
                                        <td>{{ $data->kode_bull }}</td>
                                        <td>{{ $data->nama_bull }}</td>
                                        <td>{{ $data->tgl_distribusi }}</td>
                                        <td>{{ $data->jml_distribusi }}</td>
                                        <td>{{ $data->tujuan_distribusi }}</td>
                                        <td>{{ $data->container }}</td>
                                        <td></td>
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


<!-- Edit Modal -->
@include('pages.editCartModal')

@stop
