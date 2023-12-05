@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-md-6">
            <form action="{{ route('admin.auth.postUpdatePassword') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-status-top bg-dark"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật mật khẩu</h3>
                    </div>
                    <div class="card-body">
                        <x-admin.alert.success />
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" disabled
                                value="{{ Auth::guard('admin')->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Mật khẩu cũ</label>

                            <div class="input-icon input-password">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span class="input-icon-addon">
                                    <x-admin.icons.password />
                                </span>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Mật khẩu mới</label>
                            <div class="input-icon input-password">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span class="input-icon-addon">
                                    <x-admin.icons.password />
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="form-label required">Nhập lại mật khẩu mới</label>
                            <div class="input-icon input-password">
                                <input type="password"
                                    class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                    name="new_password_confirmation">
                                @error('new_password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span class="input-icon-addon">
                                    <x-admin.icons.password />
                                </span>
                            </div>

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
