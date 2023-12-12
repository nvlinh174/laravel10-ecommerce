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
                    <div id="nested-sortable" class="list-group border border-0 nested-sortable" data-list="1">
                        @foreach ($items as $item)
                            @include('admin.pages.categories.nested-item', [
                                'item' => $item,
                            ])
                        @endforeach
                    </div>
                </div>
                {{-- <div class="card-footer"></div> --}}
            </div>
        </div>
    </div>
@endsection

@push('libs_js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
@endpush
