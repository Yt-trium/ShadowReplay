  <?php
  while ($row = $q->fetch())
  {
    $dataToShow[] = '<a href="video.php?id=' . $row[0] . '"><img class="img-responsive center-block center-block" src="img/vignette/' . $row[0] . '.png" alt="video 1">' . '<p>' . $row[1] . '</p></a>';
    $i++;
  }

  while($i < 15)
  {
    $dataToShow[] = '<img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">' . 'NO VIDEO';
    $i++;
  }
  ?>
  <!-- main page -->
  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[0];
        echo $dataToShow[3];
        echo $dataToShow[6];
        echo $dataToShow[9];
        echo $dataToShow[12];
      ?>
    </div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[1];
        echo $dataToShow[4];
        echo $dataToShow[7];
        echo $dataToShow[10];
        echo $dataToShow[13];
      ?>
    </div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[2];
        echo $dataToShow[5];
        echo $dataToShow[8];
        echo $dataToShow[11];
        echo $dataToShow[14];
      ?>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS 1</p>
      </div>
      <div class="well">
        <p>ADS 2</p>
      </div>
      <div class="well">
        <p>ADS 3</p>
      </div>
      <div class="well">
        <p>ADS 4</p>
      </div>
      <div class="well">
        <p>ADS 5</p>
      </div>
    </div>
  </div>
