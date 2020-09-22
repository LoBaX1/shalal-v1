@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title"> المندوبين </h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{route('agent.All')}}">المندوبين </a></li>
                        <li class="breadcrumb-item active"> تعديل مندوب حالي</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<div class="content-body">

<!-- Basic form layout section start -->
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form"> تعديل مندوب </h4>
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
                    <div class="card-body">

                        <form class="form" action="{{route('agent.update',$agent->id)}}" method="POST"
                              enctype="multipart/form-data">
                            {{--dont forget--}}
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i> بيانات المندوب </h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> اسم المندوب </label>
                                            <input type="text" value="{{$agent->name}}" id="name"
                                                   class="form-control"
                                                   placeholder="ادخل اسم المندوب  "
                                                   name="name">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> رقم الهاتف </label>
                                            <input type="text" value="{{$agent->phone}}" id="phone"
                                                   class="form-control"
                                                   placeholder="ادخل رقم الهاتف     "
                                                   name="phone">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"
                                        onclick="history.back();">
                                    <i class="ft-x"></i> تراجع
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> تحديث
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic form layout section end -->
</div>

@endsection
