@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Teachers' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Students' || Auth::user()->role == 'Prodi')
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
            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi')
            <div class="row my-3">
                <div class="col-md-12 col-lg-5">
                    <button class="btn btn-small btn-primary" onclick="tableclassroom();"> <i class="fa fa-server" title="classroom"> </i> Classroom </button>
                    <button class="btn btn-small btn-primary" onclick="createclassrom();"> <i class="fa fa-plus-circle" title="create"> </i> Create Classroom </button>
                </div>
            </div>
            @endif
            @foreach($classroom as $class)
            <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                <div class="blog grid-blog flex-fill">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="{{ asset('admin/assets/img/category/blog-6.jpg') }}" alt="Post Image"></a>
                    </div>

                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li>
                                <div class="post-author">
                                    <a href="{{ route('classroom.index') }}">
                                        <img src="{{ asset('admin/assets/img/logo-small.png') }}" alt="Post Author">
                                        <span>
                                            <span class="post-title"> {{ $class->course}} </span>
                                            <span class="post-title mt-2"><i class="fas fa-calendar-day"> {{ $class->date_start }} - {{ $class->date_end }} </i> </span>
                                            <span class="post-date mt-3"><i class="far fa-clock mt-3"> {{ $class->clock_start }} </i> </span>
                                            <span class="post-date mt-3"><i class="far fa-clock mt-3"> {{ $class->clock_end }} </i> </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        @php
                        if(now() < $class->date_start){
                            $status = 'Will Begin';
                            $backround = 'bg-warning';
                            }elseif(now()->between($class->date_start, $class->date_end)){
                            $status = 'Ongoing';
                            $backround = 'bg-success';
                            }else{
                            $status = 'Has ended';
                            $backround = 'bg-danger';
                            }
                            @endphp
                            <h3 class="blog-title"><a>{{ $class->course }}</a> <span class="badge text-center text-white {{ $backround }} rounded-3 fw-semibold">{{ $status }}</span> </h3>
                            <p>{{ $class->deksripsi }}</p>
                            <p><i class="fas fa-chalkboard-teacher"> {{ $class->teachers }} </i> </p>
                            <p><i class="fas fa-graduation-cap"> {{ $class->students }} </i> </p>
                    </div>
                    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi')
                    <div class="row">
                        <div class="edit-options">
                            <div class="edit-delete-btn">
                                <a href="{{ route('classroom.edit', $class->id) }}" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endif
</div>
@endsection