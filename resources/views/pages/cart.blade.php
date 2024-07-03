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
                                        <label for="bangsa" class="col-sm-3 col-form-label text-md-left">Produksi</label>
                                        <div class="col-sm-7 mb-2">
                                            <select name="id_produksi" id="" class="form-control js-example-basic-single">
                                                <option value="" disabled selected> [Bangsa / Nama / Kode Bull / Kode Batch] - [Produksi/Sisa]</option>
                                                @foreach($produksi as $row)
                                                    <option value="{{ $row->id }}">{{ '[' . $row->bangsa . ' / ' . $row->bull . ' / ' . $row->kode_bull . ' / ' . $row->kode_batch . '] - [' . $row->produksi . '/' . $row->sisa . ']' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <label for="tgl_distribusi" class="col-sm-3 col-form-label text-md-left">Tanggal Distribusi</label>
                                        <div class="col-sm-7 mb-2">
                                            <input id="tgl_distribusi" type="date" class="form-control" name="tanggal" required>
                                        </div>

                                        <label for="jml_distribusi" class="col-sm-3 col-form-label text-md-left">Jumlah Distribusi</label>
                                        <div class="col-sm-7 mb-2">
                                            <input id="jml_distribusi" type="number" class="form-control" name="jumlah" required>
                                        </div>

                                        <label for="tujuan_distribusi" class="col-sm-3 col-form-label text-md-left">Tujuan Distribusi</label>
                                        <div class="col-sm-7 mb-2">
                                            <input id="tujuan_distribusi" type="text" class="form-control" name="tujuan" required>
                                        </div>

                                        <label for="container" class="col-sm-3 col-form-label text-md-left">Container</label>
                                        <div class="col-sm-7 mb-2">
                                            <input id="container" type="text" class="form-control" name="container" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fas fa-save mr-2"></i> Save</button>
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
                    <hr>
                    <div class="row">
                        <div class="col-md" style="max-height: 700px; overflow:auto">
                        <input type="text" id="myInput" class="form-control form-control-sm" placeholder="Search ...">

                            <table class="table table-fixed table-bordered text-center mb-2 mt-2" style="table-layout: fixed">
                                <thead id="theadTarget">
                                    <tr>
                                        <th>Action</th>
                                        <th>Tanggal</th>
                                        <th>Bangsa</th>
                                        <th>Nama Bull</th>
                                        <th>Kode Bull</th>
                                        <th>Kode Batch</th>
                                        <th>Jumlah</th>
                                        <th>Tujuan</th>
                                        <th>Container</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach ($distribusi as $data)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteCartModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fas fa-xs fa-trash-can"></i></button> &nbsp; 
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editCartModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fas fa-xs fa-pencil"></i></button>
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($data->tanggal)) }}</td>
                                        <td>{{ $data->bangsa }}</td>
                                        <td>{{ $data->bull }}</td>
                                        <td>{{ $data->kode_bull }}</td>
                                        <td>{{ $data->kode_batch }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>{{ $data->tujuan }}</td>
                                        <td>{{ $data->container }}</td>
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
