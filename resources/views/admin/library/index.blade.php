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

            <div class="row my-3">
                <div class="col-md-12 col-lg-5">
                    <button class="btn btn-small btn-primary" onclick="tablelibrary();"> <i class="fa fa-server" title="library"> </i> Table Library </button>
                    <button class="btn btn-small btn-primary" onclick="createlibrary();"> <i class="fa fa-plus-circle" title="create"> </i> Create Library </button>
                </div>
            </div>
            @foreach($library as $r)
            <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                <div class="blog grid-blog flex-fill">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="{{ asset('admin/assets/img/category/blog-6.jpg') }}" alt="Post Image"></a>
                        <div class="blog-views">
                            <i class="feather-eye me-1"></i> 225
                        </div>
                    </div>

                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li>
                                <div class="post-author">
                                    <a href="profile.html">
                                        <img src="{{ asset('admin/assets/img/logo-small.png') }}" alt="Post Author">
                                        <span>
                                            <span class="post-title">{{ $r->course_univesity }}</span>
                                            <span class="post-date"><i class="far fa-clock"></i> {{ $r->date_univesity }} </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <h3 class="blog-title"><a>{{ $r->course_univesity }}</a></h3>
                        <p>{{ $r->deksripsi_univesity }}</p>
                    </div>
                    <div class="row">
                        <div class="edit-options">
                            <div class="edit-delete-btn">
                                <a href="{{ route('library.edit', $r->id) }}" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach


        </div>

    </div>
    @endif
</div>
@endsection