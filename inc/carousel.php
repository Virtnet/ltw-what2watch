<?php
    require 'dbconnect.php';
    // Function to get information of slider
    function bannerinfo() {
      //$querybanner = 'SELECT * FROM banner ORDER BY id ASC';
      $querybanner = 'SELECT * FROM movies ORDER BY year_release DESC, random() LIMIT 3;';
      $result = pg_query($querybanner) or die ('Banner Query failed: ' .pg_last_error());
      return $result;
    }
    // Function to indicator of slider
    function indicators() {
      $result = bannerinfo(); //Gets the info from the previous function bannerinfo()
      $show = '';
      $countbanner = 0;
      while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)){
        if ($countbanner == 0) {
          $show .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$countbanner.'" class="active"></li>';
        }
        else {
          $show .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$countbanner.'"></li>';
        }
        $countbanner += 1;
      }
      return $show;   
    }
    // Function to check if exists any movie in the slider section
    function emptyCheck($tableSource) {
      $query = 'SELECT * FROM '.$tableSource.'';
      $result = pg_query($query) or die ('Query check is failed ' . pg_last_error());
      $line = pg_num_rows($result);
      return $line;
    }

    // Function ,echo the movies in order of last movies, upcoming movies.
    function items() {
      $result = bannerinfo();
      $show = '';
      $countbanner = 0;
      while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) { //Se a noi ci interessa soltanto i primi 10 righe scriviamo invece di null 10,PGSQL_ASSOC vuiol dire il nosto array e associativo
        if ($countbanner == 0) {
          $show .= '<div class="carousel-item active">';
        }
        else {
          $show .= '<div class="carousel-item">';
        }

        $show .= '<a href="" data-id="'.$line['movie_id'].'" data-title="'.$line['title'].' ('.$line['year_release'].')" class="movieopen"><img src="'.$line['coverimglink'].'" class="d-block w-100" alt="'.$line['plot'].'"></a>
                  <div class="carousel-caption d-none d-md-block" >
                    <div style="background-color:rgba(0, 0, 0, 0.5); padding:5px; border-radius: 25px;">
                    <a href="" data-id="'.$line['movie_id'].'" data-title="'.$line['title'].' ('.$line['year_release'].')" class="movieopen"><h5>'.$line['title'].'</h5></a>
                      <p>'.mb_substr($line['plot'],0,200).' ...</p>
                    </div>
                  </div>
                </div>';
        $countbanner += 1;
      }
      return $show;
    }
    ?>
    <div id="wrapcar">
    <?php if (emptyCheck("movies") == 0) { 
        $hastrailers = false; ?>
      <h2>Sorry,no movies are available</h2>';
    <?php }
    else { 
        $hastrailers = true; ?>
    <!--Carousel Start-->
    <div id="carus" class="clearfix"> <!-- or inline-flex, the child elements will be displayed side-by-side, even if they are not floated. -->
    <div class="textside">
    <h1>THE LATEST HOTTEST MOVIES, <br>
    COMING OUT SOON!</h1>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php echo indicators() ?>
      </ol>
        <div class="carousel-inner">
          <?php echo items() ?>
        </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--Carousel END-->
    </div>
    </div>
    <!--Carousel Section END-->
    <?php } 
    
    
    ?>