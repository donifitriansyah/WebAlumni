@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content-admin')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pertanyaan</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pertanyaan</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('pertanyaan.store')}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Isi Pertanyaan</label>
                        <input type="text" class="form-control" name="pertanyaan"
                            value="" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Pertanyaan</label>
                        <select name="jenis" class="form-control">
                            <option value="terbuka">Terbuka</option>
                            <option value="skala">Skala</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>

    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endsection
