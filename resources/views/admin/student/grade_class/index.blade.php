@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Students' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
    <div class="content container-fluid">
        @include('sweetalert::alert')
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
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
            <div class="col-md-12 col-lg-5">

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
                        @if(Auth::user()->role == 'Students' || Auth::user()->role == 'Admin')
                        <a class="list-group-item list-group-item-action" href="{{ route('student.index') }}">Students</a>
                        @endif
                        @if(Auth::user()->role == 'Students' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                        <a class="list-group-item list-group-item-action" href="{{ route('assigment.index') }}">Assigments</a>
                        <a class="list-group-item list-group-item-action active">Lesson Students</a>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-lg-7">

                <div class="student-group-form">
                    <form action="/searchlesson" method="GET">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <input type="date" name="start_search" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <input type="date" name="end_search" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="search-student-btn">
                                    <button type="btn" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title judul-detail">Lesson Students</h5>
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
                        <div class="col-auto text-end float-end ms-auto download-grp mt-3">
                            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Students')
                            <a href="#" class="btn btn-primary"><i class="fas fa-download" title="Downloads" style="font-size: 18px;"></i></a>
                            @endif
                            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                            <button onclick="createlesson();" class="btn btn-primary"><i class="fa fa-plus-circle" title="Create" style="font-size: 18px;"></i></button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive mt-3">
                        <table class="table border-0 star-student table-hover table-center mb-0 table-striped" id="dataTable">
                            <thead class="text-center details-teacher" bgcolor='#0D6EFD'>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Dailytasks</th>
                                    <th>Presence</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                    <th class="text-center">Final Score</th>
                                    <th class="text-center">Grade</th>
                                    <th class="text-center">Predikat</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no = 1; @endphp
                                @foreach($lesson_score as $sceroo_students)
                                <tr class="text-center">
                                    <td>{{ $no }}</td>
                                    <td>{{ $sceroo_students->name_score }}</td>
                                    <td>{{ $sceroo_students->dailytasks_score }}</td>
                                    <td>{{ $sceroo_students->presence_score }}</td>
                                    <td>{{ $sceroo_students->uts_score }}</td>
                                    <td>{{ $sceroo_students->uas_score }}</td>
                                    <td>{{ $sceroo_students->average_grade }}</td>
                                    <td>{{ $sceroo_students->grade }}</td>
                                    <td>{{ $sceroo_students->predikat }}</td>
                                    <td>

                                        @php
                                        $status_ketvalue = $sceroo_students->ketnilai;
                                        $btn_color = '';

                                        switch ($status_ketvalue){
                                        case 'Graduate';
                                        $btn_color = 'btn-success';
                                        break;
                                        case 'Not Pass':
                                        $btn_color = 'btn-danger';
                                        break;
                                        default:
                                        $status_ketvalue = '';
                                        }
                                        @endphp

                                        <label class="btn btn-sm {{ $btn_color }}">{{ $sceroo_students->ketnilai }}</label>
                                    </td>

                                    <form method="POST" action="{{ route('grade_class.destroy', $sceroo_students->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <div class="actions text-center">
                                                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                                                <a href="{{ route('grade_class.edit', $sceroo_students->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                @endif
                                                @if(Auth::user()->role == 'Admin')
                                                <button class="btn btn-sm bg-danger-light">
                                                    <i class="feather-trash"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                            @php $no++; @endphp
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endif
</div>
@endsection