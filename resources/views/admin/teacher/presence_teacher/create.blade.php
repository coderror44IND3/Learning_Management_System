@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Teachers' || Auth::user()->role == 'Admin')
    <div class="content container-fluid">

        @include('sweetalert::alert')

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/teachers') }}">Detail Teachers</a></li>
                            <li class="breadcrumb-item active">
                                @if(empty(Auth::user()->role))
                                @else
                                {{Auth::user()->role}}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Students</h6>
                                <h3>50055</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Awards</h6>
                                <h3>50+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Department</h6>
                                <h3>30+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-03.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Revenue</h6>
                                <h3>$505</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('admin/assets/img/icons/dash-icon-04.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title judul-detail">List Teachers</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>
                                        @if(empty(Auth::user()->role))
                                        @else
                                        {{Auth::user()->role}}
                                        @endif
                                    </li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="" class="">
                        <a class="list-group-item list-group-item-action" href="{{ route('teacher.index') }}">Teachers</a>
                        <a class="list-group-item list-group-item-action active">Presence Teacher Add</a>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-8">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title judul-detail">Create Presence Teachers</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>
                                        @if(empty(Auth::user()->role))
                                        @else
                                        {{Auth::user()->role}}
                                        @endif
                                    </li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Offline ID <span class="login-danger">*</span></label>
                                            <select name="users_id" class="form-control select @error('users_id') is-invalid @else is-valid @enderror">
                                                <option>--- Select Offline ---</option>

                                                <option class="optins" value=""></option>

                                            </select>

                                            <!-- Message Error -->
                                            @error('users_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Online ID <span class="login-danger">*</span></label>
                                            <select name="users_id" class="form-control select @error('users_id') is-invalid @else is-valid @enderror">
                                                <option>--- Select Online ---</option>

                                                <option class="optins" value=""></option>

                                            </select>

                                            <!-- Message Error -->
                                            @error('users_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Teachers ID <span class="login-danger">*</span></label>
                                            <select name="users_id" class="form-control select @error('users_id') is-invalid @else is-valid @enderror">
                                                <option>--- Select Teachers ---</option>

                                                <option class="optins" value=""></option>

                                            </select>

                                            <!-- Message Error -->
                                            @error('users_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Date Presence <span class="login-danger">*</span></label>
                                            <input type="date" name="birthday_teachers" value="{{ old('birthday_teachers') }}" class="form-control @error('birthday_teachers') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('birthday_teachers')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Clock Presence <span class="login-danger">*</span></label>
                                            <input type="time" name="birthday_teachers" value="{{ old('birthday_teachers') }}" class="form-control @error('birthday_teachers') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('birthday_teachers')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Presence <span class="login-danger">*</span></label>
                                            <select name="users_id" class="form-control select @error('users_id') is-invalid @else is-valid @enderror">
                                                <option>--- Select Presence ---</option>

                                                <option class="optins" value=""></option>

                                            </select>

                                            <!-- Message Error -->
                                            @error('users_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="" style="float: right;">
                                            <button type="submit" name="proses" value="simpan" id="simpan" class="btn btn-primary">Create</button>
                                            <a href="{{ route('presence_teacher.index') }}" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    @endif
</div>
@endsection