
  <!-- pagination row -->
  <div class="row pagination_row">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 pagination_col">
      <ul class="pagination">
        <?php
        if($page == 0)
          echo '<li class="disabled"><a href="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=' . $page . '">' . '<' . '</a></li>';
        else
          echo '<li><a href="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=' . ($page-1) . '">' . '<' . '</a></li>';

        echo '<li class="active"><a href="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=' . $page . '">' . $page . '</a></li>';
        echo '<li><a href="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=' . ($page+1) . '">' . '>' . '</a></li>';
        ?>
      </ul>
    </div>
    <div class="col-sm-2 sidenav"></div>
  </div>
