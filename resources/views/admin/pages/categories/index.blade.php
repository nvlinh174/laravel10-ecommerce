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
                                    <th>Sắp xếp</th>
                                    <th>Slug</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($items as $index => $item)
                                    @php
                                        $count++;
                                        $depth = $item->depth;
                                        $siblings = $items->where('parent_id', $item->parent_id);
                                        $prevSiblings = $siblings->where('_lft', '<', $item->_lft);
                                        $nextSiblings = $siblings->where('_lft', '>', $item->_lft);
                                    @endphp
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <span class="badge bg-blue text-blue-fg badge-pill">{{ $depth }}</span>
                                            {{ $item->name_with_level }}
                                        </td>
                                        <td>
                                            @if ($prevSiblings->count() > 0)
                                                <a href="{{ route('admin.categories.move', ['category' => $item, 'type' => 'up']) }}"
                                                    class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrow-up me-0" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 5l0 14" />
                                                        <path d="M18 11l-6 -6" />
                                                        <path d="M6 11l6 -6" />
                                                    </svg>
                                                </a>
                                            @endif
                                            @if ($nextSiblings->count() > 0)
                                                @if ($prevSiblings->count() === 0)
                                                    <button type="button" class="btn btn-success opacity-25"
                                                        style="visibility: hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-arrow-up me-0"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 5l0 14" />
                                                            <path d="M18 11l-6 -6" />
                                                            <path d="M6 11l6 -6" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                <a href="{{ route('admin.categories.move', ['category' => $item, 'type' => 'down']) }}"
                                                    class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrow-down me-0" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 5l0 14" />
                                                        <path d="M18 13l-6 6" />
                                                        <path d="M6 13l6 6" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </td>
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
