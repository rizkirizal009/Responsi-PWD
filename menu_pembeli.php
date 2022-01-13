<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>

<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="in.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Alajinu Coffee</title>
  </head>
  <body style="background-color: #131313;">
  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-bold" style="font-family: 'Montserrat', sans-serif;">ALAJINU COFFEE</span></h1>
          
          <p class="lead font-weight-bold" style="font-family: 'Poppins', sans-serif; font-size: 18px;">19.00 - 23.00</p>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container">
        <a class="navbar-brand text-white" href="user.php"><strong style="color: #B29600; font-family: 'Kaushan Script', cursive;">Alajinu Coffee</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" style="font-family: poppins;" href="user.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" style="font-family: poppins;" href="menu_pembeli.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" style="font-family: poppins;" href="pesanan_pembeli.php">Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" style="font-family: poppins;" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
      <div class="container">
        <form method="get" action="">
          
          <label for="cari" style="font-family: poppins; color: #B29600; margin-left: 800px;">Cari Menu</label>
          <input type="text" name="cari">

        </form>

        <div class="row mt-3">

          <?php 

          include('koneksi.php');

          $query = mysqli_query($koneksi, 'SELECT * FROM produk');

          //kondisi untuk pencarian menu berdasarkan nama menu
          if (isset($_GET['cari'])) {
              $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_menu LIKE '%".$_GET['cari']."%'");
          }

          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark border-light">
              <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
               <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>" class="btn btn-dark btn-sm btn-block">BELI</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
         </div> 
      </div>
  <!-- Akhir Menu -->

  <!-- Awal Footer -->
      <div class="footer">
      <div class="container">
        <div class="row footer-body">

          <div class="col-md-4 d-flex justify-content-end" style="margin: auto; text-align: center">
          <div class="icon-contact">
          <a class="tombol" href="#"><i class="fab fa-facebook-f mr-5" style="color: white; font-size: 20px;" data-toggle="tooltip" title="Facebook"></i></a>
          <a class="tombol" href="#"><i class="fab fa-instagram mr-5 ml-5" style="color: white; font-size: 20px;" data-toggle="tooltip" title="Instagram"></i></a>
          <a class="tombol" href="#"><i class="fab fa-twitter mr-5 ml-5" style="color: white; font-size: 20px;" data-toggle="tooltip" title="Twitter"></i></a>
        </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>
<?php } ?>