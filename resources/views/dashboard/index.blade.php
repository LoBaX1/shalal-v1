@extends('layouts.dashboard')

@section('title','home')

@section('body_header')
@endsection
@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info">{{count($clients)}}</h3>
                            <h6>إجمالي العملاء</h6>
                        </div>
                        <div>
                            <i class="icon-user info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="warning">{{count($payments)}}</h3>
                            <h6> الفواتير</h6>
                        </div>
                        <div>
                            <i class="icon-note warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success">{{count($agents)}}</h3>
                            <h6> عدد المندوبين</h6>
                        </div>
                        <div>
                            <i class="icon-wrench success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="danger">{{count($orders)}}</h3>
                            <h6>الطلبات المنتهية</h6>
                        </div>
                        <div>
                            <i class="icon-rocket danger font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                             aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row match-height">

    <div class="col-xl-6 col-lg-12" >
        <div class="card"  style="max-height: 300px">
            <div class="card-header">
                <h4 class="card-title">العملاء الجدد</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content  table-responsive" style="max-height: 100%">
                <table class="table table-striped table-bordered  " >
                    <thead>
                    <tr>
                        <th class="border-top-0">إسم العميل</th>
                        <th class="border-top-0">الهاتف </th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=1;$i<$clients_c;$i++)
                        <tr>
                            <td class="text-truncate">{{$clients[$i]->name}}</td>
                            <td class="text-truncate">{{$clients[$i]->phone}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="recent-transactions" class="col-xl-6 col-lg-12">
        <div class="card" style="max-height: 300px">
            <div class="card-header">
                <h4 class="card-title">آخر الفواتير</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                               href="{{route('payment.index')}}" target="_blank">عرض الكل</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">

                        <thead>
                            <tr>
                                <th class="border-top-0">رقم الفاتورة</th>
                                <th class="border-top-0">إسم العميل</th>
                                <th class="border-top-0">التكلفة</th>
                            </tr>
                        </thead>

                        <tbody>
                        @for($i=1;$i<$payments_c;$i++)
                        <tr>
                            <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                {{$payments[$i]->id}}
                            </td>
                            <td class="text-truncate">
                                {{$payments[$i]->orders->clients->name}}
                            </td>

                            <td class="text-truncate"> {{$payments[$i]->orders->price}} ج</td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
