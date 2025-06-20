@extends('layouts.admin')

@section('title', 'Chỉnh sửa Intro')
@section('content_header', 'Chỉnh sửa Intro')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cập nhật Intro</h3>
    </div>

    <form action="{{ route('admin.intros.update', $intro) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <x-form.input type="text" name="title" label="Tiêu đề" :value="old('title', $intro->title)" />

            <x-form.textarea name="description" label="Mô tả ngắn" :value="old('description', $intro->description)" />

            <x-form.ckeditor name="content" label="Nội dung chi tiết" :value="old('content', $intro->content)" />

            <x-form.image-input name="image" label="Ảnh đại diện" :value="$intro->image" />

            <x-form.image-input name="banner" label="Banner" :value="$intro->banner" />

            <x-form.switch name="status" label="Trạng thái" :checked="old('status', $intro->status)" />
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.intros.index') }}" class="btn btn-outline-dark">Quay lại</a>
        </div>
    </form>
</div>
@endsection
