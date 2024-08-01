<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../asset/dangnhap.css">
</head>

<body>

  <div class="login">
    <img src="../asset/img/banner.png" alt="">
    <div class="content">
      <h1>Ấm áp <br><span>Mềm Mại</span> <br>Dễ chịu</h1>
      <form class="form" method="POST" action="../model/m_login.php">
        <input type="text" name="name" placeholder="Gmail" required>
        <input type="password" name="pw" placeholder="Password" required>
        <!-- Use a submit button instead of a link for form submission -->
        <input type="submit" name="dangnhap" class="btnn" value="login"></input>

        <p class="link">Don't have an account?<br>
          <a href="#">Sign up</a> here
        </p>
        <p class="liw">Log in with</p>

        <div class="icons">
          <!-- Fix the icon names and remove spaces -->
          <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
          <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
          <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
          <a href="#"><ion-icon name="logo-google"></ion-icon></a>
        </div>
      </form>



    </div>
  </div>
  </div>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>


</html>