@extends('layouts.admin')

@section('title', 'Daftar Pertanyaan')

@section('content-admin')



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kuisioner Alumni</h6>
        </div>
        <div class="card-body">
            {{-- <canvas id="myChart"></canvas> --}}
            <div>
                @for ($i = 1; $i <= count($datas); $i ++)
                    Yang sudah mengisi Pertanyaan {{$i}} : {{$datas[$i]}} <br>
                @endfor
            </div>
            <div class="table-responsive">
                {{-- <a href="{{route('pertanyaan.create')}}" class="mb-4 btn btn-primary">Data Kuisioner Alumni</a> --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alumni</th>
                            <th>Jawaban Terbuka</th>
                            <th>Jawaban Skala</th>
                            <th>Aksi</th>
                            {{-- <th>Pertanyaan</th>
                            <th>Jenis</th>
                            <th>Jawaban Terbuka</th>
                            <th>Jawaban Skala</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->alumni->username }}</td>
                                <td>{{ $item->jawaban_terbuka }}</td>
                                <td>{{ $item->jawaban_skala }}</td>
                                {{-- <td class="d-flex" style="gap: 4px">
                                    <form action="{{ route('pertanyaan.delete', $item->id_pertanyaan) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    const data = {
    labels: [
        'Red',
        'Blue',
        'Yellow'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
    };
</script>
@endsection
