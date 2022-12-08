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
                            <h4 class="card-title mb-0 flex-grow-1">اضافة منتح</h4>
                            <a href="/products" class="btn btn-primary">جميع المنتجات</a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="/store-product" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label for="name">الاسم</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="ادخل اسم المنتج">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">الوصف</label>
                                        <textarea name="description" class="form-control" id="description"
                                                  placeholder="ادخل وصف المنتج"></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="image">الصورة</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="store_id"> المتجر</label>
                                        <select name="store_id" class="form-control" id="store_id">
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="base_price">السعر الاصلي</label>
                                        <input type="number" name="base_price" class="form-control" id="base_price"
                                               placeholder="ادخل السعر الاصلي">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="discount_price">السعر بعد الخصم</label>
                                        <input type="number" name="discount_price" class="form-control"
                                               id="discount_price" placeholder="ادخل السعر بعد الخصم">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="is_base_price">يرجى اختيار السعر الذي سيظهر</label>
                                        <select name="is_base_price" class="form-control" id="is_base_price">
                                            <option value="1">السعر الاصلي</option>
                                            <option value="0">السعر بعد الخصم</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
