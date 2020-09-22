@extends('layouts.dashboard')

@section('title','home')

@section('body_header')


@endsection
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"> الطلبات </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('order.All')}}">الطلبات</a>
                    </li>
                    <li class="breadcrumb-item active"> تعديل طلب حال
                    </li>
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
                    <h4 class="card-title" id="basic-layout-form"> تعديل طلب حالي </h4>
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
                        <form class="form" action="{{route('order.update',$order->id)}}" method="POST"
                              enctype="multipart/form-data">
                            {{--dont forget--}}
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i> بيانات الطلب </h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2"> العميل </label>
                                            <select name="client_id" class="select2 form-control">
                                                <optgroup label="من فضلك أختر اسم العميل ">
                                                    @foreach($clients as $client)
                                                        <option value="{{$client->id}}"
                                                                @if($order->client_id == $client->id) selected @endif >
                                                        {{$client->name}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> سعة الخزان </label>
                                            <input type="text" value="{{$order->tank_capacity}}" id="tank_capacity"
                                                   class="form-control"
                                                   placeholder="ادخل سعة الخزان"
                                                   name="tank_capacity">
                                            @error('tank_capacity')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2"> مدة الطلب بالأيام </label>
                                            <select name="delay" class="select2 form-control">
                                                <optgroup label="من فضلك أختر عدد الأيام لتسليم الطلب ">
                                                    @for($i =1 ;$i<=20 ;$i++)
                                                        <option value="{{$i}}"
                                                                @if($i == $order->delay) selected @endif>
                                                            {{$i}}
                                                        </option>
                                                    @endfor
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> التكلفة</label>
                                            <input type="text" value="{{$order->price}}" id="price"
                                                   class="form-control"
                                                   placeholder="ادخل تكلفة ملئ الخزان"
                                                   name="price">
                                            @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2"> الحالة </label>
                                            <select name="status" class="select2 form-control">
                                                <optgroup label="من فضلك أختر عدد الأيام لتسليم الطلب ">
                                                        <option value="0" @if($order->status == 0) selected @endif
                                                        >جاري العمل
                                                        </option>
                                                        <option value="1" @if($order->status == 1) selected @endif
                                                        >تمت</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> ملاحظات</label>
                                            <input type="text" value="{{$order->notes}}" id="notes"
                                                   class="form-control"
                                                   placeholder="ادخل ملاحظاتك"
                                                   name="notes">
                                            @error('notes')
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
