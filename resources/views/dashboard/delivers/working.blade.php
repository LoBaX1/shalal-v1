@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> جميع الطلبات </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">الطلبات الجاري العمل بها </li>

                </ol>
            </div>
        </div>
    </div>
</div>

@include('dashboard.includes.alerts.success')
@include('dashboard.includes.alerts.errors')

<div class="content-body">
    <!-- DOM - jQuery events table -->

    <section id="dom">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            الطلبات الجاري العمل بها
                        </h4>
                        <a class="heading-elements-toggle"><i
                                class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered zero-configuration dataTable"
                                   id="DataTables_Table_0" role="grid"
                                   aria-describedby="DataTables_Table_0_info">

                                <thead>
                                <tr>
                                    <th> إسم العميل</th>
                                    <th>سعة الخزان</th>
                                    <th>السعر</th>
                                    <th>مدة الطلب</th>
                                    <th>تاريخ الطلب</th>
                                    <th>حالة الطلب</th>
                                    <th>إتمام العمل</th>
                                </tr>
                                </thead>

                                <tbody>
                                @isset($orders)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->clients->name}}</td>
                                            <td>{{$order->tank_capacity}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->delay}}</td>
                                            <td>{{$order->delay_date}}</td>
                                            <td>{{$order->status()}}</td>
                                            <th>
                                                <a href="{{route('deliver.done',$order->id)}}"
                                                   class="btn btn-danger mr-1"onclick="return confirm('هل تم الطلب؟')">
                                                    <i class="ft-edit-2"></i> إتمام؟
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>

                            </table>

                            <div class="justify-content-center d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


</div>


@endsection
