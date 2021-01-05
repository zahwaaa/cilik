@extends('homepage::layouts.master')

@section('content')
<div id="category" class="category-carousel hidden-xs">
    <div class="item">
        <div class="image"> <img src="{{ asset('templates') }}/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
        <div class="container-fluid">
            <div class="caption vertical-top text-left">
            <div class="big-text"> {{ $title }} </div>
            {{-- <div class="excerpt hidden-sm hidden-md"> Lorem Ipsum </div> --}}
            </div>
            <!-- /.caption -->
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<div class="search-result-container mb-5">
    <div id="myTabContent" class="tab-content category-list">
        <div class="tab-pane active " id="grid-container">
            <div class="category-product">
                <div class="row">

                    @foreach($comps as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                            <div class="products">
                                <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                    <a href="{{ route('homepage.competition', $product->id)}}">
                                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
                                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="" class="hover-image">
                                    </a>
                                </div>
                                    <!-- /.image -->
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ route('homepage.competition', $product->id)}}">{{ $product->name }}</a></h3>
                                    <span class="info">By {{ $product->sponsor }} | {{ $product->updated_at->format('d F Y') }} </span>
                                    <span class="info">Reward : Rp. {{ number_format($product->hadiah, 0, ',', '.') }}</span>
                                    <p class="text">{!! $product->description !!}</p>
                                    <div class="description"></div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    </div>
                    <!-- /.row -->
                    @endforeach


                </div>
            </div>
            <!-- /.category-product -->

        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.search-result-container -->
@endsection
