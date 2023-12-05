@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-status-top bg-dark"></div>
                <div class="card-header">
                    <h3 class="card-title">Danh sách trang</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display" id="tblDatatables">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>URL</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                                            <button class="btn btn-danger btn-sm">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer"></div> --}}
            </div>
        </div>
    </div>
@endsection


@push('libs_css')
    <link rel="stylesheet" href="{{ asset('admin/libs/datatables/datatables.min.css') }}">
@endpush

@push('after_scripts')
    <script src="{{ asset('admin/libs/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/pages/index.js') }}"></script>
@endpush
