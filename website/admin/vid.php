<div class="row main">
    <div class="col-sm-1 sidenav"></div>
		<div class="col-sm-9 vidcol">
			<h1 >- ADD OR DELETE EPISODE -</h1></br>
			</br>
			<h3 > Add Episode :</h3></br>
			<form class="form-inline method="post" action="<?php ?>">
			  <div class="form-group">
				<label for="Login">titre:</label>
				<input type="text" class="form-control" id="titre" name="titre">
			  </div>
			  <div class="form-group">
				<label for="description">description:</label>
				<input type="text" class="form-control" id="description" name="description">
			  </div>
			   <div class="form-group">
				<label for="duree">durée</label>
				<input type="number" class="form-control" id="duree" name="duree">
			  </div>
			   <div class="form-group">
				<label for="pwd">country</label>
				<input type="text" class="form-control" id="country" name="country">
			  </div>
			   <div class="form-group">
				<label for="pwd">ImageFormat:</label>
				<input type="text" class="form-control" id="ImageFormat" name="ImageFormat">
			  </div>
				<div class="form-group">
					<label for="firstbroadcast" align="left">FirstBroadcast:</label>
					<input type="date" class="form-control" id="firstbroadcast" name="firstbroadcast"></br>
				</div>
				<div class="form-group">
					<label for="lastbroadcast" align="left">LastBroadcast:</label>
					<input type="date" class="form-control" id="lastbroadcast" name="lastbroadcast"></br>
				</div>
				<div class="form-group">
					<label for="emissions" align="left">Emissions Name:</label>
					<input type="text" class="form-control" id="emissions" name="emissions"></br>
				</div>
				<div class="multilanguage">
					<label><input type="checkbox"> multilanguage</label>
				</div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			<br/>
			<br/>
			<h3 > Delete Episode :</h3></br>
			<br/>
			<span>Data in the table: </span>
			<br/>
			<?php printVidTable() ; ?>
		</div>
	</div>
</div>