{{-- resources/views/admin/service_categories/create.blade.php --}}

@extends('layouts.admin')
@section('title', 'Thêm danh mục dịch vụ')
@section('content_header', 'Thêm danh mục dịch vụ')
@section('content')
<div class="card">
    <form action="{{ route('admin.service_categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <x-form.input name="name" label="Tên danh mục" :value="old('name')" />
            <x-form.textarea name="description" label="Mô tả" :value="old('description')" />
            <x-form.ckeditor name="content" label="Nội dung" :value="old('content')" />
            <x-form.select name="parent_id" label="Danh mục cha" :options="$categories" :selected="old('parent_id')" placeholder="-- Danh mục cha --" />
            <x-form.image-input name="image" label="Ảnh đại diện" />
            <x-form.image-input name="banner" label="Banner (tuỳ chọn)" />
            <x-form.switch name="status" label="Trạng thái" :checked="old('status', true)" />
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.service_categories.index') }}" class="btn btn-outline-dark">Quay lại</a>
        </div>
    </form>
</div>
@endsection

