<div class="row main">
    <div class="col-sm-1 sidenav"></div>
		<div class="col-sm-9 vidcol">

			<h1 >- ADD OR DELETE FAVORITE -</h1></br>
			</br>
			<h3 >Add Favorite :</h3></br>
			<form class="form-inline">
			  <div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username">
			  </div>
			  <div class="form-group">
				<label for="episode">Episode name:</label>
				<input type="text" class="form-control" id="episode" name="episode">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br/>
			<h3 >Delete Favorite :</h3></br>
			<br/>
			<span>Data in the table: </span>
			<br/>
			<?php printFavTable() ; ?>

		</div>
	</div>
</div>