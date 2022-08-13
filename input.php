<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIKOR - Calculator</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        td {
            border: 1px solid black;
        }

        /* try removing the "hack" below to see how the table overflows the .body */
        .hack1 {
            display: table;
            table-layout: fixed;
            width: 100%;
        }

        .hack2 {
            display: table-cell;
            overflow-x: auto;
            width: 100%;
        }

        select {
            width: 100%;
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
                        <h4 class="h4 mb-0 text-gray-800">Input File :</h4>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-3">
                            <input class="form-control" type="file" id="input" accept=".xls,.xlsx">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="button">Convert</button>
                        </div>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-800">Input File Manual : </h4>
                    </div>
                    <div class="conatiner">
                        <div class="row">
                            <div class="col">
                                <form role="form" id="form1">
                                    <div class="hack1">
                                        <div class="hack2">
                                            <table class="table1" id="table1">
                                                <tr id="row-1">
                                                    <td><input type="text" id="sys-1-1" name="sys-1-1" value="Kriteria" disabled></td>
                                                    <td><input type="text" id="sys-1-2" name="sys-1-2" value="C1" disabled></td>
                                                    <td><input type="text" id="sys-1-3" name="sys-1-3" value="C2" disabled></td>
                                                </tr>
                                                <tr id="row-2">
                                                    <td><input type="text" id="sys-2-1" name="sys-2-1" value="Tipe Kriteria" disabled></td>
                                                    <td>
                                                        <select name="sys-2-2" id="sys-2-2">
                                                            <option value="Benefit">Benefit</option>
                                                            <option value="Cost">Cost</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="sys-2-3" id="sys-2-3">
                                                            <option value="Benefit">Benefit</option>
                                                            <option value="Cost">Cost</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr id="row-3">
                                                    <td><input type="text" id="sys-3-1" name="sys-3-1" value="Nilai Bobot" disabled></td>
                                                    <td><input type="text" id="sys-3-2" name="sys-3-2"></td>
                                                    <td><input type="text" id="sys-3-3" name="sys-3-3"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="hack1">
                                        <div class="hack2">
                                            <table class="table1" id="table2">
                                                <tr id="row-1">
                                                    <td><input type="text" id="input-1-1" name="input-1-1" value="Alternatif" disabled></td>
                                                    <td><input type="text" id="input-1-2" name="input-1-2" value="C1"></td>
                                                    <td><input type="text" id="input-1-3" name="input-1-3" value="C2"></td>
                                                </tr>
                                                <tr id="row-3">
                                                    <td><input type="text" id="input-2-1" name="input-2-1" value="A1"></td>
                                                    <td><input type="text" id="input-2-2" name="input-2-2"></td>
                                                    <td><input type="text" id="input-2-3" name="input-2-3"></td>
                                                </tr>
                                                <tr id="row-3">
                                                    <td><input type="text" id="input-3-1" name="input-3-1" value="A2"></td>
                                                    <td><input type="text" id="input-3-2" name="input-3-2"></td>
                                                    <td><input type="text" id="input-3-3" name="input-3-3"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-primary" id="tambah-baris" onclick="addBaris()">Tambah Baris</button>
                                    <button class="btn btn-primary" id="tambah-kolom" onclick="addKolom()">Tambah Kolom</button>
                                    <button class="btn btn-primary" id="kurang-baris" onclick="delBaris()">Kurang Baris</button>
                                    <button class="btn btn-primary" id="kurang-kolom" onclick="delKolom()">Kurang Kolom</button>
                                    <button class="btn btn-primary" id="submit" onclick="calculate()">Submit</button>
                                </div>
                                <span id="resultField"></span>
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

    <script type="text/javascript" src="js/table.js"></script>
    <script type="text/javascript" src="js/calculate.js"></script>

</body>

</html>