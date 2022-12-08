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
                                <h4 class="card-title mb-0 flex-grow-1">تعديل متجر ({{$store->name}})</h4>
                                <a href="/stores" class="btn btn-primary">جميع المتاجر</a>
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
                                    <form action="/update-store/{{$store->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">اسم المتجر</label>
                                            <input required value="{{$store->name}}" type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">اللوجو</label>
                                            <input type="file" class="form-control" id="logo" name="logo">
                                            <img style="margin-top: 2px" src="/uploads/stores/{{$store->logo}}" height="50" width="50">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">العنوان</label>
                                            <input required value="{{$store->address}}" type="text" class="form-control" id="address" name="address">
                                        </div>
                                        <button type="submit" class="btn btn-primary">تعديل</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
