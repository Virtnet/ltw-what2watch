<header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-custom">
      <a class="navbar-brand" href="index.php">WHAT<span class="chnageit">2</span>WATCH <i class="fas fa-video sitetextgen"></i> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <span style="color:#55595c;" class="nav-link"> 》Every refresh new movies</span>
      </li>
      </ul>
      <?php

      // Check if the session was assigned and we're in the index.php page , If so it will show the message Hi, "username", button to admin panel and logout 
      if ((isset($_SESSION['sessionUser'])) && (basename($_SERVER['PHP_SELF']) == 'index.php')) {
        echo '<span class="loggedin text-white">Hi, <span class="sitetextgen"><strong>' .$_SESSION['sessionUser'] .'</strong></span></span>';
        echo '<a id="button_login" class="btn btn-info my-2 mr-1" href="admin.php">Admin Panel</a> ';
        echo '<a id="button_login" class="btn btn-info my-2" href="logout.php">Logout</a>';
      }
      // If the session is not assigned and we're in the index.php , it will display a button to login 
      else if ((!(isset($_SESSION['sessionUser'])) && (basename($_SERVER['PHP_SELF']) == 'index.php'))) {
        echo '<a id="button_login" class="btn btn-info my-2" href="login.php">Admin Login</a>';
      }

      //Admin panel, welcome message


      //Login page ,as we are able to access to login page only if no session created
      if(basename($_SERVER['PHP_SELF']) == 'login.php') {
          //show nothing 
      }

      ?>
      </div>
      </nav>
</header>