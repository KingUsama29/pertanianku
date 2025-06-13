<?php
require_once "./core/session.php";

if (!is_logged_in()) {
    redirect("/login");
    exit;
}

$id = $_GET['id'] ?? null;
$success = $error = "";

if (!$id) {
    die("ID tidak ditemukan.");
}

// Ambil data lama
$stmt = mysqli_prepare($koneksi, "SELECT * FROM artikel WHERE id = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul = $_POST["judul"] ?? '';
    $konten = $_POST["konten"] ?? '';
    $fotoPath = $data["thumbnail"];

    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES["thumbnail"]["tmp_name"];
        $encodedImage = base64_encode(file_get_contents($tmpName));
        $fotoPath = $encodedImage;
    }

    if ($judul && $konten && !$error) {
        $stmt = mysqli_prepare($koneksi, "UPDATE artikel SET title = ?, body = ?, thumbnail = ?");
        mysqli_stmt_bind_param($stmt, "sss", $judul, $konten, $fotoPath);
        if (mysqli_stmt_execute($stmt)) {
            $success = "Data berhasil diperbarui.";
            // Update variabel agar form ikut diperbarui
            $data["title"] = $nama;
            $data["body"] = $caption;
            $data["thumbnail"] = $harga;
        } else {
            $error = "Gagal memperbarui data.";
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
    <title>Edit Komoditas</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link id="pagestyle" href="../../app/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>
<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <?php include_once APP . "/components/layout/dashboard/sidebar.php" ?>
    <main class="main-content position-relative border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Daftar Komoditas</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Komoditas</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Edit Komoditas</h6>
                </nav>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6 class="mb-0">Form Edit Artikel</h6>
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
                                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data["title"]) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Konten</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="konten"><?= htmlspecialchars($data["body"]) ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Foto (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                                    <?php if (!empty($data["thumbnail"])): ?>
                                        <img src="data:image/jpeg;base64,<?= $data["thumbnail"] ?>" alt="Preview" class="mt-2" width="150">
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    <script src="../../app/assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>
</html>
