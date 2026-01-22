<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Struk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #struk,
            #struk * {
                visibility: visible;
            }


        }

        .wrapper {
            text-align: center;
        }

        hr {
            border: solid 1px #000;
        }
    </style>
</head>

<body>
    

    <div id="struk" class="pt-5">
        <h5 class="wrapper pt-5">
            Eka Laundry
        </h5>
        <hr>
        <p class="wrapper">Bukti Transaksi</p>
        <hr>
        <div class="row ">
            <div class="col-6 ">
                Nama Pelanggan
            </div>
            <div class="col-6 text-start ">
                : John Doe
            </div>

        </div>
        <div class="row">
            <div class="col-6 ">
                Waktu Transaksi 
            </div>
            <div class="col-6 text-start ">
                : 22-02-2026
            </div>
        </div>
        <div class="row">
            <div class="col-6 ">
                Nomor Telepon 
            </div>
            <div class="col-6 text-start ">
                : 08976563223
            </div>
        </div>
        <hr>
        <div class="row ">
            <div class="col-6 ">
                Berat
            </div>
            <div class="col-6 text-start ">
                : 3 kg
            </div>

        </div>
        <div class="row">
            <div class="col-6 ">
                Harga / kg
            </div>
            <div class="col-6 text-start ">
                : 5000
            </div>
        </div>
        <div class="row">
            <div class="col-6 ">
                Layanan
            </div>
            <div class="col-6 text-start ">
                : Cuci Kering
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 ">
                Total
            </div>
            <div class="col-6 text-start ">
                : 15.000
            </div>
        </div>
        <hr>
        <h6 class="wrapper">LSP-2026 - Silvia Eka</h6>
        



    </div>



    <div class="d-flex justify-content-between  mb-3">
        <div class="mt-4 text-center">
            <a href="/transaksi" type="button" class="btn btn-sm btn-primary me-1"> Kembali</a>
        </div>
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-sm btn-success me-1" onclick="window.print()">Cetak</button>
        </div>
    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>