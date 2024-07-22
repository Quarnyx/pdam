<div class="topbar-custom">
    <div class="container-xxl">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link ps-0">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>

            </ul>

            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                <li class="d-none d-sm-flex">
                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                    </button>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <?php
                        $sql = "SELECT * FROM user WHERE kode_user = '$_SESSION[kode_user]'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar']); ?>" alt="user-image"
                            class="rounded-circle">
                        <span class="pro-user-name ms-1"><?php echo $_SESSION['nama_user']; ?> <i
                                class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Selamat Datang !</h6>
                        </div>

                        <!-- item-->
                        <button onclick="changePassword()" class="dropdown-item notify-item">
                            <i class="mdi mdi-key fs-16 align-middle me-1"></i>
                            <span>Ganti Password</span>
                        </button>
                        <script>
                            function changePassword() {
                                var id = <?php echo $_SESSION['kode_user']; ?>;
                                alertify.prompt('Ganti Password ' + name, 'Masukkan Password Baru', '', function (evt, value) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'proses.php?act=ganti-password',
                                        data: 'id=' + id + '&password=' + value,
                                        success: function (data) {
                                            alertify.success('Password Berhasil Diubah');
                                        },
                                        error: function (data) {
                                            alertify.error(data);
                                        }
                                    })
                                }, function () {
                                    alertify.error('Ganti password dibatalkan');
                                })
                            }
                        </script>
                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>