@extends('main')

@section('title', 'Transaksi')

@section('konten')
<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="mt-4">Transaksi</h1>
        </div>
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i> Tambah</button>
            <!-- modal tambah -->
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Transaksi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-capitalize">
                            <form action="" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Beratnya</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">jumlah bayar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4 ">
        <div class="card-body">
            <table class="table-striped" id="datatablesSimple">
                <thead>
                    <tr class="text-capitalize ">
                        <th>No</th>
                        <th>tanggal</th>
                        <th>nama pelanggan</th>
                        <th>layanan</th>
                        <th>beratnya</th>
                        <th>harga satuan</th>
                        <th>jumlah bayar</th>
                        <th>keterangan</th>
                        <th>pembayaran</th>
                        <th>aksi</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>11-2-2024</td>
                        <td>Warsito</td>
                        <td>Cuci Saja</td>
                        <td>5 kg</td>
                        <td>3.000</td>
                        <td>15.000</td>
                        <td>Selesai</td>
                        <td>
                            Belum Bayar
                            <a type="button" class="btn btn-sm btn-success" href="/hal-cetak"><i class="fa-solid fa-money-bill"></i> Bayar</a>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 ">
                                <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalUbah"><i class="fas fa-edit"></i> Ubah</button>
                                <!-- modal Edit -->
                                <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Transaksi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-capitalize">
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Beratnya</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">jumlah bayar</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">keterangan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">pembayaran</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-sm btn-danger me-1" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="fas fa-trash"></i> Hapus</button>
                                <!-- modal hapus -->
                                <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="" method="POST">
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
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <!-- <a class="btn btn-sm btn-success" href="/hal-cetak"  ><i class="fas fa-print"></i> Cetak</a> -->

                            </div>
                        </td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection