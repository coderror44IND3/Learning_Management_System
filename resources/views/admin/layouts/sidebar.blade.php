<div class="sidebar" id="sidebar">
    @include('notify::components.notify')
    <x:notify-messages />
    @notifyJs
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if(Auth::user()->role == 'Prodi' || Auth::user()->role == 'Treasurer' || Auth::user()->role == 'Students' || Auth::user()->role == 'Member' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                <li class="menu-title">
                    <span>Dashboard</span>
                </li>
                <li class="">
                    <a href="{{ url('/dashboard') }}"><i class="feather-grid"></i> <span>Dashboard</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers')
                <li class="menu-title">
                    <span>Teachers</span>
                </li>
                <li class="">
                    <a href="{{ route('teacher.index') }}"><i class="fas fa-chalkboard-teacher"></i> <span>Teachers</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Students' || Auth::user()->role == 'Treasurer')
                <li class="menu-title">
                    <span>Students</span>
                </li>
                <li class="">
                    <a href="{{ route('student.index') }}"><i class="fas fa-graduation-cap"></i> <span>Students</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Prodi' || Auth::user()->role == 'Teachers' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Students')
                <li class="menu-title">
                    <span>Classroom</span>
                </li>
                <li class="">
                    <a href="{{ route('classroom.index') }}"><i class="fas fa-book-reader"></i> <span>Classroom</span></a>
                </li>
                <li class="">
                    <a href="{{ route('library.index') }}"><i class="fas fa-book-reader"></i> <span>Library</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Member')
                <li class="menu-title">
                    <span>Organization</span>
                </li>
                <li class="">
                    <a href="{{ route('organization.index') }}"><i class="fas fa-building"></i> <span>Organization</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Prodi' || Auth::user()->role == 'Admin' || Auth::user()->role == 'Teachers' || Auth::user()->role == 'Students' || Auth::user()->role == 'Member' || Auth::user()->role == 'Rektor' || Auth::user()->role == 'Treasurer')
                <li class="menu-title">
                    <span>Calender</span>
                </li>
                <li class="">
                    <a href="#"><i class="fas fa-calendar-day"></i> <span>Calender</span></a>
                </li>
                @endif
                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Prodi' || Auth::user()->role == 'Teachers' || Auth::user()->role == 'Students' || Auth::user()->role == 'Treasurer' || Auth::user()->role == 'Member')
                <li class="menu-title">
                    <span>Contact</span>
                </li>
                <li class="">
                    <a href="#"><i class="fas fa-address-book"></i> <span>Contact</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>