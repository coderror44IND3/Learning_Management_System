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
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Dashboard</a></li>
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
                    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                    <div id="" class="">
                        <a class="list-group-item list-group-item-action active">Teachers</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('presence_teacher.index') }}">Presence Teachers</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('presence_student.index')}}">Presence Students</a>
                    </div>
                    @endif
                </div>

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title judul-detail">My Profile</h5>
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
                    <div class="table-responsive mt-3">
                        @if($teachers_users)
                        <table class="table border-0 star-student table-hover table-center mb-0 table-striped">
                            <thead class="text-center details-teacher" bgcolor='#0D6EFD'>
                                <tr>
                                    <th>No</th>
                                    <th>photo</th>
                                    <th>nim</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>E-Mail</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no = 1; @endphp
                                <tr class="text-center">
                                    <td>{{ $no }}</td>
                                    <td>
                                        @if(empty(Auth::user()->photo))
                                        <img src="{{ asset ('admin/assets/img/profiles/not-profile.png') }}" alt="User Image" class="rounded-circle">
                                        @else
                                        <img src="{{ asset ('admin/assets/img/profiles/') }}/{{Auth::user()->photo}}" alt="User Image" class="rounded-circle">
                                        @endif
                                    </td>
                                    <td>{{ Auth::user()->nim }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->telp }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td>{{ Auth::user()->address }}</td>
                                    <td>
                                        <div class="actions text-center">
                                            @if(Auth::user()->role == 'Teachers' || Auth::user()->role == 'Admin')
                                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2">
                                                <i class="feather-eye"></i>
                                            </a>
                                            @endif
                                            @if(Auth::user()->role == 'Admin')
                                            <a href="edit-teacher.html" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @php $no++; @endphp
                        </table>
                        @else
                        <p class="text-center comments-not container-fluid">Tidak ada data pengguna yang sesuai.</p>
                        @endif
                    </div>

                </div>

            </div>

            <div class="col-md-12 col-lg-7">

                <div class="student-group-form">
                    <form action="/searchteacher" method="GET">
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
                                <h5 class="card-title judul-detail">Teachers</h5>
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
                            @if(Auth::user()->role == 'Admin')
                            <a href="#" class="btn btn-primary"><i class="fas fa-download" title="Downloads" style="font-size: 18px;"></i></a>
                            @endif
                            @if(Auth::user()->role == 'Admin')
                            <button onclick="createteacher();" class="btn btn-primary"><i class="fa fa-plus-circle" title="Create" style="font-size: 18px;"></i></button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive mt-3">
                        <table class="table border-0 star-student table-hover table-center mb-0 table-striped" id="dataTable">
                            <thead class="text-center details-teacher" bgcolor='#0D6EFD'>
                                <tr>
                                    <th>No</th>
                                    <th>photo</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Birth</th>
                                    <th>Telephone</th>
                                    <th>E-Mail</th>
                                    <th>Address</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no = 1; @endphp
                                @foreach($teachers as $viw_teachers)
                                <tr class="text-center">
                                    <td>{{ $no }}</td>
                                    <td>
                                        @empty($viw_teachers->photo_teachers)
                                        <img src="{{ asset ('admin/assets/img/teachers/not-profile.png') }}" alt="User Image" class="rounded-circle" width="15%" style="width: 50px;">
                                        @else
                                        <img src="{{ asset ('admin/assets/img/teachers/') }}/{{$viw_teachers->photo_teachers}}" alt="User Image" class="rounded-circle" width="15%" style="width: 40px;">
                                        @endempty
                                    </td>
                                    <td>{{ $viw_teachers->name_teachers }}</td>
                                    <td>{{ $viw_teachers->gender_teachers }}</td>
                                    <td>{{ $viw_teachers->birthday_teachers }}</td>
                                    <td>{{ $viw_teachers->telp_teachers }}</td>
                                    <td>{{ $viw_teachers->email_teachers }}</td>
                                    <td>{{ $viw_teachers->address_teachers }}</td>
                                    @if(Auth::user()->role == 'Admin')
                                    <form method="POST" action="{{ route('teacher.destroy', $viw_teachers->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <div class="actions text-center">
                                                <a href="{{ route('teacher.edit', $viw_teachers->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <button class="btn btn-sm bg-danger-light">
                                                    <i class="feather-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </form>
                                    @endif
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