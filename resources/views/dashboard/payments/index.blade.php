@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> الفواتير</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active"> الفواتير
                    </li>
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
                        <h4 class="card-title">جميع الفواتير</h4>
                        <a class="heading-elements-toggle">
                            <i class="la la-ellipsis-v font-medium-3">

                            </i>
                        </a>
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

                            <div id="DataTables_Table_1_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <table class="table table-striped table-bordered dataex-visibility-message dataTable"
                                       id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">

                                    <thead>
                                        <tr role="row">

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                                rowspan="1" colspan="1"  aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"> رقم الفاتورة</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                                rowspan="1" colspan="1"  aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"> إسم العميل</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                                rowspan="1" colspan="1"  aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">تاريخ الفاتورة</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" >سعة الخزان</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">التكلفة</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                            rowspan="1" colspan="1"  aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" >المسؤول</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @isset($payments)
                                        @foreach($payments as $payment)
                                            <tr  role="row" class="odd">
                                                <td class="sorting_1">{{$payment->id}}</td>
                                                <td>{{$payment->orders->clients->name}}</td>
                                                <td>{{$payment->created_at}}</td>
                                                <td>{{$payment->orders->tank_capacity}} لتر</td>
                                                <td>{{$payment->amount}} ج</td>
                                                <td>{{$payment->admins->name}}</td>
                                            </tr>
                                        @endforeach
                                        @endisset
                                    </tbody>

                                </table>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


@endsection
