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
<title>{{ $title }}</title>

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

        <!-- /.top-cart-row -->
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
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9 rht-col">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Checkout
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">

				<!-- guest-login -->
				<div class="col-md-6 col-sm-6 guest-login">
					<h4 class="checkout-subtitle">Guest or Register Login</h4>
					<p class="text title-tag-line">Register with us for future convenience:</p>

					<h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
					<p class="text title-tag-line ">Register with us for future convenience:</p>

					<ul class="text instruction inner-bottom-30">
						<li class="save-time-reg">- Fast and easy check out</li>
						<li>- Easy access to your order history and status</li>
					</ul>

					<a href="{{ route('homepage.cart') }}" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Back to Cart</a>
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle">Billing Details</h4>
					<p class="text title-tag-line">Please fill in the blanks below:</p>
					<form class="register-form" role="form" action="{{ route('homepage.check_out') }}" method="POST"> @csrf

					  <div class="form-group">
					    <label class="info-title" for="email">Email Address <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="first_name">First Name <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="first_name" name="first_name" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="last_name">Last Name <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="last_name" name="last_name" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="phone">Phone Number <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="address">Address <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="address" name="address" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="address_detail">Address Detail<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="address_detail" name="address_detail" required>
                      </div>

					  <div class="form-group">
					    <label class="info-title" for="zipcode">Zip Code<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="zipcode" name="zipcode" required>
                      </div>

					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button" onclick="return confirm('Apakah Anda yakin?')">Place Order</button>
					</form>
				</div>
				<!-- already-registered-login -->

			</div>
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->

					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 sidebar">
					<!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Resume</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li><a>Qty Products: {{ number_format($qty, 0, ',', '.') }} pcs</a></li>
                                        <li><a>Grand Total: Rp.{{ number_format($price, 0, ',', '.') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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
      <div class="col-xs-12 col-sm-4 no-padding copyright">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}  </div>
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
<script type="text/javascript" src="{{ asset('templates') }}/assets/js/lightbox.min.js"></script>
<script src="{{ asset('templates') }}/assets/js/bootstrap-select.min.js"></script>
<script src="{{ asset('templates') }}/assets/js/wow.min.js"></script>
<script src="{{ asset('templates') }}/assets/js/scripts.js"></script>
</body>

</html>
