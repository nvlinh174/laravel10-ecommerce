@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-status-top bg-dark"></div>
                <div class="card-header">
                    <h3 class="card-title">Danh sách danh mục</h3>
                    <a href="{{ route("{$routeNamePrefix}create") }}" class="btn btn-success ms-auto">Thêm mới</a>
                </div>
                <div class="card-body">
                    <x-admin.alert.success />
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>URL</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer"></div> --}}
            </div>
        </div>
    </div>
@endsection
