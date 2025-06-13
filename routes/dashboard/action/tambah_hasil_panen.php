<?php
require_once "./core/session.php";

if (!is_logged_in()) {
    redirect("/login");
    exit;
}

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama_komoditas"] ?? '';
    $caption = $_POST["caption"] ?? '';
    $harga = $_POST["harga"] ?? '';

    $fotoPath = "";

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES["foto"]["tmp_name"];
        $encodedImage = base64_encode(file_get_contents($tmpName));
        $fotoPath = $encodedImage;
    }

    if ($nama && $caption && $harga && !$error) {
        $stmt = mysqli_prepare($koneksi, "INSERT INTO komoditas (title, caption, harga, foto) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssis", $nama, $caption, $harga, $fotoPath);
        if (mysqli_stmt_execute($stmt)) {
            $success = "Data berhasil ditambahkan.";
        } else {
            $error = "Gagal menambahkan data ke database.";
        }
    } elseif (!$error) {
        $error = "Semua field wajib diisi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Informasi Pertanian</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link id="pagestyle" href="../../app/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <?php include_once APP . "/components/layout/dashboard/sidebar.php" ?>
    <main class="main-content position-relative border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Daftar Komoditas</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Komoditas</li>
                    </ol>
                    <!-- <h6 class="font-weight-bolder text-white mb-0">Tambah Komoditas</h6> -->
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6 class="mb-0">Form Tambah Komoditas</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($success): ?>
                                <div class="alert alert-success"><?= $success ?></div>
                            <?php elseif ($error): ?>
                                <div class="alert alert-danger"><?= $error ?></div>
                            <?php endif; ?>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label>Nama Komoditas</label>
                                    <input type="text" name="nama_komoditas" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Caption</label>
                                    <input type="text" name="caption" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Harga</label>
                                    <input type="text" inputmode="numeric" name="harga" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Foto (Upload Gambar)</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/dashboard/hasil_panen" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../app/assets/js/core/popper.min.js"></script>
    <script src="../../app/assets/js/core/bootstrap.min.js"></script>
    <script src="../../app/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../app/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        if (navigator.platform.indexOf('Win') > -1 && document.querySelector('#sidenav-scrollbar')) {
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../../app/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>

Ubah kodenya menjadi edit data