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
                                <h4 class="card-title mb-0 flex-grow-1">اضافة مرحلة</h4>
                                <a href="/stores" class="btn btn-primary">جميع المراحل</a>
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
                                    <form action="/store-store" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">اسم المتجر</label>
                                            <input required type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">اللوجو</label>
                                            <input required type="file" class="form-control" id="logo" name="logo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">العنوان</label>
                                            <input required type="text" class="form-control" id="address" name="address">
                                        </div>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
