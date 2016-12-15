<div class="row main">
    <div class="col-sm-1 sidenav"></div>
		<div class="col-sm-9 vidcol">

			<h1 >- ADD OR DELETE EMISSION -</h1></br>
			</br>
			<h3 > Add Emission :</h3></br>
			<form class="form-inline">
			  <div class="form-group">
				<label for="emissions">Emission Name:</label>
				<input type="text" class="form-control" id="emissions" name="emissions">
			  </div>
			  <div class="form-group">
				<label for="category">Category Name:</label>
				<input type="text" class="form-control" id="category" name="category">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br/>
			<h3 > Delete Emission :</h3></br>
			<br/>
			<span>Data in the table: </span>
			<br/>
			
			<?php printEmmiTable(); ?>
		</div>
	</div>
</div>