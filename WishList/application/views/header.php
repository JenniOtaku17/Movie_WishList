<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">

<?php 
    $base_url = load_class('Config')->config['base_url'];
    $user = $this->session->get_userdata();
    if(isset($user['name']) and isset($user['id'])){
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="#">WishList</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="'.$base_url.'index.php/user/logout">Log Out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="'.$base_url.'index.php/movie">Movie List</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="'.$base_url.'index.php/user/wishList">My WishList</a>
    </li>
    </ul>
  </nav>';

   }else{
       echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
       <a class="navbar-brand" href="#">WishList</a>
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" href="'.$base_url.'index.php/user/login">Login</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="'.$base_url.'index.php/user/register">Sign Up</a>
         </li>
       </ul>
     </nav>';
   }
?>

<br><br><br>