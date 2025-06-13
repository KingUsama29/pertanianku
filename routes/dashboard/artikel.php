<?php
require_once "./core/session.php";

if (!is_logged_in()) {
  redirect("/login");
  exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM artikel");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Artikel</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Artikel</h6>
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
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex align-items-center">
              <h6 class="mb-0 me-auto">Data Artikel</h6>
              <a href="/dashboard/artikel/create" class="btn btn-sm btn-primary">Buat Artikel</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Konten</th>
                      <th>Thumbnail</th>
                      <th class="text-center">Dibuat oleh</th>
                      <th class="text-center">Ditambah pada</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($data as $value): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= htmlspecialchars($value["title"]) ?></td>
                      <td style="word-break: break-word;"><?= htmlspecialchars(substr($value["body"], 0, 60)) ?>...</td>
                      <td class="text-center">
                        <?= $value["thumbnail"] ? '<img width="80px" height="80px" src="data:image/png;base64,' . $value["thumbnail"] . '" alt="Gambar" />' : "Tidak ada foto" ?>
                      </td>
                      <td>Atmin</td>
                      <td class="text-center"><?= $value["created_at"] ?></td>
                      <td class="text-center">
                        <a href="/dashboard/artikel/edit?id=<?= $value["id"] ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <a href="/dashboard/artikel/delete?id=<?= $value["id"] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus komoditas ini?');">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Core JS Files -->
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
