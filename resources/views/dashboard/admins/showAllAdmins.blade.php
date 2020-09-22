@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> المستخدمون </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active"> المستخدمون
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.createNewAdmin')}}">إضافة مستخدم جديد</a>
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
                        <h4 class="card-title">جميع المستخدمين </h4>
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
                                        <th>البريد الإلكتروني</th>
                                        <th>الهاتف</th>
                                        <th>الصلاحيات</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @isset($admins)
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}} </td>
                                                <td>{{$admin->phone}}</td>
                                                <td>{{$admin->getPermissions()}}</td>
                                                <td>
                                                 <span class="dropdown">
                                                    <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true"
                                                            class="btn btn-primary dropdown-toggle dropdown-menu-left">
                                                        <i class="ft-settings"></i>
                                                    </button>
                                                    <span aria-labelledby="btnSearchDrop4"
                                                          class="dropdown-menu mt-1 dropdown-menu-left">
                                                      <a href="{{route('admin.editAdmin',$admin->id)}}"
                                                         class="dropdown-item">
                                                          <i class="ft-edit-2"></i> تعديل
                                                      </a>
                                                      <a href="{{route('admin.deleteAdmin',$admin->id)}}"
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
