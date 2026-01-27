@extends('main')

@section('title', 'Layanan')

@section('konten')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="mt-4">Layanan</h1>
        </div>
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i> Tambah</button>
            <!-- modal tambah -->
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Layanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('tambah_layanan')}}" method="post">
                            @csrf
                            <div class="modal-body">



                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                    <div class="col-sm-10">
                                        <input name="nama_layanan" type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Harga Per KG</label>
                                    <div class="col-sm-10">
                                        <input name="harga_per_kg" type="text" class="form-control" id="text">
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card mb-4 ">
        <div class="card-body">
            <table class="table-striped  " id="datatablesSimple">
                <thead>
                    <tr class="text-capitalize">
                        <th>No</th>
                        <th>layanan</th>
                        <th>harga per KG</th>
                        <th>aksi</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($layanan as $l )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$l->nama_layanan}}</td>
                        <td>Rp {{number_format($l->harga_per_kg, 0, ',', '.')}}</td>
                        <td>
                            <div class=" gap-1 ">
                                <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalUbah{{ $l->id_layanan }}"><i class="fas fa-edit"></i> Ubah</button>
                                <!-- modal Edit -->
                                <div class="modal fade" id="modalUbah{{ $l->id_layanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="{{route('ubah_layanan',$l->id_layanan)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Layanan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                                            <div class="col-sm-10">
                                                                <input name="nama_layanan" value="{{$l->nama_layanan}}" type="text" class="form-control" id="text">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="text" class="col-sm-2 col-form-label">Harga Per KG</label>
                                                            <div class="col-sm-10">
                                                                <input name="harga_per_kg" value="{{$l->harga_per_kg}}" type="text" class="form-control" id="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>


                                <button type="button" class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $l->id_layanan }}"><i class="fas fa-trash"></i> Hapus</button>
                                <!-- modal hapus -->
                                <div class="modal fade" id="modalHapus{{ $l->id_layanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{route('hapus_layanan',$l->id_layanan)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submmit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>

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




@endsection