<?php
require "functions.php";
require "proses.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIKOR - Calculator</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .matrix {
            position: relative;
        }

        .matrix:before,
        .matrix:after {
            content: "";
            position: absolute;
            top: 0;
            border: 1px solid #000;
            width: 6px;
            height: 100%;
        }

        .matrix:before {
            left: -6px;
            border-right: 0;
        }

        .matrix:after {
            right: -6px;
            border-left: 0;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-fluid px-3 px-sm-4 mt-4 mb-4" style="width: 20rem;" src="img/undraw_rocket.svg" alt="...">
                </div>
                <div class="sidebar-brand-text mx-3">VIKOR</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="input.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Calculator</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Step 1 : Menyusun Kriteria dan Alternatif ke dalam Bentuk Matriks</h4>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-1">
                            <div style="vertical-align: middle;">
                                <p align="Center">F =</p>
                            </div>
                        </div>
                        <div class="col-lg-11" style="max-height: 500px; overflow: auto;">
                            <table class="matrix">
                                <?php
                                foreach ($values as $index => $value) {
                                    echo "<tr>";
                                    foreach ($value as $i => $isi) {
                                        echo "<td>&nbsp;</td>";
                                        echo "<td>$isi</td>";
                                        echo "<td>&nbsp;</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Step 2 : Normalisasi Matriks</h4>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-1">
                            <div style="vertical-align: middle;">
                                <p align="Center">N =</p>
                            </div>
                        </div>
                        <div class="col-lg-11" style="max-height: 500px; overflow: auto;">
                            <table class="matrix">
                                <?php
                                foreach ($N as $index => $value) {
                                    echo "<tr>";
                                    foreach ($value as $i => $isi) {
                                        echo "<td>&nbsp;</td>";
                                        echo "<td>$isi</td>";
                                        echo "<td>&nbsp;</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Step 3 : Menentukan Nilai Terbobot dari Data Ternormalisasi untuk
                            Setiap Alternatif dan Kriteria</h4>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-1">
                            <div style="vertical-align: middle;">
                                <p align="Center">F* =</p>
                            </div>
                        </div>
                        <div class="col-lg-11" style="max-height: 500px; overflow: auto;">
                            <table class="matrix">
                                <?php
                                foreach ($Fstar as $index => $value) {
                                    echo "<tr>";
                                    foreach ($value as $i => $isi) {
                                        echo "<td>&nbsp;</td>";
                                        echo "<td>$isi</td>";
                                        echo "<td>&nbsp;</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Step 4 : Menghitung Nilai Utility Measure (S) dan Regret Measure (R)</h4>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-1 mb-4">
                            <div style="vertical-align: middle;">
                                <p align="Center">S =</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4" style="max-height: 500px; overflow: auto;">
                            <table class="matrix">
                                <?php
                                foreach ($S as $index => $value) {
                                    echo "<tr>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>$value</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-lg-1 mb-4">
                            <div style="vertical-align: middle;">
                                <p align="Center">R =</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4" style="max-height: 500px; overflow: auto;">
                            <table class="matrix">
                                <?php
                                foreach ($R as $index => $value) {
                                    echo "<tr>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>$value</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div style="vertical-align: middle;">
                                <p style="margin: 0 !important;">S- = <?= $Smin ?></p>
                                <p style="margin: 0 !important;">S+ = <?= $Splus ?></p>
                                <p style="margin: 0 !important;">R- = <?= $Rmin ?></p>
                                <p style="margin: 0 !important;">R+ = <?= $Rplus ?></p>
                                <p style="margin: 0 !important;">v &nbsp; = <?= $V ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Step 5 : Perankingan</h4>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ranking Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Alternatif</th>
                                            <th>Q</th>
                                            <th>RANK</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Alternatif</th>
                                            <th>Q</th>
                                            <th>RANK</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($rank as $index => $value) {
                                            echo "<tr>";
                                            foreach ($value as $i => $isi) {
                                                if ($i == 0)
                                                    echo '<td style="max-width: 250px;">', $value[$i], '</td>';
                                                else
                                                    echo "<td>$value[$i]</td>";
                                            }
                                            $temp = $index + 1;
                                            echo "<td>$temp</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Kelompok 8 || <b>Metode VIKOR</b> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>