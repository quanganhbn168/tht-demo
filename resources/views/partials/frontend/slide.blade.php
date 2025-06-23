<!-- Slider main container -->
<div class="swiper slider">
  <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
    <!-- Slides -->
        @foreach($slides as $key => $slide)
        <div class="swiper-slide">
        	<img
        	class="swiper-lazy"
        	data-src="{{asset('images/slides/slide-1.jpg')}}"
        	src="{{asset('images/slides/slide-1.jpg')}}"
        	alt="Sản phẩm nội thất gỗ"
        	title="Voyhome Nội thất gỗ"
        	>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>