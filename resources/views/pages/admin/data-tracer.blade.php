@extends('layouts.admin')

@section('title', 'Daftar Pertanyaan')

@section('content-admin')



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kuisioner Alumni</h6>
        </div>
        <div class="card-body d-flex justify-content-between">
            <div class="d-flex" style="gap: 10px">
                @if ($count_sudah_isi != 0)
                <div class="bg-primary rounded p-2 rounded-4">
                    <div class="text-white text-center" style="font-size: 30px">{{$count_sudah_isi}}</div>
                    <div class="text-white">Sudah Mengisi</div>
                    <div class="text-center">
                        <a href="{{ route('tracer.data-by-status' , 'sudah') }}" class="text-decoration-none text-white">Lihat</a>
                    </div>
                </div>
                @endif
                @if ($count_belum_isi != 0)
                    <div class="bg-danger rounded p-2 rounded-4">
                        <div class="text-white text-center" style="font-size: 30px">{{$count_belum_isi}}</div>
                        <div class="text-white">Belum Mengisi</div>
                        <div class="text-center">
                            <a href="{{ route('tracer.data-by-status' , 'belum') }}" class="text-decoration-none text-white">Lihat</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="">
                <input type="text" id="search-input" class="form-control" placeholder="Cari berdasarkan nama">
            </div>
        </div>
        <div class="card-body">
            {{-- <canvas id="myChart"></canvas> --}}
            <div class="table-responsive">
                {{-- <a href="{{route('pertanyaan.create')}}" class="mb-4 btn btn-primary">Data Kuisioner Alumni</a> --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alumni</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id_alumni }}</td>
                                <td>{{ $item->nama_alumni }}</td>
                                <td class="<?= $item->status == 'Sudah Mengisi' ? 'text-success' : 'text-danger' ?>">{{ $item->status }}</td>
                                <td>
                                    @if ($item->status == 'Sudah Mengisi')
                                        <a href="{{ route('tracer.data' , $item->id_user )}}" class="btn btn-primary">Lihat</a>
                                    @else
                                        <button href="#" class="btn btn-primary" disabled>Lihat</button>
                                    @endif
                                </td>
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
<script>
    const searchInput = document.getElementById('search-input');
    const tableRows = document.querySelectorAll('#dataTable tbody tr');

    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.toLowerCase();
        tableRows.forEach((row) => {
            const nameCell = row.cells[1].textContent.toLowerCase();
            if (nameCell.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
