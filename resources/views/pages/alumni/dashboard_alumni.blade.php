@extends('layouts.alumni')
@section('title')
Dashboard
@endsection
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
                ['title' => 'Lamaran di Input', 'value' => '9', 'icon' => 'clipboard-list', 'color' => 'primary'],
                ['title' => 'Lamaran Ditolak', 'value' => '3', 'icon' => 'times-circle', 'color' => 'success'],
                ['title' => 'Lamaran Diterima', 'value' => '4', 'icon' => 'check-circle', 'color' => 'info', 'progress' ],
                ['title' => 'Lamaran Menunggu', 'value' => '2', 'icon' => 'comments', 'color' => 'warning']
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

        <!-- No Charts Row or Projects Row -->

    </div>
@endsection
