@extends('main')

@section('title', 'Beranda')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Beranda</h1>

    <div class="row ">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white  mb-4">
                <h4 class="card-body text-capitalize">jumlah layanan</h4>
                <h2 class="card-body "><b>5</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <h4 class="card-body text-capitalize">transaksi baru</h4>
                <h2 class="card-body "><b>3</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <h4 class="card-body text-capitalize">sedang diproses</h4>
                <h2 class="card-body "><b>2</b></h2>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <h4 class="card-body text-capitalize">belum dibayar</h4>
                <h2 class="card-body "><b>1</b></h2>

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
                    <tr>
                        <td>1</td>
                        <td>warsini</td>
                        <td>Cuci Setrika</td>
                        <td>10 kg</td>
                        <td>12 Feb 2024</td>
                        <td>Belum Bayar</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Warsito</td>
                        <td>Cuci Saja</td>
                        <td>5 kg</td>
                        <td>11 Feb 2024</td>
                        <td>Lunas</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection