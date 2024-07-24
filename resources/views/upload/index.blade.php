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
                                        <label for="from_date">From Date</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control @error('Tanggal') is invalid @enderror" value="{{ @$from_date }}" placeholder="From Date('Y-M-D')"><span></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="to_date">To Date</label>
                                        <input type="date" name="to_date" id="to_date" class="form-control" value="{{ @$to_date }}" placeholder="To Date('Y-M-D')"><span></span>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bangsa" class="control-label">Bangsa</label>
                                            <select id="bangsa" class="form-control js-example-basic-single" name="bangsa" value="{{ @$bangsa }}">
                                                <option value="">Semua Bangsa</option>
                                                @foreach($bangsa as $b)
                                                    <option value="{{ $b->id }}" {{ request()->get('bangsa') == $b->id ? 'selected' : '' }}>{{ $b->bangsa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="perPage" class="control-label">Perpage</label>
                                            <select class="form-control js-example-basic-single" id="perPage" name="perPage">
                                                <option {{ request()->get('perPage') == 10 ? 'selected' : '' }} value="10">10</option>
                                                <option {{ request()->get('perPage') == 15 ? 'selected' : '' }} value="15">15</option>
                                                <option {{ request()->get('perPage') == 20 ? 'selected' : '' }} value="20">20</option>
                                                <option {{ request()->get('perPage') == 25 ? 'selected' : '' }} value="25">25</option>
                                                <option {{ request()->get('perPage') == 50 ? 'selected' : '' }} value="50">50</option>
                                                <option {{ request()->get('perPage') == 100 ? 'selected' : '' }} value="100">100</option>
                                                <option {{ request()->get('perPage') == 500 ? 'selected' : '' }} value="500">500</option>
                                                <option {{ request()->get('perPage') == 'ALL' ? 'selected' : '' }} value="ALL">ALL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right" style="margin-top: 35px">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-search me-2"></i>&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp;</button>&nbsp;
                                            <a href="/upload" class="btn btn-warning btn-sm"><i class="fas fa-rotate-right me-2"></i>&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;</a>&nbsp;
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm mx--5" data-bs-toggle="modal" data-bs-target="#import-modal"><i class="fas fa-upload mr-2"></i>Import</button>&nbsp;
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#produksi-modal"><i class="fas fa-plus mr-2"></i>Tambah Data</button>
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

                    <input type="text" id="myInput" class="form-control form-control-sm" placeholder="Search ...">

                    {{-- Table Data --}}
                    @if (empty($filter_bangsa))
                        <!-- Iterate over $allData to display ALL results -->
                        <table class="table table-fixed table-bordered text-center mb-2 mt-2" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    <th style="width: 8%; text-align: center">
                                        <div class="floatU">Action</div>
                                    </th>
                                    <th style="width: 10%; text-align: center">Date</th>
                                    <th style="width: 10%; text-align: left">Nama Bull</th>
                                    <th style="width: 10%; text-align: center">Kode Bull</th>
                                    <th style="width: 14%; text-align: center">Bangsa</th>
                                    <th style="width: 12%; text-align: center">Kode Batch</th>
                                    <th style="width: 12%; text-align: center">Produksi</th>
                                    <th style="width: 9%; text-align: center">PTM (%)</th>
                                    <th style="width: 13%; text-align: center">Konsentrasi (Juta)</th>
                                    <th style="width: 13%; text-align: center">Container</th>
                                    <th style="width: 8%; text-align: center">Status</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($allData as $data)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}" 
                                                style="border: none !important; background-color:transparent; size"><i class="fa-solid fa-xs fa-trash-can"></i></button>
                                            <button class="icon-button edit-btn" data-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-pencil"></i></button>
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($data->tanggal)) }}</td>
                                        <td class="text-left">{{ $data->bull }}</td>
                                        <td>{{ $data->kode_bull }}</td>
                                        <td>{{ $data->bangsa }}</td>
                                        <td>{{ $data->kode_batch }}</td>
                                        <td>{{ $data->produksi }}</td>
                                        <td>{{ $data->ptm }}</td>
                                        <td>{{ $data->konsentrasi }}</td>
                                        <td>
                                            <select name="container_id" data-id="{{ $data->id }}" class="form-control select-container js-example-basic-single">
                                                <option value="">- PILIH CONTAINER -</option>
                                                @foreach($container as $c)
                                                    <option {{ $c->id == $data->container_id ? 'selected' : '' }}  value="{{ $c->id }}">{{ $c->code . ' ' . $c->nama_container . '/' . $c->type_container  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            @if ($data->sisa > 0)
                                                <button type="button" class="btn btn-sm btn-block btn-success btn-detail-produksi" data-id="{{ $data->id }}" data-toggle="tooltip" title="Tersedia: {{ $data->sisa }}">
                                                    <i class="fas fa-check-circle mr-2"></i> <strong>{{ $data->sisa }}</strong>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-block btn-danger btn-detail-produksi" data-id="{{ $data->id }}" data-toggle="tooltip" title="Habis">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $filteredData->links() }}
                    @else
                        <!-- Iterate over $filteredData to display FILTERED results -->
                        <table class="table table-fixed table-bordered text-center mb-2 mt-2" style="table-layout: fixed">
                            <thead>
                                <tr>
                                    <th style="width: 8%; text-align: center">
                                        <div class="floatU">Action</div>
                                    </th>
                                    <th style="width: 10%; text-align: center">Date</th>
                                    <th style="width: 10%; text-align: left">Nama Bull</th>
                                    <th style="width: 10%; text-align: center">Kode Bull</th>
                                    <th style="width: 14%; text-align: center">Bangsa</th>
                                    <th style="width: 12%; text-align: center">Kode Batch</th>
                                    <th style="width: 12%; text-align: center">Produksi</th>
                                    <th style="width: 9%; text-align: center">PTM (%)</th>
                                    <th style="width: 13%; text-align: center">Konsentrasi (Juta)</th>
                                    <th style="width: 8%; text-align: center">Status</th>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($filteredData as $result)
                                    <tr>
                                        <td>
                                            <button class="icon-button delete-btn" data-id="{{ $result->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $result->id }}" 
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-trash-can"></i></button>
                                            <button class="icon-button edit-btn" data-id="{{ $result->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $result->id }}"
                                                style="border: none !important; background-color:transparent"><i class="fa-solid fa-xs fa-pencil"></i></button>
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($result->tanggal)) }}</td>
                                        <td class="text-left">{{ $result->bull }}</td>
                                        <td>{{ $result->kode_bull }}</td>
                                        <td>{{ $result->bangsa }}</td>
                                        <td>{{ $result->kode_batch }}</td>
                                        <td>{{ $result->produksi }}</td>
                                        <td>{{ $result->ptm }}</td>
                                        <td>{{ $result->konsentrasi }}</td>
                                        <td>
                                            @if ($result->sisa > 0)
                                                <button type="button" class="btn btn-sm btn-block btn-success btn-detail-produksi" data-id="{{ $data->id }}" data-toggle="tooltip" title="Tersedia: {{ $result->sisa }}">
                                                    <i class="fas fa-check-circle mr-2"></i> <strong>{{ $result->sisa }}</strong>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-block btn-danger btn-detail-produksi" data-id="{{ $data->id }}" data-toggle="tooltip" title="Habis">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            @endif
                                        </td>
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

<div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Detail Distribusi Produksi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-fixed table-bordered text-center mb-2 mt-2" style="table-layout: fixed">
                    <thead>
                        <tr>
                            <td width="40%">Tujuan</td>
                            <td>Provinsi</td>
                            <td>Kabupaten</td>
                            <td>Container</td>
                            <td>Jumlah</td>
                        </tr>
                    </thead>
                    <tbody id="table-history">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default btn-block" data-bs-dismiss="modal"><i class="fas fa-times mr-2"></i>Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-container').change(function() {
            var produksiId = $(this).attr('data-id');
            var containerId = $(this).val();

            $.ajax({
                url: '{{ route("updateContainer") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: produksiId,
                    container_id: containerId
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                    } else {
                        alert('Failed to update container');
                    }
                }
            });
        });
    });
</script>

@stop