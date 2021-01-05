@extends('homepage::layouts.master')

@section('content')
<!-- ========================================== SECTION – SLIDERS ========================================= -->

<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

      @foreach($sliders as $slider)
      <div class="item" style="background-image: url({{ asset('storage/'.$slider->thumbnail) }});">
        <div class="container-fluid">
          <div class="caption bg-color vertical-center text-left">
            <div class="slider-header fadeInDown-1">{{ $slider->sub_title }}</div>
            <div class="big-text fadeInDown-1">{{ $slider->title }}</div>
            <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->short_description }}</span> </div>
            <div class="button-holder fadeInDown-3"> <a href="{{ $slider->url }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ $slider->url_text }}</a> </div>
          </div>
          <!-- /.caption -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.item -->
      @endforeach
    </div>
    <!-- /.owl-carousel -->
  </div>

  <!-- ========================================= SECTION – SLIDERS : END ========================================= -->


  <!-- ============================================== NEW PRODUCT)S ============================================== -->
  <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
    <div class="more-info-tab clearfix ">
      <h3 class="new-product-title pull-left">New Products</h3>
    </div>
    <div class="tab-content outer-top-xs">
      <div class="tab-pane in active" id="all">
        <div class="product-slider">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

              @foreach($products as $product)
              <div class="item item-carousel">
                  <div class="products">
                  <div class="product">
                      <div class="product-image">
                      <div class="image">
                      <a href="{{ route('homepage.product', $product->slug)}}">
                          <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
                          <img src="{{ asset('storage/'.$product->thumbnail2) }}" alt="" class="hover-image">
                      </a>
                  </div>
                      <!-- /.image -->

                      <div class="tag new"><span>new</span></div>
                      </div>
                      <!-- /.product-image -->

                      <div class="product-info text-left">
                      <h3 class="name"><a href="{{ route('homepage.product', $product->slug)}}">{{ $product->name }}</a></h3>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> Rp.{{ number_format($product->price, 0, ',', '.') }} </span></div>
                      <!-- /.product-price -->

                      </div>
                      <!-- /.product-info -->
                  </div>
                  <!-- /.product -->

                  </div>
                  <!-- /.products -->
              </div>
              <!-- /.item -->
              @endforeach

          </div>
          <!-- /.home-owl-carousel -->
        </div>
        <!-- /.product-slider -->
      </div>
      <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.scroll-tabs -->
  <!-- ============================================== NEW PRODUCT)S : END ============================================== -->


  <!-- ============================================== BANNERS ============================================== -->
  <div class="wide-banners outer-bottom-xs">
    <div class="row">

      @foreach($banners as $banner)
      <div class="col-md-4 col-sm-4">
        <div class="wide-banner cnt-strip">
          <div class="image"> <img class="img-responsive" src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->name }}"> </div>
        </div>
        <!-- /.wide-banner -->
      </div>
      @endforeach

    </div>
    <!-- /.row -->
  </div>
  <!-- /.wide-banners -->

  <!-- ============================================== BANNERS : END ============================================== -->

  <!-- ============================================== ARTICLES ============================================== -->
  <section class="section latest-blog outer-bottom-vs">
    <h3 class="section-title">Latest form Articles</h3>
    <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">

        @foreach($articles as $article)
        <div class="item">
          <div class="blog-post">
            <div class="blog-post-image">
              <div class="image"> <a href="{{ route('homepage.article', $article->slug)}}"><img src="{{ asset('storage/'.$article->thumbnail) }}" height="200"></a> </div>
            </div>
            <!-- /.blog-post-image -->

            <div class="blog-post-info text-left">
              <h3 class="name"><a href="{{ route('homepage.article', $article->slug)}}">{{ $article->title }}</a></h3>
              <span class="info">By {{ $article->user->name . ' ' . $article->user->last_name }} &nbsp;|&nbsp; {{ $article->updated_at->format('d F Y') }} </span>
              <p class="text">{!! $article->description !!}</p>
             </div>
            <!-- /.blog-post-info -->

          </div>
          <!-- /.blog-post -->
        </div>
        <!-- /.item -->
        @endforeach

      </div>
      <!-- /.owl-carousel -->
    </div>
    <!-- /.blog-slider-container -->
  </section>
  <!-- /.section -->
  <!-- ============================================== ARTICLES : END ============================================== -->

  <!-- ============================================== COMPETITIONS ============================================== -->
  <section class="section latest-blog outer-bottom-vs">
    <h3 class="section-title">Active Competitions</h3>
    <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">

        @foreach($comps as $article)
        <div class="item">
          <div class="blog-post">
            <div class="blog-post-image">
                <div class="image"> <a href="{{ route('homepage.competition', $article->id)}}"><img src="{{ asset('storage/'.$article->thumbnail) }}" height="200"></a> </div>
              </div>
            <div class="blog-post-info">
              <h3 class="name"><a href="{{ route('homepage.competition', $article->id)}}">{{ $article->name }}</a></h3>
              <span class="info">By {{ $article->sponsor }} | {{ $article->updated_at->format('d F Y') }} </span>
              <span class="info">Reward : Rp. {{ number_format($article->hadiah, 0, ',', '.') }}</span>
              <p class="text">{!! $article->description !!}</p>
             </div>
            <!-- /.blog-post-info -->

          </div>
          <!-- /.blog-post -->
        </div>
        <!-- /.item -->
        @endforeach

      </div>
      <!-- /.owl-carousel -->
    </div>
    <!-- /.blog-slider-container -->
  </section>
  <!-- /.section -->
  <!-- ============================================== COMPETITIONS : END ============================================== -->
@endsection
