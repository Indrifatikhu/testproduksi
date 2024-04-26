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
                </div>
            </div>
        </div>
    </div>
</div>


@endsection