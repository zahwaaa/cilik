<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>{{ $title ?? "Cilik" }}</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/main.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/blue.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/owl.carousel.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/owl.transitions.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/animate.min.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/rateit.css">
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/bootstrap-select.min.css">
<link href="{{ asset('templates') }}/assets/css/lightbox.css" rel="stylesheet">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('templates') }}/assets/css/font-awesome.css">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            @auth
            <li class="myaccount"><a href="{{ route('profile') }}"><span>My Account</span></a></li>
            <li class="header_cart hidden-xs"><a href="{{ route('homepage.cart') }}"><span>My Cart</span></a></li>
            <li class="check"><a href="{{ route('homepage.checkout') }}"><span>Checkout</span></a></li>
            <li class="login"><a href="{{ route('keluar') }}"><span>Logout</span></a></li>
            @else
            <li class="login"><a href="{{ route('login') }}"><span>Login</span></a></li>
            @endauth
          </ul>
        </div>
        <!-- /.cnt-account -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ route('homepage.index') }}"> <img src="{{ asset('templates') }}/assets/images/logo.png" alt="logo"> </a> </div>
          <!-- /.logo -->
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"></div>
        <!-- /.top-search-holder -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown"> <a href="{{ route('homepage.index') }}">Home</a> </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Article Categories</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="{{ route('homepage.index') }}">Home</a></li>
                              @foreach($article_cats as $article_cat)
                              <li><a href="{{ route('homepage.articlecategory', $article_cat->slug) }}">{{ $article_cat->name }}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Product Categories</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="{{ route('homepage.index') }}">Home</a></li>
                              @foreach($product_cats as $product_cat)
                              <li><a href="{{ route('homepage.productcategory', $product_cat->slug )}}">{{ $product_cat->name }}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->

  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ route('homepage.index') }}">Home</a></li>
				<li><a href="{{ route('homepage.productcategory', $product->product_category->slug ) }}">{{ $product->product_category->name }}</a></li>
				<li class='active'>{{ $product->name }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
				<div class="sidebar-module-container">



    	<!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
              <ul class="nav">
                  @foreach($product_cats as $product_cat)
                  <li class="dropdown menu-item"> <a href="{{ route('homepage.productcategory', $product_cat->slug )}}"><i class="icon fa fa-list" aria-hidden="true"></i>{{ $product_cat->name }}</a>
                  <!-- /.dropdown-menu --> </li>
                  @endforeach
              <!-- /.menu-item -->
              </ul>
              <!-- /.nav -->
            </nav>
            <!-- /.megamenu-horizontal -->
          </div>
          <!-- /.side-menu -->
          <!-- ================================== TOP NAVIGATION : END ================================== -->

<!-- ============================================== SPECIAL OFFER ============================================== -->

<div class="sidebar-widget outer-bottom-small">
    <h3 class="section-title">Special Offer</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">

            @foreach($product_olds as $product_old)
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ route('homepage.product', $product_old->slug)}}"> <img src="{{ asset('storage/'.$product_old->thumbnail) }}" alt=""> </a> </div>
                      <!-- /.image -->

                    </div>
                    <!-- /.product-image -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ route('homepage.product', $product_old->slug)}}">{{ $product_old->name }}</a></h3>
                      <div class="product-price"> <span class="price"> Rp.{{ number_format($product_old->price, 0, ',', '.') }} </span> </div>
                      <!-- /.product-price -->

                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.product-micro-row -->
              </div>
              <!-- /.product-micro -->

            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
  <!-- ============================================== SPECIAL OFFER : END ============================================== -->


				</div>
			</div><!-- /.sidebar -->
			<div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
            <div class="detail-block">
				<div class="row">

					     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

            @foreach($product->product_images as $image)
            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/'.$image->image) }}">
                    <img class="img-responsive" alt="" src="{{ asset('storage/'.$image->image) }}" data-echo="{{ asset('storage/'.$image->image) }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

                @foreach($product->product_images as $image)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" alt="" src="{{ asset('storage/'.$image->image) }}" data-echo="{{ asset('storage/'.$image->image) }}" />
                    </a>
                </div>
                @endforeach

            </div><!-- /#owl-single-product-thumbnails -->



        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->
					<div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{ $product->name }}</h1>

							<div class="stock-container info-container m-t-10">
								<div class="row">
                                <div class="col-lg-12">
									<div class="pull-left">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>
									</div>
									<div class="pull-left">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>
									</div>
                                    </div>
								</div><!-- /.row -->
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{!! $product->short_description !!}
								{!! $product->long_description !!}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-30">
								<div class="row">


									<div class="col-sm-6 col-xs-6">
										<div class="price-box">
											<span class="price">Rp.{{ number_format($product->price, 0, ',', '.') }}</span>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">

									<div class="qty">
										<span class="label">Qty :</span>
									</div>

                                    <form action="{{ route('homepage.product_store', $product->slug) }}" method="post">@csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

									<div class="qty-count">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" min="1" value="1" id="qty" name="qty" required>
							              </div>
							            </div>
									</div>

									<div class="add-btn">
										<button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                    </div>

                                    </form>


								</div><!-- /.row -->
							</div><!-- /.quantity-container -->






						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>

			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-4 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
          <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-4 no-padding copyright">Copyright &copy; {{ config('app.name') }} {{ date('Y') }} </div>
      <div class="col-xs-12 col-sm-4 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('templates') }}/assets/images/payments/1.png" alt=""></li>
            <li><img src="{{ asset('templates') }}/assets/images/payments/2.png" alt=""></li>
            <li><img src="{{ asset('templates') }}/assets/images/payments/3.png" alt=""></li>
            <li><img src="{{ asset('templates') }}/assets/images/payments/4.png" alt=""></li>
            <li><img src="{{ asset('templates') }}/assets/images/payments/5.png" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods -->
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{ asset('templates') }}/assets/js/jquery-1.11.1.min.js"></script>

	<script src="{{ asset('templates') }}/assets/js/bootstrap.min.js"></script>

	<script src="{{ asset('templates') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="{{ asset('templates') }}/assets/js/owl.carousel.min.js"></script>

	<script src="{{ asset('templates') }}/assets/js/echo.min.js"></script>
	<script src="{{ asset('templates') }}/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="{{ asset('templates') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('templates') }}/assets/js/jquery.rateit.min.js"></script>
    <script src="{{ asset('templates') }}/assets/js/lightbox.min.js"></script>
    <script src="{{ asset('templates') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('templates') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('templates') }}/assets/js/scripts.js"></script>

    <script>
        $('.plus').click(function(){
            var qty = $('#qty').val();
            jumlah = parseInt(qty) + 1;
            $('#qty').val(jumlah.toString());
        });
        $('.minus').click(function(){
            var qty = $('#qty').val();
            jumlah = parseInt(qty) - 1;
            $('#qty').val(jumlah.toString());
        });
    </script>
</body>

</html>
