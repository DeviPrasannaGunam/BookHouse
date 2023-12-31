<?php
$db_connect = mysqli_connect('localhost','root','root','book_store') or die('connection failed');
if(isset($_GET["delete"])){
  mysqli_query($db_connect,"DELETE FROM `fed_d` WHERE a = '$_GET[delete]' ");
  header("location: feed_up.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>feedbacks</title>
  <link rel="stylesheet" href="admin_style.css">
  <style>
  .navbar{
    display: flex;
    background-color:rgb(0,0,0,0.3);
    position: fixed;
    top:0;
    width: 100%;
    font-size: 20px;
  }
  
  .nav-right{
    text-align: right;
    float:right;
  }
  
  .nav-right li {
      display: inline;
      float: left;
      padding-left: 15px;
    }
  
    .nav-right li a {
      display: block;
      padding: 8px;
      text-decoration: none;
      color:white;
    }
  
    .nav-right  li ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color:rgb(0,0,0,0.8);
    }
  
    .nav-right li a:hover {
      background-color: rgba(250,96,0,0.8);
    }
  
    .nav-right .active {
      background-color: #04AA6D;
    }
  
body {

background-image: url("https://wallpapers.com/images/hd/colorful-book-stack-outside-dg76b6qqzwaavwx1.jpg");
  background-size: "fixed";
  background-repeat: "no-repeat";
}
</style>
</head>

<body>

<header class="header">

<nav class="navbar">
<div class="nav-right">
                  <li><a href="front.html">Home</a></li>
                  <li><a href="feed_up.php">Feedbacks</a></li>
                  <li><a href="admin_add.html">Add Admin</a></li>
                  <li><a href="admin_del.php">Remove Admin</a></li>
                  <li><a href="pay_status1.php">Orders pending</a></li>
              </div>
    </nav>

</div>

</header>

  <section class="orders">
  <h1 class="title"></h1>
    <h1 class="title">Feedbacks</h1>

    <div class="box-container">
      <?php
      $all_orders = mysqli_query($db_connect, "SELECT * FROM `fed_d`");

      if (mysqli_num_rows($all_orders) > 0) {
        while ($row = mysqli_fetch_assoc($all_orders)) {
      ?>
 
          <div class="box">
            <p> user id : <span><?= $row['a'] ?></span> </p>
            <p> email : <span><?= $row['b'] ?></span> </p>
            <p> Feedback : <span><?= $row['c'] ?></span> </p>
            <form action="" method="post">
            <a href="feed_up.php?delete=<?= $row["a"] ?>" onclick="return confirm('delete the feedback?');" class="delete-btn">delete</a>
        </form>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">no feedbacks placed yet!</p>';
      }
      ?>

    </div>

  </section>

 

</body>

</html>