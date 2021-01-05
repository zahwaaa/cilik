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
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
				</tr>
			</thead><!-- /thead -->

			<tbody>
                <form action="{{ route('homepage.cart_update') }}" method="post">@csrf
                @php
                    $jum = 0;
                    $jumlah = 0;
                @endphp
                @foreach($carts as $cart)
                @php
                    $jum += $cart->jumlah;
                    $jumlah += $cart->harga_total;
                @endphp
				<tr>
					<td class="romove-item"><a href="{{ route('homepage.cart_hapus', $cart->id) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="{{ route('homepage.product', $cart->product->slug)}}">
						    <img src="{{ asset('storage/'. $cart->product->thumbnail) }}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="{{ route('homepage.product', $cart->product->slug)}}">{{ $cart->product->name }}</a></h4>
					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
                            <input type="hidden" name="id[]" value="{{ $cart->id }}">
				            <input type="number" value="{{ $cart->jumlah }}" name="qty[]">
			            </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">Rp.{{ number_format($cart->harga_satuan, 0, ',', '.') }}</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">Rp.{{ number_format($cart->harga_total, 0, ',', '.') }}</span></td>
				</tr>
				@endforeach
			</tbody><!-- /tbody -->

            <tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{ route('homepage.index') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<button class="btn btn-upper btn-primary pull-right outer-right-xs" type="submit">Update shopping cart</button></form>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Qty Products: {{ $jum }} <sup>pcs</sup></span>
					</div>
					<div class="cart-grand-total">
						Grand Total: Rp.{{ number_format($jumlah, 0, ',', '.') }}</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{ route('homepage.checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
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
</body>

</html>
