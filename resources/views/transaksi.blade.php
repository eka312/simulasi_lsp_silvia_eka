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
                        <form action="{{route('tambah_transaksi')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Transaksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-capitalize">

                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input name="waktu_transaksi" type="date" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-10">
                                        <input name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">No Telpon</label>
                                    <div class="col-sm-10">
                                        <input name="no_telp" placeholder="Masukkan Nomer Telepon Pelanggan" type="text" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                    <div class="col-sm-10">
                                        <select name="id_layanan" class="form-select" aria-label="Default select example">
                                            <option value="">-- Pilih Layanan --</option>
                                            @foreach ($layanan as $l)
                                            <option value="{{$l->id_layanan}}">{{$l->nama_layanan}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">Beratnya</label>
                                    <div class="col-sm-10">
                                        <input name="berat" placeholder="Masukan Berat Barang" type="number" class="form-control" id="text">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">keterangan</label>
                                    <div class="col-sm-10">
                                        <select name="keterangan" class="form-select" aria-label="Default select example">
                                            <option value="">-- Pilih keterangan --</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="text" class="col-sm-2 col-form-label">pembayaran</label>
                                    <div class="col-sm-10">
                                        <select name="pembayaran" class="form-select" aria-label="Default select example">
                                            <option value="">-- Pilih Pembayaran --</option>
                                            <option value="Lunas">Lunas</option>
                                            <option value="Belum Bayar">Belum Bayar</option>
                                        </select>
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
                    @foreach ($transaksi as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{carbon\Carbon::parse($t->waktu_transaksi)->format('d-m-Y')}}</td>
                        <td>{{$t->nama_pelanggan}}</td>
                        <td>{{$t->layanan->nama_layanan}}</td>
                        <td>{{$t->berat}} kg</td>
                        <td>Rp {{number_format($t->layanan->harga_per_kg, 0, ',', '.')}}</td>
                        <td>Rp {{number_format($t->berat * $t->layanan->harga_per_kg, 0, ',', '.')}}</td>
                        <td>{{$t->keterangan}}</td>
                        <td>
                            @if ($t->pembayaran == 'Lunas' )
                            {{$t->pembayaran}}
                            @else
                            {{$t->pembayaran}}
                            <button onclick="bayar('{{ $t->id_transaksi }}')" type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-money-bill"></i> Bayar</button>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 ">
                                @if ($t->pembayaran == 'Lunas' && $t->keterangan == 'Selesai')
                                <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalUbah{{$t->id_transaksi}}"><i class="fas fa-edit"></i> Ubah</button>
                                <!-- modal Edit -->
                                <div class="modal fade" id="modalUbah{{$t->id_transaksi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="{{route('ubah_transaksi',$t->id_transaksi)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Transaksi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body text-capitalize">

                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->waktu_transaksi}}" name="waktu_transaksi" type="date" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->nama_pelanggan}}" name="nama_pelanggan" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">No Telpon</label>
                                                        <div class="col-sm-10">
                                                            <input name="no_telp" value="{{$t->no_telp}}" placeholder="Masukkan Nomer Telepon Pelanggan" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                                        <div class="col-sm-10">
                                                            <select name="id_layanan" class="form-select" aria-label="Default select example">

                                                                @foreach ($layanan as $l)
                                                                <option value="{{$l->id_layanan}}" {{ $l->id_layanan == old('id_layanan', $t->id_layanan) ? 'selected' : '' }}>
                                                                    {{$l->nama_layanan}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Beratnya</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->berat}}" name="berat" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">keterangan</label>
                                                        <div class="col-sm-10">
                                                            <select name="keterangan" value="{{$t->keterangan}}" class="form-select" aria-label="Default select example">

                                                                <option value="Proses" {{old('keterangan', $t->keterangan ) == 'Proses' ? 'selected' : ''}}>Proses</option>
                                                                <option value="Selesai" {{ old('keterangan', $t->keterangan) == 'Selesai' ? 'selected' : ''}}>Selesai</option>
                                                            </select>
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


                                <button type="button" class="btn btn-sm btn-danger me-1" onclick="hapus()"><i class="fas fa-trash"></i> Hapus</button>

                                <a type="button" class="btn btn-sm btn-success me-1" href="/hal-cetak/{{$t->id_transaksi}}" ><i class="fa-solid fa-print"></i> Cetak</a>
                                
                                @else
                                
                                <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalUbah{{$t->id_transaksi}}"><i class="fas fa-edit"></i> Ubah</button>
                                <!-- modal Edit -->
                                <div class="modal fade" id="modalUbah{{$t->id_transaksi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <form action="{{route('ubah_transaksi',$t->id_transaksi)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Transaksi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body text-capitalize">

                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->waktu_transaksi}}" name="waktu_transaksi" type="date" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->nama_pelanggan}}" name="nama_pelanggan" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">No Telpon</label>
                                                        <div class="col-sm-10">
                                                            <input name="no_telp" value="{{$t->no_telp}}" placeholder="Masukkan Nomer Telepon Pelanggan" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Layanan</label>
                                                        <div class="col-sm-10">
                                                            <select name="id_layanan" class="form-select" aria-label="Default select example">

                                                                @foreach ($layanan as $l)
                                                                <option value="{{$l->id_layanan}}" {{ $l->id_layanan == old('id_layanan', $t->id_layanan) ? 'selected' : '' }}>
                                                                    {{$l->nama_layanan}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">Beratnya</label>
                                                        <div class="col-sm-10">
                                                            <input value="{{$t->berat}}" name="berat" type="text" class="form-control" id="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="text" class="col-sm-2 col-form-label">keterangan</label>
                                                        <div class="col-sm-10">
                                                            <select name="keterangan" value="{{$t->keterangan}}" class="form-select" aria-label="Default select example">

                                                                <option value="Proses" {{old('keterangan', $t->keterangan ) == 'Proses' ? 'selected' : ''}}>Proses</option>
                                                                <option value="Selesai" {{ old('keterangan', $t->keterangan) == 'Selesai' ? 'selected' : ''}}>Selesai</option>
                                                            </select>
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

                                <button type="button" class="btn btn-sm btn-danger me-1" onclick="hapus()"><i class="fas fa-trash"></i> Hapus</button>
                                @endif



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