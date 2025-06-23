@extends('layouts.master')
@section('title','Trang chủ')
@push('css')
<link rel="stylesheet" href="{{asset('css/slide.css')}}?{{time()}}">
<link rel="stylesheet" href="{{asset('vendor/glightbox/css/glightbox.min.css')}}?{{time()}}">
<style>
	.story-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-auto-rows: masonry ? auto : 200px;
  grid-auto-flow: dense;
  gap: 16px;
}

/* Thả tùy chỉnh kích thước item */
.story-item:nth-child(1) { grid-column: span 2; grid-row: span 2; }

/* Styles cơ bản */
.story-item {
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.story-item img {
  width: 100%;
  height: auto;
  display: block;
}
.story-title {
  padding: 8px 0;
  font-size: 1rem;
  color: var(--rq-white);
  background-color: var(--rq-primary);
  text-align: center;
  font-weight: 600;
}

</style>
@endpush
@section('content')
@include('partials.frontend.slide')
<section id="tab-home" class="tab-home section">
	<div class="container">
    <h2 class="section-title">
        <a href="#">Công trình đã thi công</a>
    </h2>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @foreach($serviceCategory as $key => $category)
            @php
                $slugId = Str::slug($category->slug ?? $category->name, '-');
            @endphp
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                   id="tab-{{ $slugId }}"
                   data-toggle="pill"
                   href="#pane-{{ $slugId }}"
                   role="tab"
                   aria-controls="pane-{{ $slugId }}"
                   aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                    {{-- <img src="{{ asset($category->image ?? 'images/setting/no-image.png') }}" alt="{{ $category->name }}"> --}}
                    <span>{{ $category->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="pills-tabContent">
        @foreach($serviceCategory as $key => $category)
            @php
                $slugId = Str::slug($category->slug ?? $category->name, '-');
            @endphp
            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                 id="pane-{{ $slugId }}"
                 role="tabpanel"
                 aria-labelledby="tab-{{ $slugId }}">
                <div class="tab-list">
                    <div class="row">
                        @forelse($category->services as $service)
                            <div class="col-6 col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('services.show', $service->slug) }}">
                                    <div class="tab-item">
                                        <div class="box-imge">
                                            <img src="{{ asset($service->image ?? 'images/setting/no-image.png') }}" alt="{{ $service->name }}">
                                        </div>
                                        <div class="box-title">
                                            <img src="{{ asset($setting->logo) }}" alt="">
                                            <p>{{ $service->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="text-muted">Chưa có dịch vụ nào.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</section>
				
<div id="banggia">
	<a href="">
		<img src="{{asset('images/setting/banner-nhan-bao-gia.jpg')}}" alt="">
	</a>
</div>
@foreach($serviceCategoryHome as $category)
<section class="section category">
	<div class="container">
		<h3 class="section-title text-center">{{ $category->name }}</h3>
		@if($category->description)
			<h3 class="section-title-second text-center">{{ $category->description }}</h3>
		@endif
		<div class="section-content">
			<div class="swiper categorySlide">
				<div class="swiper-wrapper">
					@foreach($category->children as $child)
					<div class="swiper-slide">
						<div class="categorySlide-item">
							<img src="{{ asset($child->image ?? 'images/setting/no-image.png') }}" alt="{{ $child->name }}">
							<a href="{{ route('services.serviceByCate', $child->slug) }}">{{ $child->name }}</a>
						</div>
					</div>
					@endforeach
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	</div>
</section>
@endforeach

<section id="difference">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-5 order-2 order-md-1">
				<h3>Tại sao nên chọn Ruby Queen</h3>
				<ul class="fa-ul">
					<li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Đội KTS chuyên nghiệp – bản vẽ đạt chuẩn</li>
					<li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Giám đốc đi lên từ thợ chính – đội ngũ thợ giàu kinh nghiệm</li>
					<li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Có nhà xưởng sản xuất trực tiếp – giảm 30% chi phí</li>
				</ul>

			</div>
			<div class="col-12 col-sm-12 col-md-7 order-1 order-md-2">
				<img src="{{asset('images/setting/banner-001.jpg')}}" alt="">
			</div>
		</div>
	</div>
</section>
{{-- <section id="video" class="section">
	<div class="container">
		<div class="list-video">
			<h3 class="section-title"><a href="">HOÀN THIỆN NỘI THẤT</a></h3>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<img src="{{asset('images/setting/banner-001.jpg')}}" alt="">
						<h5 class="video-title"><a href="">Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome</a></h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<img src="{{asset('images/setting/banner-001.jpg')}}" alt="">
						<h5 class="video-title"><a href="">Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome</a></h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<img src="{{asset('images/setting/banner-001.jpg')}}" alt="">
						<h5 class="video-title"><a href="">Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome</a></h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
			</div>
		</div>

		<div class="list-video">
			<h3 class="section-title"><a href="">SẢN XUẤT VÀ THI CÔNG NỘI THẤT</a></h3>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<div class="video-cover">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								<img src="https://img.youtube.com/vi/0cf5SbaPUHs/hqdefault.jpg" alt="Video">
							<i class="btn-youtube"></i>
							</a>
						</div>
						<h5 class="video-title">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome
							</a>
						</h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<div class="video-cover">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								<img src="https://img.youtube.com/vi/0cf5SbaPUHs/hqdefault.jpg" alt="Video">
							<i class="btn-youtube"></i>
							</a>
						</div>
						<h5 class="video-title">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome
							</a>
						</h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4">
					<div class="video-item">
						<div class="video-cover">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								<img src="https://img.youtube.com/vi/0cf5SbaPUHs/hqdefault.jpg" alt="Video">
							<i class="btn-youtube"></i>
							</a>
						</div>
						<h5 class="video-title">
							<a href="https://youtu.be/0cf5SbaPUHs?si=zd3bzHJI2EYgwRlp" class="glightbox">
								Hoàn thiện nội thất nhà phố - C Nết - tp. Ninh Bình - Nội thất Voyhome
							</a>
						</h5>
						<span>VoyHome Channel <i class="fas fa-check-circle"></i></span>
					</div>
				</div>
			</div>
		</div>
</section> --}}
@foreach($homeCategories as $index => $category)
    @if($category->posts->isNotEmpty())
        @if($index === 0)
        {{-- Dạng "Kinh nghiệm hay" (ảnh to + danh sách bên phải) --}}
        <section class="section exp">
            <div class="container">
                <h3 class="section-title">
                	<a href="{{route("frontend.post.postByCate",$category->slug)}}">{{ $category->name }}</a> 
                </h3>
                <div class="section-content">
                    <div class="row">
                        <div class="col-12 col-md-7 col-sm-12">
                            <a href="{{ route('frontend.post.detail', $category->posts->first()->slug) }}">
                                <img src="{{ asset($category->posts->first()->image ?? 'images/setting/no-image.png') }}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-12 col-md-5 col-sm-12">
                            <div class="post-list">
                                @foreach($category->posts->slice(1) as $post)
                                <div class="post-item">
                                    <a href="{{ route('frontend.post.detail', $post->slug) }}" class="post-link">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                        <p class="post-meta">
                                            <i class="fa-solid fa-calendar-days text-dark"></i>
                                            <span class="date text-dark">{{ $post->updated_at->format('d/m/Y') }}</span>
                                        </p>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        {{-- Dạng "Câu chuyện thực tế" (grid ảnh + tên) --}}
        <section class="section story">
            <div class="container">
                <h2 class="section-title">
                    <a href="{{ route('frontend.post.postByCate', $category->slug) }}">
                        {{ $category->name }}
                    </a>
                </h2>
                <div class="story-grid">
                    @foreach($category->posts as $post)
                    <a href="{{ route('frontend.post.detail', $post->slug) }}" class="story-item">
                        <img src="{{ asset($post->image ?? 'images/setting/no-image.png') }}" alt="">
                        <div class="story-title">{{ $post->title }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    @endif
@endforeach


<section id="contact" class="py-4 my-3">
	<div class="container">
		<div class="card text-bg-light">
			<div class="card-header">
				<div class="card-title">
					<h3 class="strong text-uppercase">Liên hệ ngay với chúng tôi</h3>
				</div>
			</div>
			<div class="card-body bg-light">
				<form id="contact-form" action="{{route('contact.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="name">Họ và tên *</label>
								<input type="text" class="form-control" id="name" name="name" autocomplete>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="address">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address" autocomplete>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="phone">Số điện thoại *</label>
								<input type="text" class="form-control" id="phone" name="phone" autocomplete>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email" autocomplete>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message">Ý kiến</label>
						<textarea name="message" id="message" class="form-control" autocomplete></textarea>
					</div>
					<button class="btn btn-dark d-block w-100">Gửi ý kiến</button>
				</form>
			</div>
		</div>
	</div>
</section>							
@endsection
@push('js')
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}?{{time()}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper('.slider', {
      loop: true,

      lazy: {
        loadPrevNext: true, // preload slide trước và sau
        loadPrevNextAmount: 1,
      },

      autoplay: {
        delay: 4000,
        disableOnInteraction: false, // vẫn tiếp tục autoplay sau khi user điều khiển
      },

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '"></span>';
        }
      },

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      speed: 600,
      effect: 'fade', // hoặc 'fade', 'cube', v.v.
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.categorySlide').forEach(function (el) {
      new Swiper(el, {
        loop: true,
        lazy: {
          loadPrevNext: true,
          loadPrevNextAmount: 1,
        },
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: el.querySelector('.swiper-pagination'),
          clickable: true,
        },
        navigation: {
          nextEl: el.querySelector('.swiper-button-next'),
          prevEl: el.querySelector('.swiper-button-prev'),
        },
        slidesPerView: 3,
        slidesPerGroup: 3,
        spaceBetween: 20,
        loopedSlides: 6,
        loopFillGroupWithBlank: true,
        speed: 600,
        breakpoints: {
          0: { slidesPerView: 1, slidesPerGroup: 1 },
          576: { slidesPerView: 2, slidesPerGroup: 2 },
          768: { slidesPerView: 3, slidesPerGroup: 3 },
          992: { slidesPerView: 3, slidesPerGroup: 3 }
        }
      });
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
    // Custom rule kiểm tra số điện thoại Việt Nam
    $.validator.addMethod("phoneVN", function (value, element) {
        return this.optional(element) || /^(0[3|5|7|8|9])[0-9]{8}$|^\+84[3|5|7|8|9][0-9]{8}$/.test(value);
    }, "Số điện thoại không hợp lệ");

    $(document).ready(function () {
        $('#contact-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    phoneVN: true
                },
                email: {
                    email: true
                },
                content: {
                    maxlength: 1000
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ và tên",
                    minlength: "Tên quá ngắn"
                },
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                    phoneVN: "Số điện thoại không hợp lệ (ví dụ: 098xxxxxxx)"
                },
                email: {
                    email: "Email không hợp lệ"
                },
                content: {
                    maxlength: "Ý kiến không vượt quá 1000 ký tự"
                }
            },
            errorElement: 'small',
            errorClass: 'text-danger',
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endpush