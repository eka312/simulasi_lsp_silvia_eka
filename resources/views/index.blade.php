@extends('main')

@section('title', 'Beranda')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Beranda</h1>

    <div class="row ">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white  mb-4">
                <h4 class="card-body text-capitalize">jumlah layanan</h4>
                <h2 class="card-body "><b>{{$jumlahLayanan}}</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <h4 class="card-body text-capitalize">transaksi baru</h4>
                <h2 class="card-body "><b>{{$transaksiBaru}}</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <h4 class="card-body text-capitalize">sedang diproses</h4>
                <h2 class="card-body "><b>{{$sedangDiproses}}</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <h4 class="card-body text-capitalize">belum dibayar</h4>
                <h2 class="card-body "><b>{{$belumBayar}}</b></h2>

            </div>
        </div>

    </div>



    <h3 class="mt-4">Transaksi Terbaru</h3>
    <div class="card mb-4">
        
        <div class="card-body">
            <table class="table-striped" id="datatablesSimple">
                <thead>
                    <tr class="text-capitalize">
                        <th>No</th>
                        <th>Nama pelanggan</th>
                        <th>layanan</th>
                        <th>berat</th>
                        <th>tanggal transaksi</th>
                        <th>pembayaran</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($transaksiTerbaru as $t )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$t->nama_pelanggan}}</td>
                        <td>{{$t->layanan->nama_layanan}}</td>
                        <td>{{$t->berat}} kg</td>
                        <td>{{carbon\carbon::parse($t->waktu_transaksi)->format('d-m-y')}}</td>
                        <td>{{$t->pembayaran}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection