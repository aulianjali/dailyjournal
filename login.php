<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aulia's Daily Journal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section id="login" class="vh-100 d-flex align-items-center bg-danger-subtle"> 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg">
          <div class="card-body p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h2 class="card-title fw-bold m-0">Login</h2>
            </div>
            
            <form method="post">
              <div class="mb-4">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="user" placeholder="Masukkan Username" required>
              </div>
              
              <div class="mb-4">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="pass" placeholder="Masukkan Password" required>
              </div>
              
              <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              if ($_POST['user']=="admin" && $_POST['pass']=="123456") {
                $_SESSION['login'] = true;
                echo "<div class='alert alert-success mt-3'>Login berhasil! Selamat datang.</div>";
                // Redirect to index.html after successful login
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'index.html';
                        }, 2000);
                      </script>";
              } else {
                echo "<div class='alert alert-danger mt-3'>Username atau Password salah</div>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

<!-- Bootstrap JS (optional, but recommended for full functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
}
?>