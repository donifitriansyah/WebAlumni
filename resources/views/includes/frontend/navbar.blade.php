<div class="navbar">
    <div class="left-nav">
        <div class="logo">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo Website" />
        </div>
        <div class="nav-links-left">
            <a href="index.html"> <i class="fas fa-home"> Home</i></a>
            <!-- <a href="job.html">
      <i class="fas fa-briefcase"> Job</i></a> -->
            <a href="#bagian-about">
                <i class="fas fa-circle-info"> About</i></a>
            <!-- <a href="pages/alumni.html">
      <i class="fas fa-circle-user"> Alumni</i></a> -->
        </div>
    </div>


    <div class="right-nav">
        <a href="{{ route('login') }}">
            <i class="fas fa-user"> Login</i></a>
        <a href="#bagian-contact">
            <i class="fas fa-circle-user"> Contact</i></a>
    </div>
</div>
