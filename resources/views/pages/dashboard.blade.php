@extends('layouts.main')

@section('container')

    <main class="py-3 bg-light">
        <div class="container">
            <h1>Dashboard</h1>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Users</h3>
                            <p class="text-muted">60</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Products</h3>
                            <p class="text-muted">60</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
