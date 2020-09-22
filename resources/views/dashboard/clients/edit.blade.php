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
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{route('client.All')}}">العملاء </a></li>
                        <li class="breadcrumb-item active"> تعديل عميل حالي</li>
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
                    <h4 class="card-title" id="basic-layout-form"> تعديل عميل </h4>
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

                        <form class="form" action="{{route('client.update',$client->id)}}" method="POST"
                              enctype="multipart/form-data">
                            {{--dont forget--}}
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i> بيانات العميل </h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> اسم العميل </label>
                                            <input type="text" value="{{$client->name}}" id="name"
                                                   class="form-control"
                                                   placeholder="ادخل اسم العميل  "
                                                   name="name">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> رقم الهاتف </label>
                                            <input type="text" value="{{$client->phone}}" id="phone"
                                                   class="form-control"
                                                   placeholder="ادخل رقم الهاتف "
                                                   name="phone">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2"> الشارع / القرية </label>
                                            <select name="district_id" class="select2 form-control">
                                                <optgroup label="من فضلك أختر الشراع / القرية ">
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->id}}"
                                                                @if($district->id == $client->district_id)
                                                                selected
                                                                @endif>
                                                            {{$district->name}}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> عنوان العميل</label>
                                            <input type="text" value="{{$client->address}}" id="address"
                                                   class="form-control"
                                                   placeholder="ادخل العنوان بالتفصيل"
                                                   name="address">
                                            @error('address')
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
