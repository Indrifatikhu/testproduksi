@extends('layouts.main')
@section('container')

    <h1>Upload File Produksi Harian</h1>
    
    <div class="container-sm justify-content-center">
        <div class="row justify-content">
            <div class="col-md">
                <div class="card">
                    <div class="card-header text-bg-secondary text-center">
                        <h2>Upload File Produksi</h2>    
                    </div>
    
                    <div class="card-body">
    
                        <div class="card-body">
                            {{-- First FORM for filter data in table --}}
                            <form class="form-horizontal" action="/filterNew" method="GET">
                                @csrf
                                <hr style="border-color: black;">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                    </div>
                                    <div class="col-md">
                                        <div class="pull-right mb-2">
                                            <input type="text" name="filterNew" id="filterNew">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="submit" class="btn btn-primary mt-4">Cari</button>
                                    </div>
                                </div>
                            </form>
                        
                            <hr style="border-color: black;">
                            
                            <label for="">Try Yajra DataTables</label><br>
                            <table class="table table-fixed table-bordered" id="yajra_table" style="table-layout: fixed; text-align:center">
                                <thead class="table-success" id="">
                                    <th style="width: 11%">Date</th>
                                    <th style="width: 11%">Bangsa</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 10%">Kode Bull</th>
                                    <th style="width: 12%">Kode Batch</th>
                                    <th style="width: 10%">Produksi</th>
                                    <th style="width: 9%">PTM</th>
                                    <th style="width: 12%">Konsentrasi</th>
                                    <th style="width: 10%">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                        <tr>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->bangsa }}</td>
                                            <td></td>
                                            <td>{{ $data->kode_bull }}</td>
                                            <td>{{ $data->kode_batch }}</td>
                                            <td>{{ $data->produksi }}</td>
                                            <td>{{ $data->ptm }}</td>
                                            <td>{{ $data->konsentrasi }}</td>
                                            <td><button class="icon-button delete-btn" data-id="{{ $data->id }}"><i class="fa-solid fa-trash-can"></i></button> &nbsp; 
                                                <button class="icon-button edit-btn" data-id="{{ $data->id }}"><i class="fa-solid fa-pencil"></i></button>
                                            </td>
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


@endsection