@extends('layouts.alumni')
@section('title', 'Dashboard')

@section('content-alumni')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Alumni</h1>
            <a href="#" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <!-- Content Row -->
        <div class="row mb-4">
            @foreach ([
                ['title' => 'Earnings (Monthly)', 'value' => '$40,000', 'icon' => 'calendar', 'color' => 'primary'],
                ['title' => 'Earnings (Annual)', 'value' => '$215,000', 'icon' => 'dollar-sign', 'color' => 'success'],
                ['title' => 'Tasks Completed', 'value' => '50%', 'icon' => 'clipboard-list', 'color' => 'info', 'progress' => true],
                ['title' => 'Pending Requests', 'value' => '5', 'icon' => 'comments', 'color' => 'warning']
            ] as $card)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-{{ $card['color'] }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-{{ $card['color'] }} text-uppercase mb-1">{{ $card['title'] }}</div>
                                    @if (isset($card['progress']))
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $card['value'] }}</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $card['value'] }}" aria-valuenow="{{ rtrim($card['value'], '%') }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $card['value'] }}</div>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-{{ $card['icon'] }} fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Charts Row -->
        <div class="row mb-4">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2"><i class="fas fa-circle text-primary"></i> Direct</span>
                            <span class="mr-2"><i class="fas fa-circle text-success"></i> Social</span>
                            <span class="mr-2"><i class="fas fa-circle text-info"></i> Referral</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Current Projects</h6>
                    </div>
                    <div class="card-body">
                        @foreach ([
                            ['title' => 'Server Migration', 'progress' => '20%', 'bg' => 'danger'],
                            ['title' => 'Sales Tracking', 'progress' => '40%', 'bg' => 'warning'],
                            ['title' => 'Customer Database', 'progress' => '60%', 'bg' => 'info'],
                            ['title' => 'Payout Details', 'progress' => '80%', 'bg' => 'info'],
                            ['title' => 'Account Setup', 'progress' => 'Complete!', 'bg' => 'success']
                        ] as $project)
                            <h4 class="small font-weight-bold">{{ $project['title'] }} <span class="float-right">{{ $project['progress'] }}</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-{{ $project['bg'] }}" role="progressbar" style="width: {{ $project['progress'] == 'Complete!' ? '100%' : $project['progress'] }}" aria-valuenow="{{ rtrim($project['progress'], '%') }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="Illustration">
                        <p>Add some quality, SVG illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful SVG images that you can use completely free and without attribution!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
