@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> العملاء </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active"> العملاء
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('client.new')}}">إضافة عميل جديد</a>
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
                        <h4 class="card-title">جميع العملاء </h4>
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
                                        <th> الاسم</th>
                                        <th>الهاتف</th>
                                        <th>العنوان</th>
                                        <th>الشارع / القرية</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @isset($clients)
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->name}}</td>
                                                <td>{{$client->phone}}</td>
                                                <td>{{$client->address}}</td>
                                                <td>{{$client->districts->name}}</td>
                                                <td>
                                                 <span class="dropdown">
                                                    <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true"
                                                            class="btn btn-primary dropdown-toggle dropdown-menu-left">
                                                        <i class="ft-settings"></i>
                                                    </button>
                                                    <span aria-labelledby="btnSearchDrop4"
                                                          class="dropdown-menu mt-1 dropdown-menu-left">
                                                      <a href="{{route('client.edit',$client->id)}}"
                                                         class="dropdown-item">
                                                          <i class="ft-edit-2"></i> تعديل
                                                      </a>
                                                      <a href="{{route('client.delete',$client->id)}}"
                                                         class="dropdown-item" onclick="return confirm('Are you sure?')">
                                                          <i class="ft-trash-2"></i> حذف
                                                      </a>
                                                    </span>
                                                </span>
                                                </td>
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
