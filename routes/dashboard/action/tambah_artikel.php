<?php
require_once "./core/session.php";

if (!is_logged_in()) {
    redirect("/login");
    exit;
}

$success = $error = "";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul = $_POST["judul"] ?? '';
    $konten = $_POST["konten"] ?? '';

    $thumbnail = "";

    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES["thumbnail"]["tmp_name"];
        $imageData = file_get_contents($tmpName);

        if ($imageData !== false) {
            $encodedImage = base64_encode($imageData);
            $thumbnail = $encodedImage;
        } else {
            $error = "Gagal membaca file gambar.";
        }
    }


    if ($judul && $konten && !$error) {
        $stmt = mysqli_prepare($koneksi, "INSERT INTO artikel (id, title, body, thumbnail, user_id) VALUES (?, ?, ?, ?, ?)");
        $userId = $_SESSION["id"];
        $artikel_id = generateRandomString(10);
        mysqli_stmt_bind_param($stmt, "ssssi", $artikel_id, $judul, $konten, $thumbnail, $userId);
        if (mysqli_stmt_execute($stmt)) {
            $success = "Data berhasil ditambahkan.";
        } else {
            $error = "Gagal menambahkan data ke database.";
        }
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Artikel</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Artikel</li>
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
                            <h6 class="mb-0">Form Tambah Artikel</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($success): ?>
                                <div class="alert alert-success"><?= $success ?></div>
                            <?php elseif ($error): ?>
                                <div class="alert alert-danger"><?= $error ?></div>
                            <?php endif; ?>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label>Judul Artikel</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Thumbnail (Upload Gambar)</label>
                                    <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Konten</label>
                                        <textarea class="form-control" name="konten"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/dashboard/artikel" class="btn btn-secondary">Kembali</a>
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