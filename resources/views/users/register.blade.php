@extends('layouts.main')

@section('content')
<style>
    .btn-center {
        display: flex;
        align-items: end;
        justify-content: center;
    }

    .clone-btn {
        border-radius: 50%;
        color: red;
        background: transparent;
        border: 4px solid red;
        font-size: 14px;
    }

    .clone-btn:hover {
        background: none;
        color: black;
        border: 4px solid red;
    }

    .btn-danger {
        border-radius: 50%;
        color: black;
        background: transparent;
        border: 4px solid black;
        font-size: 14px;
    }

    .btn-danger:hover {
        background: none;
        color: black;
        border: 4px solid black;
    }
</style>
<div class="row">
    <div class="col-2"></div>
    <div class="col-md-8" style="margin-top: 10px;">

        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div>
                    <a href="#" class="">Go Back</a>
                </div>
                <div>
                    <h5 class="card-title">{{ 'Register' }} Form</h5>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('users.store')}}" id="UserForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="text" name="user_id" hidden value="{{$data['id'] ?? ''}}">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input required type="text" id="name" class="form-control" name="name" value="{{ old('name', $data['name'] ?? '') }}">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email" id="email" name="email" class="form-control" value="{{ old('email', $data['email'] ?? '') }}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input required type="contact" id="contact" name="phone" class="form-control" value="{{ old('phone', $data['phone'] ?? '') }}">
                                @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Address</label>
                                <input required type="contact" id="address" name="address" class="form-control" value="{{ old('address', $data['address'] ?? '') }}">
                                @error('address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <div class="form-check form-check-inline">
                                    <input required class="form-check-input" type="radio" id="userTypeUser" name="role" value="supplier" {{ (old('role', $data['role'] ?? '') === 'supplier') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="userTypeUser">Supplier</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input required class="form-check-input" type="radio" id="userTypeAdmin" name="role" value="reseller" {{ (old('role', $data['role'] ?? '') === 'reseller') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="userTypeAdmin">Reseller</label>
                                </div>
                            </div>
                            @error('role')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <label for="profile_image">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                            </div>
                            @error('profile_image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 20%; float:right;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection