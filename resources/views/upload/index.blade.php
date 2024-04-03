@extends('layouts.main')
@section('container')

<div class="container-sm justify-content-center">
    <div class="row justify-content">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center" style="background-color: #d1e7dd">
                    <h2><b>Upload File Produksi</b></h2>    
                </div>

                <div class="card-body">
                    <div class="card-body">
                        {{-- First FORM for filter data in table --}}
                        <form class="form-horizontal" action="/upload" method="GET">
                            @csrf
                            <div class="form-body">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div><h3><b>Filter</b></h3></div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar">From Date</i>&nbsp;
                                            <span></span> 
                                            <i class="fa fa-caret-down"></i>&nbsp; 
                                            <label for="from_date">From Date</label>
                                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"><span></span>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> 
                                            <i class="fa fa-caret-down"></i>&nbsp; 
                                            <label for="to_date">To Date</label>
                                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"><span></span>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="bangsa" class="control-label">Bangsa</label>
                                                <select id="bangsa" class="form-control select" name="bangsa">
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
                                                <select class="form-control select2" id="perPage" name="perPage" fdprocessedid="2kbyjf">
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
                                            <div class="form-actions">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="submit" class="btn btn-success mt-4" style="">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
    
                        <hr style="border-color: black;">
    
                        {{-- Second FORM for Upload Excel File --}}
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md">
                                    <div><h3><b>Input File Produksi Harian</b></h3></div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Format File: Excel</label>
                                        <input class="form-control" type="file" name="file" id="formFile">
                                    </div>
                                    <button type="submit" class="btn btn-success" style="">Import</button> &nbsp;
                                    <button type="button" class="btn btn-success" href="javascript:void(0)" onclick="add()" data-bs-toggle="modal" data-bs-target="#produksi-modal" id="$fetchId[id]">
                                        Add Production Data Manually
                                    </button>
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
                        </form>

                        <hr style="border-color: black;">

                        {{-- Table Data --}}
                        @if (empty($filter_bangsa && $filter_bull))
                            <!-- Iterate over $allData to display ALL results -->
                            <table class="table table-fixed table-bordered" id="" style="table-layout: fixed; text-align:center">
                                <thead class="table-success" id="">
                                    <th style="width: 5%">
                                        <div class="floatL t5">
                                            <input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox">
                                        </div>
                                    </th>
                                    <th style="width: 10%">#
                                        <div class="floatL">
                                            <a href="javascript:void(0);" title="Hapus" class="btn btn-default delete-selected-button visually-hidden-focusable">
                                                <i class="fa fa-trash-o text-danger visually-hidden-focusable"></i>
                                                <span class="text-danger visually-hidden-focusable">Hapus</span>
                                            </a>
                                        </div>
                                    </th>
                                    <th style="width: 11%">Date</th>
                                    <th style="width: 11%">Bangsa</th>
                                    <th style="width: 13%">Nama</th>
                                    <th style="width: 10%">Kode Bull</th>
                                    <th style="width: 10%">Kode Batch</th>
                                    <th style="width: 10%">Produksi</th>
                                    <th style="width: 8%">PTM</th>
                                    <th style="width: 12%">Konsentrasi</th>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="columnCheckboxes" data-id="{{ $data->id }}" name="columnCheckboxes" id="columnCheckboxes">
                                            </td>
                                            <td><button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-target="deleteModal{{ $data->id }}"><i class="fa-solid fa-trash-can"></i></button> &nbsp; 
                                                <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-target="editModal{{ $data->id }}"><i class="fa-solid fa-pencil"></i></button>
                                            </td>
                                            <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $data->bangsa }}</td>
                                            <td>{{ $data->nama_bull }}</td>
                                            <td>{{ $data->kode_bull }}</td>
                                            <td>{{ $data->kode_batch }}</td>
                                            <td>{{ $data->produksi }}</td>
                                            <td>{{ $data->ptm }}</td>
                                            <td>{{ $data->konsentrasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @else
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="filter_result" class="control-label"><b>Filtered Results for: {{ $filter_bangsa && $filter_bull }}</b></label>
                                </div>
                            </div>
                            
                            <!-- Iterate over $filteredData to display FILTERED results -->
                            <table class="table table-fixed table-bordered" id="" style="table-layout: fixed; text-align:center">
                                <thead class="table-success" id="">
                                    <th style="width: 5%"><input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox"></th>
                                    <th style="width: 10%">#
                                        <div class="floatL">
                                            <a href="javascript:void(0);" title="Hapus" class="btn btn-default delete-selected-button hidden">
                                                <i class="fa fa-trash-o text-danger"></i>
                                                <span class="text-danger">Hapus</span>
                                            </a>
                                        </div>
                                    </th>
                                    
                                    <th style="width: 11%">Date</th>
                                    <th style="width: 11%">Bangsa</th>
                                    <th style="width: 13%">Nama</th>
                                    <th style="width: 10%">Kode Bull</th>
                                    <th style="width: 10%">Kode Batch</th>
                                    <th style="width: 10%">Produksi</th>
                                    <th style="width: 8%">PTM</th>
                                    <th style="width: 12%">Konsentrasi</th>
                                </thead>
                                <tbody>
                                    @foreach ($filteredData as $result)
                                        <tr>
                                            <td><input type="checkbox" class="columnCheckboxes" data-id="{{ $result->id }}" name="columnCheckboxes" id="columnCheckboxes"></td>
                                            <td><button class="icon-button delete-btn" data-id="{{ $result->id }}"><i class="fa-solid fa-trash-can"></i></button> &nbsp; 
                                                <button class="icon-button edit-btn" data-id="{{ $result->id }}"><i class="fa-solid fa-pencil"></i></button>
                                            </td>
                                            <td>{{ $result->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $result->bangsa }}</td>
                                            <td>{{ $result->nama_bull }}</td>
                                            <td>{{ $result->kode_bull }}</td>
                                            <td>{{ $result->kode_batch }}</td>
                                            <td>{{ $result->produksi }}</td>
                                            <td>{{ $result->ptm }}</td>
                                            <td>{{ $result->konsentrasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        @endif
                        
                    </div>
                    
                    <!-- Create Modal - Add Production Data Manually -->
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





@endsection