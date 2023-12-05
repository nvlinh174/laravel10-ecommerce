@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-lg-6">
            <form action="{{ route('admin.auth.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-status-top bg-dark"></div>
                    <div class="card-header">
                        <h3 class="card-title">Thông tin tài khoản</h3>
                    </div>
                    <div class="card-body">
                        <x-admin.alert.success />
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" disabled value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ $user->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Avatar</label>
                            @empty(!$user->image)
                                <img width="150" class="rounded mb-2" src="/images/admins/{{ $user->image }}"
                                    alt="avatar">
                                <input type="hidden" value="{{ $user->image }}" name="current_image">
                            @endempty
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ $user->phone }}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
