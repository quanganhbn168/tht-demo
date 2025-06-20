@extends('layouts.admin')
@section('title','Danh sách dự án')
@section('content_header','Danh sách dự án')
@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm dự án
        </a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên dịch vụ</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $key => $service)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $service->name }}</td>
                    <td><img src="{{ asset($service->image) }}" style="height:60px;"></td>
                    <td>{{ $service->category->name ?? '-' }}</td>
                    <td>{{ $service->status ? 'Hiện' : 'Ẩn' }}</td>
                    <td>{{ $service->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline-block;" class="form-delete">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
