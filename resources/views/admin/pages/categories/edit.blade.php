@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route("{$routeNamePrefix}update", ['category' => $category]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-status-top bg-dark"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật danh mục</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-8">
                                <div class="mb-3">
                                    <x-admin.forms.input title="Tên" required name="name" type="text"
                                        value="{{ $category->name }}" />
                                </div>
                                <div class="mb-3">
                                    <x-admin.forms.input title="Slug" customClass="slug" required name="slug"
                                        type="text" value="{{ $category->slug }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Danh mục cha</label>
                                    <select type="text" class="form-select" name="parent_id">
                                        @foreach ($parents as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_with_level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <x-admin.forms.input title="Mô tả" name="description" type="text"
                                        value="{{ $category->description }}" />
                                </div>
                                <div class="mb-3">
                                    <x-admin.forms.input title="Hình ảnh" name="image" type="file" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <div class="mb-3">
                                    <x-admin.forms.input title="Meta Title" name="meta_title" type="text"
                                        value="{{ $category->meta_title }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" rows="6" class="form-control @error('meta_description') is-invalid @enderror">{{ $category->meta_description }}</textarea>
                                    <x-admin.forms.invalid-feedback name="meta_description" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <small class="form-hint">
                                        Nhập lần lượt các từ khóa, ấn "Enter" sau mỗi lần hoàn thành nhập một từ
                                    </small>
                                    <input type="text"
                                        class="form-control input-tagify @error('meta_keywords') is-invalid @enderror"
                                        name="meta_keywords" value="{{ $category->meta_keywords }}">
                                    <x-admin.forms.invalid-feedback name="meta_keywords" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{ route("{$routeNamePrefix}index") }}" class="btn btn-success">Trở về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('libs_css')
    <x-admin.css.tagify />
@endpush

@push('after_scripts')
    <x-admin.scripts.tagify />
@endpush
