<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="styles/style.css" rel="stylesheet" type="text/css">
  <script src="js.js"></script>
  <script src="jQuery.js"></script>
  <script src="jquery-3.5.1.min.js"></script>
    <?php
    include 'connection.php';
    session_start();
    ?>
  <link rel="stylesheet" href="style/style_index.css">
  <link rel="stylesheet" href="style/style_edit_user.css">
  <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>

  </head>
<body>

<div class="hed">
    <img src = "lo.png" style="height:250px; width: 100%; margin-top:0px">
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" href="index.php"><img src="logo.png" alt="logo" style="width:30px; height:30px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <?php
                if(isset($_SESSION['login'])) {
                    $role = $_SESSION['user']['role'];
                    if ($role == 'user') {
                        echo '<li class="active"><a href="index.php">Home</a></li>';
                        echo '<li><div style="margin-top:10px;" class="md-form active-cyan-2 mb-3">
                            <input class="form-control" type="text" placeholder="Type name of the book" id="suggestBook" aria-label="Search" list="books_data">
                                <datalist id="books_data">

                                </datalist>
                            </div></li>';
                    }
                    elseif ($role == 'admin') {
                        echo '<li class="active"><a href="index.php">Home</a></li>';
                        echo '<li><a href="add_book.php">Add a book</a></li>';
                    }
                }
                elseif (!isset($_SESSION['login'])) {
                    echo '<li class="active"><a href="index.php">Home</a></li>';
                }
                
            ?>
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                if(isset($_SESSION['login'])) {
                    $role = $_SESSION['user']['role'];
                    if ($role == 'user') {
                        echo '<li>';?>
                        <div class="dropdown">
                            <button class="dropbtn"><span class="glyphicon glyphicon-user"></span> User Account</button>
                            <div class="dropdown-content">
                                <a href="edit_user.php">Edit profile</a>
                                <a href="list_post.php">My posts</a>
                                <a href="#">My orders</a>
                            </div>
                        </div>
                        <?php
                        echo '</li>';
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>';
                        echo '<li><a href="cart_user.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
                    }
                    elseif ($role == 'admin') {;
                        echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin Account </a></li>';
                        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>';
                    }
                }
                elseif (!isset($_SESSION['login'])) {
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log in </a></li>';
                    echo '|';
                    echo '<li><a href="registration.php">Sign Up</a></li>';
                }
                
            ?>

        </ul>
    </div>
  </div>
</nav>