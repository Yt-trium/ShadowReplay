<div class="row main">
    <div class="col-sm-1 sidenav"></div>
		<div class="col-sm-9 vidcol">
			<h1 >- ADD OR DELETE USERS -</h1></br>
			</br>
			<h3 >Add Category :</h3></br>
			<form class="form-inline">
			  <div class="form-group">
				<label for="category">Category name:</label>
				<input type="text" class="form-control" id="category" name="categorie">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br/>
			<br/>
			<h3 >Delete Category :</h3></br>
			<br/>
			<span>Data in the table: </span>
			<br/>
			<?php printCatTable() ; ?>
		</div>
	</div>
</div>