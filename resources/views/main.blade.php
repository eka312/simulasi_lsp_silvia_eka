<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-uppercase" href="/">Eka Laundry</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <h5 class="text-white text-uppercase">Aplikasi laundry sederhana</h5>


    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Beranda
                        </a>

                        <a class="nav-link" href="/layanan">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Layanan
                        </a>

                        <a class="nav-link" href="/transaksi">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Transaksi
                        </a>

                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('konten')

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small text-uppercase">
                        <div class="text-muted">lsp pemrograman web</div>
                        <div class="text-muted">
                            silvia eka
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- sweet alert tambah -->
    @if(session('store'))
    <script>
        Swal.fire({
            title: "Transaksi berhasil ditambahkan.",
            icon: "success",
            draggable: true
        });
    </script>
    @endif

    @if(session('update'))
    <!-- sweet alert edit -->
    <script>
        Swal.fire({
            title: "Transaksi berhasil diperbarui..",
            icon: "success",
            draggable: true
        });
    </script>
    @endif



    <!-- sweet alert hapus -->
    <script>
        function hapus() {
            Swal.fire({
                title: "Apa anda yakin ingin menghapus transaksi ini?",
                text: "Anda tidak akan bisa membatalkan aksi ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA, Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Transaksi berhasil dihapus.",
                        icon: "success"
                    });
                }
            });
        }
    </script>

    <!-- sweet alert Bayar -->
    <script>
        // function bayar() {
        //     Swal.fire({
        //         title: "Koonfirmasi Pembayaran",
        //         text: "Apakah anda yakin sudah menerima pembayaran dari pelanggan?",
        //         icon: "question",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "YA, Sudah",
        //         cancelButtonText: "Batal"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire({
        //                 title: "success!",
        //                 text: "Transaksi berhasil dibayar.",
        //                 icon: "success"
        //             });
        //         }
        //     });
        // }

        function bayar(id) {
            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                text: "Apakah anda yakin sudah menerima pembayaran dari pelanggan?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA, Sudah',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Success!',
                        'Transaksi berhasil dibayar.',
                        'success'
                    ).then(() => {
                        // Redirect to the payment processing URL
                        window.location.href = '/transaksi_bayar/' + id;
                    });
                }
            });
        }
    </script>


</body>

</html>