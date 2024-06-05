@extends('layouts.main')
@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light shadow-sm pt-4 pb-3">
                        <h6 class="text-dark text-capitalize ps-3">Dashboard Sistem Produksi</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Bulan</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tahun</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Target</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Realisasi</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Action</th>
                                    <th class="text-dark opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                {{-- <h6 class="mb-0 text-sm">Januari</h6> --}}
                                                Januari
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-middle text-center">
                                    <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Februari</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Maret</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-left">
                                        <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">April</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Mei</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-middle text-center">
                                    <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Juni</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2024</td>
                                    <td>
                                        <p class="text-xs mb-0">15.000</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">-</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection