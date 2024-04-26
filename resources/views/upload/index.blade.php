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
                                        <input type="text" name="from_date" id="from_date" class="form-control" value="{{ @$from_date }}" placeholder="From Date('Y-M-D')"><span></span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> 
                                        <i class="fa fa-caret-down"></i>&nbsp; 
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
                                        <div class="form-actions">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" class="btn btn-success mt-4">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>

                    <hr style="border-color: black;">

                    {{-- Table Data --}}
                    @if (empty($filter_bangsa && $filter_bull))
                        <!-- Iterate over $allData to display ALL results -->
                        <table class="table table-fixed table-bordered" id="myTable" style="table-layout: fixed; text-align:center">
                            <thead class="table-success" id="">
                                <tr>
                                    <th style="width: 5%; text-align: center">
                                        <div class="floatL t5">
                                            <input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox">
                                        </div>
                                    </th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $data)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="columnCheckboxes" data-id="{{ $data->id }}" name="columnCheckboxes" id="columnCheckboxes">
                                        </td>
                                        <td><button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}"><i class="fa-solid fa-trash-can"></i></button> &nbsp; 
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"><i class="fa-solid fa-pencil"></i></button>
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
                        <table class="table table-fixed table-bordered" id="myTable" style="table-layout: fixed; text-align:center">
                            <thead class="table-success" id="">
                                <th style="width: 5%; text-align: center"><input type="checkbox" name="selectAllColumnsCheckbox" id="selectAllColumnsCheckbox"></th>
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
                                        <td><input type="checkbox" class="columnCheckboxes" data-id="{{ $result->id }}" name="columnCheckboxes" id="columnCheckboxes"></td>
                                        <td><button class="icon-button delete-btn" data-id="{{ $result->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $result->id }}"><i class="fa-solid fa-trash-can"></i></button> &nbsp; 
                                            <button class="icon-button edit-btn" data-id="{{ $result->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $result->id }}"><i class="fa-solid fa-pencil"></i></button>
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
                    
                    <hr>
                    
                    <div class="mb-3">
                        <table id="summaryTable">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Sum of Produksi</th>
                                </tr>
                            </thead>
    
                            <tbody id="summaryBody">
                                <!-- The summary will be added here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <!-- Edit Modal -->
                @include('upload.edit-modal')
                
                <!-- Delete Modal - Add Production Data Manually -->
                @include('upload.delete-modal')
                    
            </div>
        </div> 
    </div>
</div>





@endsection