@extends('adminlte::page')

@section('title', 'Dashboard')
            
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Capaian Produksi Bulanan</b></h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <table id="summaryTable" class="table table-bordered text-center">
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

                    <table class="table table-fixed table-stripped" id="myTable" 
                        style="table-layout: fixed; text-align:center; vertical-align: middle; display: none">
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
                </div>
            </div>
        </div>
    </div>


{{-- Second Card to show Target Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Target Produksi</b></h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <table id="targetTable" class="table table-stripped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Tahun</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
    
                            <tbody id="targetBody">
                                <!-- The summary will be added here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop