<?php require 'dbconnect.php'; // Connection to DB 
session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>WHAT2WATCH - Explore movies you've never seen</title>
      <meta name="description" content="Are you bored and would like to watch some movie but do not know which one? This site is for you! every refresh explore new movies base on your genre.">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"  type='text/css'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css"> 
    </head>
<body>
  <!--Header Section-->
  <?php require 'inc/header.php' ?>
  <main>
    <!--Carousel Section-->
    <?php require 'inc/carousel.php' ?>

    <!-- Start of Wrap -->
    <?php if ($hastrailers) { ?>
    <div class="wrap sitetextgen">
    <?php
     ?>
    <div class="clearfix" style="padding-bottom:13px;">
    <div style="float:left;">
    <h2><i class="fas fa-video" style="color:#21c7e1;"></i> Looking for a movie</h2>
    </div>
    <div class="form-group" style="float:right;">
    <form>
        <select class="form-control" id="exampleFormControlSelect1" style="color:#17a2b8;background:#161717; font-size:18px; border-color:#222528;" onchange="sortMovies()">
        <option value="selectgenre" disabled selected> Select Genre </option>
        <option value="All genres">All Genres</option>
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
        <option value="Comedy">Comedy</option>
        <option value="Crime">Crime</option>
        <option value="Romance">Romance</option>
        <option value="Drama">Drama</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Animation">Animation</option>
        <option value="Horror">Horror</option>
        <option value="Sci-fi">Sci-fi</option>
        </select>
    </form>
    </div>
    </div>
    <br>
    <!--5 Cards in a row-->
    <div class="row row-cols-1 row-cols-md-5" style="text-align:center;">
    <?php }//End while loop (Movies in rows)?>
    </div>
    <!--Closing DIV 5 in a row-->
    </div></div>
    <!-- End of Wrap -->

      <!-- Modal -->
      <div class="modal fade" id="movieModal">
      <div class="modal-dialog modal-lg modal-dialog-centered"> <!--Added style with with because it doesn't work together with scrollable-->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </main>
    <!-- End Modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/alljs.js"></script>
  </body>
</html>