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
                    <li class="breadcrumb-item"><a href="{{route('deliver.All')}}">جميع الطلبات</a>

                    <li class="breadcrumb-item"><a href="{{route('deliver.All',0)}}">طلبات فى إنتظار التسليم</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('deliver.All',1)}}">طلبات منتهية</a>
                    </li>
                    <li class="breadcrumb-item active"> تسليم طلب لمندوب</li>
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
                    <h4 class="card-title" id="basic-layout-form"> تسليم طلب لمندوب </h4>
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

                        <form class="form" action="{{route('deliver.store')}}" method="POST"
                              enctype="multipart/form-data">
                            {{--dont forget--}}
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i> بيانات العميل </h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2"> المندب </label>
                                            <select name="agent_id" class="select2 form-control">
                                                <optgroup label="من فضلك أختر إسم المندوب لأداء الطلب ">
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->id}}">
                                                            {{$agent->name}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1" >رقم الطلب </label>
                                            <input type="text" value="{{$order->id}}" id=""
                                                   class="form-control " disabled
                                                   name="">
                                            <input type="text" value="{{$order->id}}" id="order_id"
                                                   class="form-control " hidden
                                                   name="order_id">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">حالة الطلب </label>
                                            <input type="text" value="" id="status"
                                                   placeholder="ادخل تفاصيل الطلب الخاصة ان وجدت"
                                                   class="form-control "
                                                   name="status">
                                            @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> ملاحظات</label>
                                            <input type="text" value="" id="notes"
                                                   class="form-control"
                                                   placeholder="الملاحظات"
                                                   name="notes">
                                            @error('notes')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <input type="text"  id="" value="1"
                                           class="form-control " hidden
                                           name="delivered">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">اسم العميل</label>
                                            <input type="text" value="{{$order->clients->name}}" id=""
                                                   class="form-control "disabled
                                                   name="">
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
                                    <i class="la la-check-square-o"></i> حفظ
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
