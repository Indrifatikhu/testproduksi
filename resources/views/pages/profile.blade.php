@extends('layouts.main')

@section('container')


<div class="container-sm justify-content-center">
    <div class="row justify-content">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center" style="background-color: #d1e7dd">
                    <h2><b>My Profile</b></h2>    
                </div>

                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg"
                                            alt="" class="img-fluid rounded-center mb-3">
                                        <h3>{{ session('user')->name }}</h3>
                                        <p class="text-muted">{{ session('user')->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('updateProfile', ['user'=>session('user')->id]) }}" method="POST">
                                            @csrf
                                            <h3>Edit Profile</h3>
                                            <hr>
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    value="{{ session('user')->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="{{ session('user')->email }}" required>
                                            </div>
                                            <h3>Change Password</h3>
                                            <hr>
                                            <div class="mb-3">
                                                <label for="password">New Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                            <button class="btn btn-primary">Save Changes</button>
                                            <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteForm').submit()">Delete Account</button>
                                        </form>
                                        <form id="deleteForm" action="{{ route('delete', ['user'=>session('user')->id]) }}" method="post" style="display: none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
