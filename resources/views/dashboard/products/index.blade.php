@extends('dashboard.layout')
@section('content')
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">جميع المنتجات</h4>
                                <a href="/create-product" class="btn btn-primary">إضافة منتج</a>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">
                                            <tr>
                                                <th>الاسم</th>
                                                <th>الوصف</th>
                                                <th>الصورة</th>
                                                <th>اسم المتجر</th>
                                                <th>السعر الاساسي</th>
                                                <th>السعر بعد الخصم</th>
                                                <th>عدد مرات الشراء</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    <td><img src="/uploads/products/{{$product->image}}" width="70px" height="70px"></td>
                                                    <td>{{$product->store->name}}</td>
                                                    <td>{{$product->base_price}}</td>
                                                    <td>{{$product->discount_price}}</td>
                                                    <td>{{$product->purchaseCount}}</td>
                                                    <td>{{$product->created_at}}</td>
                                                    <td>
                                                        @if($product->deleted_at == null)
                                                            <a href="/edit-product/{{$product->id}}" class="btn btn-primary">تعديل</a>
                                                            <form action="/delete-product/{{$product->id}}" method="post" style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </form>
                                                        @else
                                                            <form action="/delete-product/{{$product->id}}" method="post" style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-warning">استعادة</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
