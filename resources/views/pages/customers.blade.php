@extends('adminlte::page')

@section('title', 'Distribusi')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="text-dark text-capitalize ps-3"><b>Tambah Data Customer</b></h5>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-block btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#import-modal"><i class="fas fa-upload mr-2"></i>Import</button>&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-2 m-auto w-100">
                    <div class="row">
                        <div class="col-auto">
                            <form method="POST" action="{{ route('customers.store') }}">
                                @csrf
                                <div id="target_fields">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-md-left">Nama Instansi/Pelanggan</label>
                                        <div class="col-sm-7 mb-2">
                                            <input type="text" class="form-control" name="nama_instansi" required>
                                        </div>

                                        <label class="col-sm-3 col-form-label text-md-left">Alamat</label>
                                        <div class="col-sm-7 mb-2">
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>

                                        <label class="col-sm-3 col-form-label text-md-left">Contact Person</label>
                                        <div class="col-sm-7 mb-2">
                                            <input type="text" class="form-control" name="contact_person" required>
                                        </div>

                                        <label class="col-sm-3 col-form-label text-md-left">Telp</label>
                                        <div class="col-sm-7 mb-2">
                                            <input type="text" class="form-control" name="telp" required>
                                        </div>

                                        <label for="tujuan_distribusi" class="col-sm-3 col-form-label text-md-left">Provinsi</label>
                                        <div class="col-sm-7 mb-2">
                                            <select name="provinsi_id" id="provinsi_id" class="form-control js-example-basic-single" required>
                                                <option value="" selected disabled>- Pilih Provinsi -</option>
                                                @foreach($provinces as $p)
                                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="tujuan_distribusi" class="col-sm-3 col-form-label text-md-left">Kabupaten/Kota</label>
                                        <div class="col-sm-7 mb-2">
                                            <select name="kabupaten_id" id="regency_id" class="form-control js-example-basic-single" required disabled>
                                                <option value="" selected disabled>- Pilih Kabupaten/Kota -</option>
                                                
                                            </select>
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
                    <input type="text" id="myInput" class="form-control form-control-sm" placeholder="Search ...">
                    <table class="table table-fixed table-bordered text-center mb-2 mt-2" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    <th style="width: 8%; text-align: center">
                                        <div class="floatU">Action</div>
                                    </th>
                                    <th style="width: 15%; text-align: center">Nama Instansi</th>
                                    <th style="text-align: left">Alamat</th>
                                    <th style="width: 10%; text-align: center">Contact Person</th>
                                    <th style="width: 10%; text-align: center">Telp</th>
                                    <th style="width: 10%; text-align: center">Provinsi</th>
                                    <th style="width: 10%; text-align: center">Kabupaten</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($customers as $data)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}" 
                                                style="border: none !important; background-color:transparent; size"><i class="fa-solid fa-xs fa-trash-can"></i></button>
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-pencil"></i></button>
                                        </td>
                                        <td class="text-left">{{ $data->nama_instansi }}</td>
                                        <td class="text-left">{{ $data->alamat }}</td>
                                        <td class="text-left">{{ $data->contact_person }}</td>
                                        <td class="text-center">{{ $data->telp }}</td>
                                        <td class="text-left">{{ $data->provinsi }}</td>
                                        <td class="text-left">{{ $data->kabupaten }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="import-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import File Customers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" action="customersimport" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Format File: Excel</label>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-upload mr-2"></i>Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop