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
                                    <th>Tên</th>
                                    <th>Slug</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name_with_level }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            <livewire:admin.general.switch-status :value="$item->status" model="Category"
                                                :id="$item->id" />
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route("{$routeNamePrefix}edit", ['category' => $item]) }}"
                                                class="btn btn-outline-warning btn-sm">Sửa</a>
                                            <button type="button" class="btn btn-outline-danger btn-sm btnDelete">
                                                Xóa
                                                <form method="POST" class="d-none"
                                                    action="{{ route("{$routeNamePrefix}destroy", ['category' => $item]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </button>
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
