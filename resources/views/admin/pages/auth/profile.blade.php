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
                            <x-admin.forms.input title="Email" id="email" disabled value="{{ $user->email }}"
                                type="email" />
                        </div>
                        <div class="mb-3">
                            <x-admin.forms.input title="Họ tên" name="name" value="{{ $user->name }}" type="text" />
                        </div>
                        <div class="mb-3">
                            <x-admin.forms.input title="Số điện thoại" name="phone" value="{{ $user->phone }}"
                                type="text" />
                        </div>
                        <div>
                            <x-admin.forms.input title="Avatar" name="image" type="file" />
                            @empty(!$user->image)
                                <img width="150" class="rounded mt-2" src="/images/admins/{{ $user->image }}"
                                    alt="avatar">
                                <input type="hidden" value="{{ $user->image }}" name="current_image">
                            @endempty
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
