<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../asset/speed_show.png">
  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
  <title>Speed Showroom</title>
</head>
<body class="container-fluid h-100 p-0">
  <header style="border-color: #0e8ed7 !important; z-index: 5" class="container-fluid bg-light d-none d-lg-flex justify-content-center py-3 border-top border-5 shadow-sm position-fixed">
    <section class="container-xxl d-flex flex-row justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <img style="width: 60px" class="img-fluid" src="../asset/speed_show.png" alt="book store logo">
        <a href="../index.html" class="h3 text-decoration-none ms-3 fw-bold">
          <span style="color: #f5a841;">Speed</span>
          <span style="color: #000;">Showroom</span>
        </a>
      </div>
      <form action="product.php" method="GET" class="col-12 d-flex flex-row align-items-center border border-1 border-secondary rounded-5 py-2 px-3 w-50">
        <i class="bi bi-search"></i>
        <input type="text" name="search" class="border-0 bg-transparent ms-2 w-100" placeholder="Search Motorcycle">
      </form>
      <a href="account.html">
        <img style="width: 45px; cursor: pointer" class="img-fluid rounded-5" src="../asset/developer.webp" alt="">
      </a>
    </section>
  </header>
  <header style="border-color: #0e8ed7 !important; z-index: 5" class="container-fluid d-block d-lg-none p-0 px-3 py-3 m-0 bg-light shadow-sm position-fixed border-top border-5">
    <div class="row flex-row justify-content-between align-items-center p-0 m-0">
      <div class="col-5 col-sm-3 col-md-2 d-flex flex-row align-items-center p-0">
        <img class="col-4 img-fluid" src="../asset/speed_show.png" alt="">
        <a href="../index.html" class="h3 text-decoration-none ms-2 m-0 fw-bold d-flex flex-row">
          <span style="color: #f5a841;">Speed</span>
          <span style="color: #000;">Showroom</span>
        </a>
      </div>
      <div class="col-auto d-flex justify-content-center p-0">
        <a href="account.html">
          <img style="width: 45px; cursor: pointer" class="img-fluid rounded-5" src="../asset/developer.webp" alt="">
        </a>
      </div>
    </div>
  </header>
  <main style="height: auto !important; padding-top: 100px !important" class="container-fluid p-0 m-0 d-flex align-items-center">
    <div class="container-lg p-0">
      <div class="row d-flex row mt-4 m-0 px-3 gap-3 gap-lg-5">
        <div class="d-flex d-lg-none flex-row justify-content-between align-items-center p-0">
          <form action="index.php" method="GET" class="col-10 d-flex flex-row align-items-center border border-1 border-secondary rounded-5 py-2 px-3">
            <i class="bi bi-search"></i>
            <input type="text" name="search" class="border-0 bg-transparent ms-2 w-100" placeholder="Search Motorcycle">
          </form>
          <i style="color: #0e8ed7" class="col-1 btn bi bi-cart-fill fs-1 p-0" data-bs-toggle="modal" data-bs-target="#cart"></i>
        </div>

        <div class="container mt-5">
          <h1 class="mb-4">Motorcycle Inventory</h1>
          <?php
          include 'koneksi.php';

          $search = isset($_GET['search']) ? $_GET['search'] : '';
          $search = $conn->real_escape_string($search);

          if ($search) {
            $sql = "SELECT id, name, brand, price, stock FROM motorcycles WHERE name LIKE '%$search%' OR brand LIKE '%$search%'";
          } else {
            $sql = "SELECT id, name, brand, price, stock FROM motorcycles";
          }

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>ID</th><th>Name</th><th>Brand</th><th>Price</th><th>Stock</th></tr></thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["id"]. "</td>";
              echo "<td>" . $row["name"]. "</td>";
              echo "<td>" . $row["brand"]. "</td>";
              echo "<td>" . $row["price"]. "</td>";
              echo "<td>" . $row["stock"]. "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
          } else {
            echo "No results found";
          }

          $conn->close();
          ?>
        </div>

      </div>
    </div>
  </main>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/popUp.js"></script>
  <script src="../js/likeProdukPage.js"></script>
  <script src="../js/humburger.js"></script>
</body>
</html>
