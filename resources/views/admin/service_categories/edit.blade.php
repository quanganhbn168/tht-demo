{{-- resources/views/admin/service_categories/edit.blade.php --}}

@extends('layouts.admin')
@section('title', 'Chỉnh sửa danh mục dịch vụ')
@section('content_header', 'Chỉnh sửa danh mục dịch vụ')

@section('content')
<div class="card">
    <form action="{{ route('admin.service_categories.update', $service_category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
            <x-form.input
                name="name"
                label="Tên danh mục"
                :value="old('name', $service_category->name)"
            />

            <x-form.textarea
                name="description"
                label="Mô tả"
                :value="old('description', $service_category->description)"
            />

            <x-form.ckeditor
                name="content"
                label="Nội dung"
                :value="old('content', $service_category->content)"
            />

            <x-form.select
                name="parent_id"
                label="Danh mục cha"
                :options="$categories"
                :selected="old('parent_id', $service_category->parent_id)"
                placeholder="-- Không có danh mục cha --"
            />

            <x-form.image-input
                name="image"
                label="Ảnh đại diện"
                :value="$service_category->image"
            />

            <x-form.image-input
                name="banner"
                label="Banner (tuỳ chọn)"
                :value="$service_category->banner"
            />

            <x-form.switch
                name="status"
                label="Trạng thái"
                :checked="old('status', $service_category->status)"
            />
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.service_categories.index') }}" class="btn btn-outline-dark">Quay lại</a>
        </div>
    </form>
</div>
@endsection
a