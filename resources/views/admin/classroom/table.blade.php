@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi')
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
                                <h5 class="card-title judul-detail">List Classroom</h5>
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
                        <a class="list-group-item list-group-item-action" href="{{ route('classroom.index') }}">Classroom</a>
                        <a class="list-group-item list-group-item-action active">Classroom Table</a>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-lg-7">

                <div class="student-group-form">
                    <form action="/searchclassroom" method="GET">
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
                                <h5 class="card-title judul-detail">Classroom</h5>
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
                            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi')
                            <a href="#" class="btn btn-primary"><i class="fas fa-download" title="Downloads" style="font-size: 18px;"></i></a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive mt-3">
                        <table class="table border-0 star-student table-hover table-center mb-0 table-striped" id="dataTable">
                            <thead class="text-center details-teacher" bgcolor='#0D6EFD'>
                                <tr>
                                    <th>No</th>
                                    <th>Offline</th>
                                    <th>Online</th>
                                    <th>Teachers</th>
                                    <th>Students</th>
                                    <th>Library</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Clock Start</th>
                                    <th>Clock End</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no = 1; @endphp
                                @foreach($classroom as $classr)
                                <tr class="text-center">
                                    <td>{{ $no }}</td>
                                    <td>{{ $classr->offline_class }}</td>
                                    <td>{{ $classr->online_class }}</td>
                                    <td>{{ $classr->teachers }}</td>
                                    <td>{{ $classr->students }}</td>
                                    <td>{{ $classr->course }}</td>
                                    <td>{{ $classr->date_start }}</td>
                                    <td>{{ $classr->date_end }}</td>
                                    <td>{{ $classr->clock_start }}</td>
                                    <td>{{ $classr->clock_end }}</td>
                                    @php
                                    if(now() < $classr->date_start){
                                        $status = 'Will Begin';
                                        $backround = 'bg-warning';
                                        }elseif(now()->between($classr->date_start, $classr->date_end)){
                                        $status = 'Ongoing';
                                        $backround = 'bg-success';
                                        }else{
                                        $status = 'Has ended';
                                        $backround = 'bg-danger';
                                        }
                                        @endphp
                                        <td><span class="label-style badge text-center text-white {{ $backround }} rounded-3 fw-semibold"> {{ $status }} </span></td>
                                        <form method="POST" action="{{ route('classroom.destroy', $classr->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <div class="actions text-center">
                                                    @if(Auth::user()->role == 'Prodi' || Auth::user()->role == 'Admin')
                                                    <a href="{{ route('classroom.edit', $classr->id) }}" class="btn btn-sm bg-danger-light">
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