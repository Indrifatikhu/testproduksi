@extends('adminlte::page')

@section('title', 'Profile')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-light pt-4 pb-3 shadow-sm">
                        <h5 class="text-dark text-capitalize ps-3"><b>My Profile</b></h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg"
                                            alt="" class="img-fluid rounded-center mb-3">
                                        @isset($name, $email)
                                        <h3>{{ $name }}</h3>
                                        <p class="text-muted">{{ $email }}</p>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="profile/{{ $user->id }}" method="POST">
                                            {{-- {{ route('updateProfile', ['user'=>session('users')->id]) }} --}}
                                            @csrf
                                            <h3>Edit Profile</h3>
                                            <hr>
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control"
                                                    value="" required>
                                                    {{-- {{ session('user')->name }} --}}
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                                                    value="" required>
                                                    {{-- {{ session('user')->email }} --}}
                                            </div>
                                            <h3>Change Password</h3>
                                            <hr>
                                            <div class="mb-3">
                                                <label for="password">New Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                            <button class="btn btn-primary btn-sm btn-block"><i class="fas fa-save mr-2"></i>Save Changes</button>
                                            <!-- <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('deleteForm').submit()"><i class="fas fa-trash mr-2"></i>Delete Account</button> -->
                                        </form>
                                        <!-- <form id="deleteForm" action="" method="post" style="display: none">
                                            {{-- {{ route('delete', ['user'=>session('user')->id]) }} --}}
                                            @csrf
                                        </form> -->
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


@stop
