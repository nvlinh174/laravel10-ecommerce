@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-md-6">
            <form action="{{ route('admin.auth.updatePassword') }}" method="POST">
                <div class="card">
                    <div class="card-status-top bg-dark"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật mật khẩu</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" disabled value="{{ Auth::guard('admin')->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu cũ</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="text" class="form-control" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="text" class="form-control" name="new_password_confirmation ">
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
