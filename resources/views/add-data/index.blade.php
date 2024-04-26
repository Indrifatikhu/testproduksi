@extends('layouts.main')
@section('container')

<div class="container-sm justify-content-center">
    <div class="row justify-content">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center" style="background-color: #d1e7dd">
                    <h2><b>Tambah Data Produksi Harian</b></h2>    
                </div>

                <div class="card-body">
                    <div class="card-body">
                        {{-- First FORM for filter data in table --}}
                        <form class="form-horizontal" action="/add-data/store" method="POST" >
                            @csrf
                            <div class="form-body">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span>
                                            <i class="fa fa-caret-down"></i>&nbsp; 
                                            <label for="tanggal">Tanggal Produksi</label>
                                            <input type="date" formatDate="dd-mm-yyyy" class="form-control @error('Tanggal') is invalid @enderror" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd" value="{{ old('tanggal') }}"><span></span>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="bangsa" class="control-label">Bangsa</label>
                                                <select id="bangsa" class="form-control select @error('Bangsa') is invalid @enderror" name="bangsa" value="{{ old('bangsa') }}">
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
                                                <input type="text" name="nama_bull" id="nama_bull" class="form-control @error('Nama Bull') is invalid @enderror" placeholder="Nama bull">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="kode_bull" class="control-label">Kode Bull</label>
                                                <input type="text" name="kode_bull" id="kode_bull" class="form-control @error('Kode Bull') is invalid @enderror" placeholder="kode bull">
                                            </div>
                                        </div>

                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="kode_batch" class="control-label">Kode Batch</label>
                                                <input type="text" name="kode_batch" id="kode_batch" class="form-control @error('Kode Batch') is invalid @enderror" placeholder="W W ...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="produksi" class="control-label">Produksi</label>
                                                <input type="text" name="produksi" id="produksi" class="form-control @error('Produksi') is invalid @enderror" placeholder="Ketikkan angka">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ptm" class="control-label">PTM</label>
                                                <input type="text" name="ptm" id="ptm" class="form-control @error('PTM') is invalid @enderror" placeholder="Ketik dalam desimal">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="konsentrasi" class="control-label">Konsentrasi</label>
                                                <input type="text" name="konsentrasi" id="konsentrasi" class="form-control @error('Konsentrasi') is invalid @enderror" placeholder="Ketik dalam desimal">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-actions">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="submit" class="btn btn-success mt-4">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
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
            </div>
        </div> 
    </div>
</div>


@endsection