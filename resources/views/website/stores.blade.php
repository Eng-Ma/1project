@extends('website.layout')
@section('content')
    <section class="city-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <h2>جميع المتاجر</h2>
                        <p>قم بتصفح جميع متاجرنا</p>
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
        </div>
    </section>
@endsection
