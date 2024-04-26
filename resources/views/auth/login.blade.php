{{-- <div class="container-sm justify-content-center">
    <div class="row justify-content">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center" style="background-color: #d1e7dd">
                    <h2><b>Upload File Produksi</b></h2>    
                </div>

                <div class="card-body">
                    .
                </div>
            </div>
        </div>
    </div>
</div> --}}


@extends('layouts.app')

@section('container')
<div class="container">
    <div class="row justify-content-center align-items-center" id="auth">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('prosesLogin') }}" method="POST">
                        @csrf
                        <h3>Sign In</h3>
                        <hr>
                        @if(@session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif (@session('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('failed') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">Submit</button>
                            <p class="text-center">
                                {{-- Route Ke Halaman Register --}}
                                Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection