@extends('homepage::layouts.master')

@section('content')
<div id="category" class="category-carousel hidden-xs">
    <div class="item">
        {{-- <div class="image"> <img src="{{ asset('templates') }}/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div> --}}
        <div class="image"> <img src="{{ asset('storage/'. $competition->thumbnail) }}" alt="" class="img-responsive"> </div>
        <div class="container-fluid">
            <div class="caption vertical-top text-left">
            <div class="big-text">
                {{ $title }}
                @if($competition->is_paid == 1)
                <sup><span class="text-danger"><small>*</small></span></sup>
                @endif
            </div>
            <div class="excerpt hidden-sm hidden-md">{{ $competition->sponsor }}</div>
            <div class="excerpt hidden-sm hidden-md">{{ $competition->start_date->format('d F Y') }} - {{ $competition->end_date->format('d F Y') }}</div>
            <div class="excerpt hidden-sm hidden-md"> Hadiah : Rp.{{ number_format($competition->hadiah, 0, ',', '.') }}</div>
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
                                    <h2>Deskripsi</h2>
                                    <div class="description">{!! $competition->description !!}</div>
                                    <div class="description text-right">Last Update : {{ $competition->updated_at->format('d F Y') }}</div>
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

                    <div class="col-md-12">
                        <div class="item">
                            <div class="products">
                                <div class="product">

                                <div class="product-info text-left">
                                    <h2>Ketentuan</h2>
                                    <div class="description">{!! $competition->ketentuan !!}</div>
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

                    <div class="col-md-12">
                        <div class="item">
                            <div class="products">
                                <div class="product">

                                <div class="product-info text-left">
                                    <h2>Peraturan</h2>
                                    <div class="description">{!! $competition->rules !!}</div>
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

                    <div class="col-md-12">
                        <div class="item">
                            <div class="products">
                                <div class="product">

                                <div class="product-info text-left">
                                    <h2>Timeline</h2>
                                    <div class="description">{!! $competition->timeline !!}</div>
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

                    <div class="col-md-12">
                        <div class="item">
                            <div class="products">
                                <div class="product">

                                <div class="product-info text-left">
                                    <h2>Daftar Kompetisi</h2>
                                    <div class="description">
                                        <form action="{{ route('homepage.competition_store', $competition->id) }}" method="post">@csrf
                                            <button class="btn btn-primary" type="submit">
                                                Daftar
                                                @if($competition->is_paid == 1)
                                                <sup><span class="text-danger"><small>*</small></span></sup>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
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
