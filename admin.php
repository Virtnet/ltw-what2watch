<?php 
require 'dbconnect.php';
session_start();
if ($_SESSION['sessionUser']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WHAT2WATCH - Explore movies you've never seen - AdminPanel</title>
    <meta name="description" content="Are you bored and would like to watch some movie but do not know which one? This site is for you! every refresh explore new movies base on your genre.">
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body id="otherPages">
  <?php require 'inc/header.php' ?>
  <main>
    <div class="mx-auto sitetextgen" style="width:80%;margin-top:5%; margin-bottom:10px;">
    <div id="panel" class="width40 float-left">
        <h2><i class="fas fa-id-card"></i> Your profile:</h2>
        <p class="text-white">
            <strong>Username:</strong> <?php echo $_SESSION['sessionUser']; ?><br>
            <strong>Email:</strong> <?php echo $_SESSION['sessionemail']; ?><br>
            <strong>Role in WHAT2WATCH:</strong> <?php echo $_SESSION['sessionrole']; ?><br>
        </p>
    </div>
    </div>
    <div id="carus" class="clearfix sitetextgen">
    <div id="panel" class="width40" style="max-height:900px;">    
    <h2> <i class="fa fa-plus"></i> Add New Trailer</h2>
    <?php 

    //Session variables messages in case trailer is added successefully or not (saveinfo.php)

        if(isset($_SESSION['successpost'])){
            echo '<h4 class="p-2 mb-2 bg-success text-white">'.$_SESSION['successpost'].'</h4>';
            unset($_SESSION['successpost']);
        }
        if(isset($_SESSION['notsuccesspost'])) {
            echo '<h4 class="p-2 mb-2 bg-danger text-white">'.$_SESSION['notsuccesspost'].'</h4>';
            unset($_SESSION['notsuccesspost']);
        }
    ?>
    <form action="saveinfo.php" method="POST" name="addMovie" onSubmit="return validaForm();">
      <input type="text" class="form-control" name="title" placeholder="Film Title" /> <br>
      <input type="text" class="form-control" name="description" placeholder="Plot" /> <br>
      <input type="text" class="form-control" name="director" placeholder="Director" /> <br>
      <input type="text" class="form-control" name="year" placeholder="Release Year" /> <br>
      <input type="text" class="form-control" name="imdb" placeholder="IMDB Rating" /> <br>
	  <input type="text" class="form-control" name="duration" placeholder="Duration" /> <br>
      <input type="text" class="form-control" name="imglink" placeholder="Post Image Link" /> <br>
      <input type="text" class="form-control" name="bigimglink" placeholder="Big Post Image Link | For Carousel" /> <br>
	  <input type="text" class="form-control" name="ytlink" placeholder="YouTube Video Code" /> <br>
      <p>Select one or more genres</p>
      <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Action"> Action
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Adventure"> Adventure
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Comedy"> Comedy
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Crime"> Crime
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Romance"> Romance
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Sci-fi"> Sci-fi
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Drama"> Drama
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Fantasy"> Fantasy
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Animation"> Animation
        </label>
        <label class="btn btn-outline-info mb-md-1">
        <input type="checkbox" name="gen[]" value="Horror"> Horror
        </label>
      </div><br>
        <button type="submit" class="btn btn-info btn" name="sendbutton" value="Submit">Submit new trailer</button>
    </form><br>
        </div>
        <div id="panel" class="width60">  
        <h2><i class="fas fa-edit"></i> Remove/Edit Trailer</h2>
        <?php 

        //Session variables messages in case trailer is modified/removed successefully or not (edittrailer.php && deletetrailer.php)

        if(isset($_SESSION['success'])){
            echo '<h4 class="p-2 mb-2 bg-success text-white">'.$_SESSION['success'].'</h4>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['notsuccess'])) {
            echo '<h4 class="p-2 mb-2 bg-danger text-white">'.$_SESSION['notsuccess'].'</h4>';
            unset($_SESSION['notsuccess']);
        }
        if(isset($_SESSION['successedit'])){
          echo '<h4 class="p-2 mb-2 bg-success text-white">'.$_SESSION['successedit'].'</h4>';
          unset($_SESSION['successedit']);
        }
        if(isset($_SESSION['erroredit'])) {
          echo '<h4 class="p-2 mb-2 bg-danger text-white">'.$_SESSION['erroredit'].'</h4>';
          unset($_SESSION['erroredit']);
        }

        $query = 'SELECT * from movies'; //This query to select all the rows and see if there exit any movie
        $result = pg_query($dbconn,$query) or die('Query failed: ' .pg_last_error());
        $numRow = pg_num_rows($result);
        if($numRow == 0){
            echo '<h3>No movies are found,<br> please add at least one movie</h3>';
        }
        //There are movies in DB
        else {
            $i = 1; // Counter for movies
            echo '<table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
            
            ';
            $showperpage = 10; // Number of movies per page
            $numberofPages = ceil($numRow/$showperpage);
            if(isset($_GET['showMovies'])){
              $page = $_GET['showMovies'];
            }

            else {
              $page = 1; //If not recive showMovies from path so assign page 1
            }
            //$pageNumber is the offset , from which number row it will start
            $pageNumber = (($page-1)*$showperpage);
            $query = 'SELECT * from movies LIMIT $1 OFFSET $2';
            $result=pg_query_params($dbconn, $query, array($showperpage,$pageNumber));
            while($line = pg_fetch_array($result,null,PGSQL_ASSOC)){

                echo '<tr>
                        <th scope="row">'. $i .'</th>
                        <td>'.$line['title'].'</td>
                        <td>'.$line['year_release'].'</td>
                        <td>
                        <ul class="list-inline">
                        <li class="list-inline-item">
                        <form action="deletetrailer.php" method="POST">
                        <input type="hidden" name="idtrailer" value="'.$line['movie_id'].'">
                        <button type="submit" name="deletebutton" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                        </li>
                        <li class="list-inline-item">
                        <form action="edittrailer.php" method="POST">
                        <input type="hidden" name="idtrailer" value="'.$line['movie_id'].'">
                        <button type="submit" id="editbutton"  data-id="'.$line['movie_id'].'" data-title="'.$line['title'].' ('.$line['year_release']. ')'.'" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</button>
                        </form>
                        </li>
                        </ul>
                        </td>
                    </tr>

                ';  
                $i += 1;
            // End else of "there is movis in DB"
            }
            ?>
            <tbody>
            </table>
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <?php
            for($page=1;$page<=$numberofPages;$page++){
              if(isset($_GET['showMovies'])) {
              echo '<li class="page-item '. ((($page) == ($_GET['showMovies'])) ? 'active': '') .'" ><a class="page-link" href="admin.php?showMovies='.$page.'">'.$page.'</a></li>';
              }
              else {
                echo '<li class="page-item '. ((($page) == (1)) ? 'active': '') .'" ><a class="page-link" href="admin.php?showMovies='.$page.'">'.$page.'</a></li>';
              }
            }
            ?>
            </ul>
            </nav>
        </div>
    <?php } ?>
        
    </div>
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
    </div>
    <!-- End Modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/addtrailer.js"></script>
    <script type="text/javascript" src="js/alljs.js"></script>
    </main>
    </body>
</html>
<?php
}
else {
    header('Location: index.php');
}
?>