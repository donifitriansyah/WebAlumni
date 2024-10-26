<div class="navbar">
    <div class="left-nav">
        <div class="logo">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo Website" />
        </div>
        <div class="nav-links-left">
            <a href="{{ route('home') }}"> <i class="fas fa-home"> Home</i></a>
            <!-- <a href="job.html">
      <i class="fas fa-briefcase"> Job</i></a> -->
      <a href="{{ route('loker') }}">
        <i class="fas fa-briefcase"> Lowongan Kerja</i></a>
    <a href="{{ route('alumni') }}">
        <i class="fas fa-briefcase"> Alumni</i></a>
            <!-- <a href="pages/alumni.html">
      <i class="fas fa-circle-user"> Alumni</i></a> -->
        </div>
    </div>


    <div class="right-nav">
        @if (Auth::check())
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-user"> Dashboard</i>
            </a>
        @else
            <a href="{{ route('login') }}">
                <i class="fas fa-user"> Login</i>
            </a>
        @endif

        <a href="#bagian-contact">
            <i class="fas fa-circle-user"> Contact</i></a>
    </div>
</div>
