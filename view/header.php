<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./asset/style.css">
  <script src="https://kit.fontawesome.com/b7874c4c11.js" crossorigin="anonymous"></script>
  <!-- font family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css"> -->
  <!-- end font -->
</head>

<body>
  <section class="placeMaster">
    <!-- header -->
    <header>
      <div class="place-header">
        <div class="user">
          <div class="info">
            <ul>
              <?php
              if (isset($_SESSION['name'])) {
                if (pathinfo($_SESSION['img'], PATHINFO_EXTENSION) !== 'jpg') {
                  echo "<li ><a  class='imguser' href='index.php?page=info'><img src='./asset/img/" . $_SESSION['img'] . ".png' alt='' '></a></li>";
                } else {
                  echo "<li ><a class='imguser' href='index.php?page=info'><img src='./asset/img/" . $_SESSION['img'] . ".jpg' alt='' '></a></li>";
                }
                echo "<li>" . $_SESSION['name'] ?? "" . "</li>";
                echo "<li><a class='iconlogout' href='index.php?page=logout'>Logout</a></li>";
              } else {
                echo "
                    <div class='login-logout'>
                        <ul>
                            <li><a href='index.php?page=login'>Login</a></listyle=>
                            <li><a href='index.php?page=register'>Register</a></li>
                        </ul>
                    </div>
                ";
              }
              ?>
            </ul>

          </div>
        </div>
        <nav>
          <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="index.php?page=showproduct"><i class="fab fa-product-hunt"></i></a></li>
            <li><a href="index.php?page=showproduct"><i class="fab fa-yarn"></i></a></li>
            <li><a href="index.php?page=blog">Blogs</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- end header -->