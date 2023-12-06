@extends('admin.layout.layout')

@section('content')
    <div class="row row-cards">
        <div class="col-12">
            <form action="{{ route("{$routeNamePrefix}update", ['page' => $item]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-status-top bg-dark"></div>
                    <div class="card-header">
                        <h3 class="card-title">Cập nhật trang</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="mb-3">
                                    <x-admin.forms.input title="Tiêu đề" required name="title" type="text"
                                        value="{{ $item->title }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nội dung</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="myeditorinstance" name="description">{{ $item->description }}</textarea>
                                    <x-admin.forms.invalid-feedback name="description" />
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <x-admin.forms.input title="URL" required name="url" type="text"
                                        value="{{ $item->url }}" />
                                </div>
                                <div class="mb-3">
                                    <x-admin.forms.input title="Meta Title" name="meta_title" type="text"
                                        value="{{ $item->meta_title }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" rows="6" class="form-control @error('meta_description') is-invalid @enderror">{{ $item->meta_description }}</textarea>
                                    <x-admin.forms.invalid-feedback name="meta_description" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text"
                                        class="form-control input-tagify @error('meta_keywords') is-invalid @enderror"
                                        name="meta_keywords" value="{{ $item->meta_keywords }}">
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
    <x-admin.scripts.tinymce-config />
    <x-admin.scripts.tagify />
@endpush
