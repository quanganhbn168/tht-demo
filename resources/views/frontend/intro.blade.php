@extends('layouts.master')
@section('title', 'Giới thiệu Ruby Queen')

@section('content')
<section class="section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title text-uppercase">Nội Thất Ruby Queen 👑</h1>
            <p class="lead">Đơn vị thi công – thiết kế nội thất uy tín hàng đầu tại Bắc Ninh</p>
        </div>

        <div class="content">
            {!!$intro->content!!}
        </div>
    </div>
</section>
@endsection
