<?php
session_start();
if (empty($_SESSION['kode_user'])) {
    header('Location: login.php');
    exit;
}
require_once ('config.php');


?>
<!DOCTYPE html>
<html lang="en">

<?php include 'layouts/head.php' ?>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">


        <!-- Topbar Start -->
        <?= include 'layouts/topbar.php' ?>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <?= include 'layouts/sidebar.php' ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <?php include 'route.php' ?>
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy;
                            <script>document.write(new Date().getFullYear())</script> - Sistem Komputerisasi Akuntansi
                            Pengelolaan Kas Besar Pada PDAM Tirto Panguripan Kendal Cabang Kaliwungu I
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
            <!-- modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judul-modal"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" id="isi-modal">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?= include 'layouts/script.php' ?>

</body>

</html>