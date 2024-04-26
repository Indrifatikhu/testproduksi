@extends('layouts.app')

@section('container')


<div class="container">
    <div class="row justify-content-center align-items-center" id="auth">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('prosesRegister') }}" method="POST">
                        @csrf
                        <h3>Sign Up</h3>
                        <hr>
                        <div id="alert" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                            Password does not match
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="verify_password">Verify Password</label>
                            <input type="password" name="verify_password" id="verify_password" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">Submit</button>
                            <p class="text-center">
                                Already have an account? <a href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection