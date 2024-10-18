@extends('layouts.admin')

@section('title', 'Daftar Pertanyaan')

@section('content-admin')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pertanyaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('pertanyaan.create')}}" class="mb-4 btn btn-primary">Tambah Pertanyaan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id_pertanyaan }}</td>
                                <td>{{ $item->pertanyaan }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td class="d-flex" style="gap: 4px">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $item->id_pertanyaan }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('pertanyaan.delete', $item->id_pertanyaan) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>

                                    <!-- Modal untuk mengedit pertanyaan -->
                                    <div class="modal fade" id="editModal{{ $item->id_pertanyaan }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Pertanyaan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('pertanyaan.update', $item->id_pertanyaan) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="pertanyaan">Pertanyaan</label>
                                                            <input type="text" class="form-control" name="pertanyaan" value="{{ $item->pertanyaan }}" required>
                                                            <label for="jenis">Jenis</label>
                                                            <select name="jenis" class="form-control">
                                                                <option value="terbuka" {{ $item->jenis == 'terbuka' ? 'selected' : '' }} >Terbuka</option>
                                                                <option value="skala" {{ $item->jenis == 'skala' ? 'selected' : '' }}>Skala</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
