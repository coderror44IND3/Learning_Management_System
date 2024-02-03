@extends('admin.layouts.index')
@section('content')
<div class="page-wrapper">
    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Students')
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
            <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
            <div id="snap-container"></div>
        </div>

        <div class="row">

            <div class="row my-3">
                <div class="col-md-12 col-lg-5">
                    @if(Auth::user()->role == 'Students' || Auth::user()->role == 'Admin')
                    <button id="pay-button" class="text-success text-white btn btn-small btn-primary"><i class="fas fa-file-invoice-dollar text-white"> Class Money </i> </button>
                    @endif
                    @if(Auth::user()->role == 'Treasurer' || Auth::user()->role == 'Admin')
                    <button class="btn btn-small btn-primary" onclick="createmoney();"> <i class="fa fa-plus-circle" title="create"> </i> Create Students </button>
                    @endif
                </div>
            </div>
            @foreach($money_class as $money)
            <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                <div class="blog grid-blog flex-fill">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="{{ asset('admin/assets/img/category/blog-6.jpg') }}" alt="Post Image"></a>
                    </div>

                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li>
                                <div class="post-author">
                                    <a href="{{ route('library.index') }}">
                                        <img src="{{ asset('admin/assets/img/logo-small.png') }}" alt="Post Author">
                                        <span>
                                            <span class="post-title"> Classroom {{ $money->class_students }} </span>
                                            <span class="post-title mt-2"><i class="fas fa-calendar-day"> {{ $money->date }} </i> </span>
                                            <span class="post-date mt-2"><i class="far fa-clock mt-2"> {{ $money->clock }} </i> </span><br>
                                            <span class="post-date text-success mt-2"><i class="fas fa-file-invoice-dollar mt-2"> Rp. {{ number_format($money->money_students,0,',','.') }} </i> </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        @php
                        $status_money = $money->status_students;
                        $btn_color = '';

                        switch ($status_money){
                        case 'Paid';
                        $btn_color = 'btn-success';
                        break;
                        case 'Unpaid':
                        $btn_color = 'btn-danger';
                        break;
                        default:
                        $status_money = '';
                        }
                        @endphp
                        <h3 class="blog-title"><a> {{ $money->name }} </a> <span class="label-style badge text-center text-white {{ $btn_color }} rounded-3 fw-semibold"> {{ $status_money }} </span> </h3>
                        <p style="text-align: justify;">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                            Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                    <div class="row">
                        <div class="edit-options">
                            <div class="edit-delete-btn">
                                <form method="POST" action="{{ route('money.destroy', $money->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Treasurer')
                                    <a href="{{ route('money.edit', $money->id) }}" style="height: 29px;" class="btn btn-sm bg-warning text-white"><i class="feather-edit me-1"></i> Edit</a>
                                    <button class="post-date btn btn-sm bg-danger text-white"><i class="feather-trash-2 text-white"></i> Delete </button>
                                    @endif
                                </form>
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