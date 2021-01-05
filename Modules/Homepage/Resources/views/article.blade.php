@extends('homepage::layouts.master')

@section('content')
<div id="category" class="category-carousel hidden-xs">
    <div class="item">
        <div class="image"> <img src="{{ asset('templates') }}/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
        <div class="container-fluid">
            <div class="caption vertical-top text-left">
            <div class="big-text"> {{ $title }} </div>
            <div class="excerpt hidden-sm hidden-md"> Penulis: {{ $article->user->name }} {{ $article->user->last_name }} </div>
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

                    <div class="col-md-12">
                        <div class="item">
                            <div class="products">
                                <div class="product">

                                <div class="product-info text-left">
                                    <div class="description">{!! $article->content !!}</div>
                                    <div class="description text-right">Last Update : {{ $article->updated_at->format('d F Y') }} | Views: {{ $article->views }}</div>
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
