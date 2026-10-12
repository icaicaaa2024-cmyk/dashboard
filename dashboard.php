<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
      <button class="navbar-toggler d-md-none me-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <span class="navbar-brand mb-0 h1">Icunkmard</span>
    </div>
 </nav>

<div class="container-fluid" style="margin-top: 56px;">
    <div class="row">

     <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-none d-md-block bg-dark sidebar text-white min-vh-100 p-3">
        <div class="position-sticky">
         <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
             <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">Dashboard</a>
        </li>
            <li><a href="orders.php" class="nav-link text-white">Orders</a></li>
            <li><a href="produk.php" class="nav-link text-white">Products</a></li>
            <li><a href="costumers.php" class="nav-link text-white">Customers</a></li>
            <li><a href="reposts.php" class="nav-link text-white">Reports</a></li>
            <li><a href="integrations.php" class="nav-link text-white">Integrations</a></li>
        </ul>
        <hr>
        <div>
            <a href="#" class="text-white text-decoration-none">Sign out</a>
        </div>
        </div>
        </nav>

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <h2 class="mb-4">Dashboard</h2>
    <div class="card shadow-sm">
      <div class="card-header bg-white">
        <h5 class="mb-0">Data Produk</h5>
     </div>
    <div class="card-body">
      <a href="" class="btn btn-primary btn-sm mb-3">Add Product</a>
        <div class="table-responsive">
          <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
             <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
             </tr>
            </thead>
         <tbody>
        <?php 
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM produk");

        $no = 1;
        if($query && mysqli_num_rows($query) > 0) {
         while($row = mysqli_fetch_assoc($query)) { 

         ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
            <td><?php echo "Rp " . number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?php echo htmlspecialchars($row['stok']); ?></td>
            <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-primary text-decoration-none">Edit</a> | 
            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="text-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
            </tr>

            <?php 
            } 
            } else {
            ?>
            <tr>
             <td colspan="5" class="text-center">Belum ada data produk atau tabel belum dibuat.</td>
            </tr>
            <?php } ?>
            </tbody>
           </table>
           </div>
          </div>
      </div>
   </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>