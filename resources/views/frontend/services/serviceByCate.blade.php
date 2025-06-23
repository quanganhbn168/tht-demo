@extends('layouts.master')
@section('title', $category->name)
@push('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush

@section('content')
<div id="product-wrapper">
	<div class="container">
		{{-- Breadcrumb --}}
		<x-frontend.breadcrumb :items="[
			['label' => 'Dự án', 'url' => route('services.serviceByCate', $category->slug)],
			['label' => $category->name]
		]" />

		{{-- Banner --}}
		@if($category->banner)
		<div class="mb-4">
			<img src="{{ asset($category->banner) }}" class="img-fluid w-100" alt="{{ $category->name }}">
		</div>
		@endif

		{{-- Nội dung mô tả --}}
		@if($category->content)
		<div class="mb-4 category-content">
			{!! $category->content !!}
		</div>
		@endif

		{{-- Danh sách dịch vụ thuộc danh mục --}}
		<section class="section productDetail">
			<div class="section-title">Dự án thuộc danh mục "{{ $category->name }}"</div>
			<div class="section-content">
				<div class="row">
					@forelse($services as $service)
					<div class="col-6 col-md-4 mb-4">
						<a href="{{ route('services.show', $service->slug) }}" class="project-link d-block">
							<div class="project-box">
								<div class="project-img">
									<img src="{{ asset($service->image ?? 'images/setting/no-image.png') }}" alt="{{ $service->name }}" class="img-fluid w-100">
								</div>
								<p class="project-title mt-2">{{ $service->name }}</p>
							</div>
						</a>
					</div>
					@empty
					<p class="text-muted">Chưa có dự án nào trong danh mục này.</p>
					@endforelse
				</div>
			</div>
		</section>
	</div>
</div>
@endsection
