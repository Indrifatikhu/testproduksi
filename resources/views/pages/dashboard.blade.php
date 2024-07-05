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
                                    <th width="20%">Month</th>
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
                                    <th width="5px">No</th>
                                    <th width="5px">Bulan</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Persentase Bulanan</th>
                                    <th>Tahun</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Persentase Tahunan</th>
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

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>Target Produksi Bangsa</b></h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <table id="targetBangsaTable" class="table table-stripped text-center">
                            <thead>
                                <tr>
                                    <th width="5px">No</th>
                                    <th width="5px">Bulan</th>
                                    <th>Bangsa</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Persentase Bulanan</th>
                                    <th>Tahun</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Persentase Tahunan</th>
                                    <th></th>
                                </tr>
                            </thead>
    
                            <tbody >
                                @php $no=1; @endphp
                                @foreach($targetBangsa as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{  date('F', mktime(0, 0, 0, $row['bulan'], 10)) }}</td>
                                        <td>{{ $row['bangsa']->bangsa }}</td>
                                        <td>{{ $row['target_bulanan'] }}</td>
                                        <td>{{ $row['realisasi_bulanan'] }}</td>
                                        <td>{{ $row['persentase_bulanan'] }}%</td>
                                        <td>{{ $row['tahun'] }}</td>
                                        <td>{{ $row['target_tahunan'] }}</td>
                                        <td>{{ $row['realisasi_tahunan'] }}</td>
                                        <td>{{ $row['persentase_tahunan'] }}%</td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-detail-target-bangsa" 
                                                data-id="{{ $row['id'] }}" 
                                                data-tahun="{{ $row['tahun'] }}"
                                                data-bulan="{{  date('F', mktime(0, 0, 0, $row['bulan'], 10)) }}"
                                                data-bangsa="{{ $row['bangsa']->bangsa }}"
                                            ><i class="fas fa-eye"></i></button>
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

<div class="modal fade-lg" id="produksi-report-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><strong class="text-center" id="label-report"></strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <div class="modal-body"> -->
                <table class="table table-stripped table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-left">Bull</th>
                            @foreach(range(1, 12) as $m)
                                <th class="text-center" width="5px">{{  sprintf('%02d', $m) }}</th>
                            @endforeach
                            <th class="text-center" width="5px">Total</th>
                        </tr>
                    </thead>
                    <tbody id="produksibulltable">
                        
                    </tbody>
                    <tfoot id="produksibulltotal">
                        
                    </tfoot>
                </table>
            <!-- </div> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary btn-block" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
            </div>
        </div>
    </div>
</div>

@stop