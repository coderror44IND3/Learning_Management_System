@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
    <div class="content container-fluid">
        @include('sweetalert::alert')
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('grade_class.index') }}">Lesson Students</a></li>
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
                                <h5 class="card-title judul-detail">List Lesson</h5>
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
                        <a class="list-group-item list-group-item-action" href="{{ route('grade_class.index') }}">Lesson Students</a>
                        <a class="list-group-item list-group-item-action active">Lesson Students Add</a>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-8">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title judul-detail">Create Lesson Students</h5>
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
                            <form method="POST" action="{{ route('grade_class.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Name Students <span class="login-danger">*</span></label>
                                            <input type="text" name="name_score" value="{{ old('name_score') }}" class="form-control @error('name_score') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('name_score')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Daily Tasks <span class="login-danger">*</span></label>
                                            <input type="text" name="dailytasks_score" value="{{ old('dailytasks_score') }}" class="form-control @error('dailytasks_score') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('dailytasks_score')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Presence <span class="login-danger">*</span></label>
                                            <input type="text" name="presence_score" value="{{ old('presence_score') }}" class="form-control @error('presence_score') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('presence_score')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>UTS <span class="login-danger">*</span></label>
                                            <input type="text" name="uts_score" value="{{ old('uts_score') }}" class="form-control @error('uts_score') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('uts_score')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>UAS <span class="login-danger">*</span></label>
                                            <input type="text" name="uas_score" value="{{ old('uas_score') }}" class="form-control @error('uas_score') is-invalid @else is-valid @enderror">

                                            <!-- Message Error -->
                                            @error('uas_score')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Library ID <span class="login-danger">*</span></label>
                                            <select name="table_course_id" class="form-control select @error('table_course_id') is-invalid @else is-valid @enderror">
                                                <option>--- Select Library ID ---</option>
                                                @foreach($library as $users_ac)
                                                @php $sel = (old('table_course_id') == $users_ac['id']) ? 'selected' : ''; @endphp
                                                <option class="optins" value="{{ $users_ac->id }}" {{ $sel }}>{{ $users_ac->course_univesity }}</option>
                                                @endforeach
                                            </select>

                                            <!-- Message Error -->
                                            @error('table_course_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="" style="float: right;">
                                            <button type="submit" name="proses" value="simpan" id="simpan" class="btn btn-primary">Create</button>
                                            <a href="{{ route('grade_class.index') }}" class="btn btn-primary">Cancel</a>
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