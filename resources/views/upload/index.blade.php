@extends('adminlte::page')

@section('title', 'Upload Data')


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Tambah Data Produksi</b></h5>
                    </div>
                </div>

                <div class="card-body">
                    {{-- First FORM for filter data in table --}}
                    <form class="form-horizontal" action="/upload" method="GET">
                        @csrf
                        <div class="form-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-3">
                                        <span></span> 
                                        <label for="from_date">From Date</label>
                                        <input type="text" name="from_date" id="from_date" class="form-control @error('Tanggal') is invalid @enderror" value="{{ @$from_date }}" placeholder="From Date('Y-M-D')"><span></span>
                                    </div>
                                    <div class="col-md-3">
                                        <span></span> 
                                        <label for="to_date">To Date</label>
                                        <input type="text" name="to_date" id="to_date" class="form-control" value="{{ @$to_date }}" placeholder="To Date('Y-M-D')"><span></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bangsa" class="control-label">Bangsa</label>
                                            <select id="bangsa" class="form-control select" name="bangsa" value="{{ @$bangsa }}">
                                                <option value="ALL" selected="">Semua Bangsa</option>
                                                <option value="SAPI">Sapi</option>
                                                <option value="MADURA">Madura</option>
                                                <option value="ACEH">Aceh</option>
                                                <option value="ANGUS">Angus</option>
                                                <option value="BALI">Bali</option>
                                                <option value="LIMOUSIN">Limousin</option>
                                                <option value="ONGOLE">Ongole</option>
                                                <option value="BRAHMAN">Brahman</option>
                                                <option value="SIMMENTAL">Simmental</option>
                                                <option value="FH">FH</option>
                                                <option value="WAGYU">Wagyu</option>
                                                <option value="BELGIAN Blue">Belgian Blue</option>
                                                <option value=""></option>
                                                <option value="KAMBING">Kambing</option>
                                                <option value="BOER">Boer</option>
                                                <option value="SAANEN">Saanen</option>
                                                <option value="SENDURO">Senduro</option>
                                                <option value="PE">PE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama_bull" class="control-label">Nama</label>
                                            <input type="text" name="nama_bull" id="nama_bull" class="form-control" placeholder="Nama bull">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="perPage" class="control-label">Jumlah data perpage</label>
                                            <select class="form-control select2" id="perPage" name="perPage">
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-actions">
                                                <div class="btn-group-sm" role="group" aria-label="true" style="margin-top: 35px">
                                                    <button type="submit" class="btn btn-success">Cari</button>&nbsp;
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-modal">Import</button>&nbsp;
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#produksi-modal">Tambah Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            </fieldset>
                        </div>
                    </form>
                    <hr>
                    {{-- Table Data --}}
                    @if (empty($filter_bangsa && $filter_bull))
                        <!-- Iterate over $allData to display ALL results -->
                        <table class="table table-fixed table-bordered text-center" id="myTable" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 4%; text-align: center">
                                        <div class="floatL t5">
                                            <input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox">
                                            <input type="checkbox" onclick="toggleSelectAll(this)">
                                        </div>
                                    </th> --}}
                                    <th style="width: 8%; text-align: center">
                                        <div class="floatU">
                                            Action
                                        </div>
                                    </th>
                                    <th style="width: 10%; text-align: center">Date</th>
                                    <th style="width: 10%; text-align: center">Kode Bull</th>
                                    <th style="width: 14%; text-align: center">Bangsa</th>
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
                                        {{-- <td>
                                            <input type="checkbox" class="columnCheckboxes" data-id="{{ $data->id }}" name="columnCheckboxes" id="columnCheckboxes">
                                        </td> --}}
                                        <td><button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}" 
                                                style="border: none !important; background-color:transparent; size"><i class="fa-solid fa-xs fa-trash-can"></i></button>
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-pencil"></i></button>
                                        </td>
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
                        {{ $filteredData->links() }}
                        </table>

                    @else
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="filter_result" class="control-label"><b>Filtered Results for:</b></label>
                            </div>
                        </div>
                        
                        <!-- Iterate over $filteredData to display FILTERED results -->
                        <table class="table table-relative table-bordered text-center" id="myTable">
                            <thead class="table-success" id="">
                                {{-- <th style="width: 5%; text-align: center"><input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox"></th> --}}
                                <th style="width: 8%; text-align: center">
                                    <div class="floatU">
                                        Action
                                    </div>
                                    <div class="floatD visually-hidden">
                                        <a href="javascript:void(0);" title="hapus" class="btn btn-default delete-selected-button hidden">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                            <span class="text-danger">Hapus</span>
                                        </a>
                                    </div>
                                </th>
                                <th style="width: 15%; text-align: center">Date</th>
                                <th style="width: 12%; text-align: center">Kode Bull</th>
                                <th style="width: 14%; text-align: center">Bangsa</th>
                                <th style="width: 12%; text-align: center">Kode Batch</th>
                                <th style="width: 12%; text-align: center">Produksi</th>
                                <th style="width: 9%; text-align: center">PTM (%)</th>
                                <th style="width: 13%; text-align: center">Konsentrasi (Juta)</th>
                            </thead>
                            <tbody>
                                @foreach ($filteredData as $result)
                                    <tr>
                                        {{-- <td><input type="checkbox" class="columnCheckboxes" data-id="{{ $result->id }}" name="columnCheckboxes" id="columnCheckboxes"></td> --}}
                                        <td><button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}" 
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-trash-can"></i></button>
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-pencil"></i></button>
                                        </td>
                                        <td>{{ $result->tanggal }}</td>
                                        <td>{{ $result->kode_bull }}</td>
                                        <td>{{ $result->bangsa }}</td>
                                        <td>{{ $result->kode_batch }}</td>
                                        <td>{{ $result->produksi }}</td>
                                        <td>{{ $result->ptm }}</td>
                                        <td>{{ $result->konsentrasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        {{ $filteredData->links() }}
                        </table>
                    @endif
                    
                
                    <!-- import Modal -->
                    @include('upload.import-modal')

                    <!-- Add Modal -->
                    @include('upload.create-modal')

                    <!-- Edit Modal -->
                    @include('upload.edit-modal')
                    
                    <!-- Delete Modal - Add Production Data Manually -->
                    @include('upload.delete-modal')
                </div>
            </div>
        </div>
    </div>
</div>

@stop
