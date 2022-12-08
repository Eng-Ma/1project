@extends('website.layout')
@section('content')
    <section class="city-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <h2>آخر المتاجر </h2>
                        <p>قم بتصفح آخر متاجرنا</p>
                    </div>
                </div>
            </div>
            <div class="row" style="direction: rtl">
                @foreach($stores as $store)
                    <div class="col-lg-4 col-md-6">
                        <div class="city-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <img src="/uploads/stores/{{$store->logo}}" alt="Image">
                            <p>{{$store->products->count()}}</p>
                            <h3><a href="/site/stores/{{$store->id}}">{{$store->name}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="show-more text-center mt-50">
                <a href="/site/stores" class="btn btn-primary">عرض المزيد</a>
            </div>
        </div>
    </section>
    <section class="property-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <h2>آخر منتجاتنا</h2>
                        <p>قم برؤية آخر منتجاتنا من هنا</p>
                    </div>
                </div>
            </div>
            <div class="row" style="direction: rtl">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="property-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="property-img">
                                <img src="/uploads/products/{{$product->image}}" alt="Image">
                            </div>
                            <div class="property-info">
                                <h3><a href="/site/products/{{$product->id}}">{{$product->name}}</a></h3>
                                <p>{{$product->description}}</p>
                                <div class="row">
                                    <div class="col-lg-6">
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
                                                    <input type="hidden" name="price" value="{{$product->discount_price}}">
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
