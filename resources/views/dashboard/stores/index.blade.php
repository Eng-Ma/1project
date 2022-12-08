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
                                <h4 class="card-title mb-0 flex-grow-1">جميع المتاجر</h4>
                                <a href="/create-store" class="btn btn-primary">إضافة متجر</a>
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
                                                <th>العنوان</th>
                                                <th>اللوجو</th>
                                                <th>عدد المنتجات</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>عمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($stores as $store)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img src="/uploads/stores/{{$store->logo}}" alt="" class="avatar-xs rounded-circle me-2">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="font-size-14 mb-1"><a href="" class="text-dark">{{$store->name}}</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$store->address}}
                                                    </td>
                                                    <td>
                                                        <img src="/uploads/stores/{{$store->logo}}" alt="" class="avatar-xs rounded-circle me-2">
                                                    </td>
                                                    <td>
                                                        {{$store->products->count()}}
                                                    </td>
                                                    <td>
                                                        {{$store->created_at->format('Y-m-d')}}
                                                    </td>
                                                    <td>
                                                        @if($store->deleted_at == null)
                                                            <a href="/edit-store/{{$store->id}}" class="btn btn-primary">تعديل</a>
                                                            <form action="/delete-store/{{$store->id}}" method="post" style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger delete">حذف</button>
                                                            </form>
                                                        @else
                                                            <form action="/delete-store/{{$store->id}}" method="post" style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-warning delete">استعادة</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
