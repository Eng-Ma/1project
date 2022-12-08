@extends('website.layout')
@section('content')
    <section class="property-wrap ptb-100">
        <div class="container">
            <div class="container" style="text-align: right !important;">
                <div class="search-property style1">
                    <form action="" class="property-search-form">
                        <div class="form-group" style="width: 80%">
                            <input name="search" value="{{request()->search}}" style="text-align: right !important;" type="text"
                                   placeholder="ابحث عن المنتجات بالاسم">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn style2">بحث</button>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <h2>جميع منتجاتنا</h2>
                        <p>قم برؤية جميع منتجاتنا من هنا</p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row" style="text-align: right !important;">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-4" style="margin: 0 auto">
                        <div class="property-card style2">
                            <div class="property-img">
                                <img src="/uploads/products/{{$product->image}}" alt="Image">
                            </div>
                            <div class="property-info">
                                <h3><a href="/site/products/{{$product->id}}">{{$product->name}}</a></h3>
                                <p>{{$product->description}}</p>
                                <div class="row">
                                    <div class="col-lg-6" style="text-align: left !important;">
                                        @if($product->is_base_price)
                                            <p class="property-price">${{$product->base_price}}</p>
                                        @else
                                            <p class="property-price">${{$product->discount_price}} بعد الخصم</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product-plus-icon">
                                            <form action="/site/purchase/{{$product->id}}" method="post">
                                                @csrf
                                                @if($product->is_base_price)
                                                    <input type="hidden" name="price" value="{{$product->base_price}}">
                                                @else
                                                    <input type="hidden" name="price"
                                                           value="{{$product->discount_price}}">
                                                @endif
                                                <input type="submit" value="شراء">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
