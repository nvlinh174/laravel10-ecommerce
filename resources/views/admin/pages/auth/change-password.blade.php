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
                            <x-admin.forms.input title="Email" id="email" disabled
                                value="{{ Auth::guard('admin')->user()->email }}" type="email" />
                        </div>
                        <div class="mb-3">
                            <x-admin.forms.input title="Mật khẩu cũ" required name="password" type="password" />
                        </div>
                        <div class="mb-3">
                            <x-admin.forms.input title="Mật khẩu mới" required name="new_password" type="password" />
                        </div>
                        <div>
                            <x-admin.forms.input title="Nhập lại mật khẩu mới" required name="new_password_confirmation"
                                type="password" />
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
