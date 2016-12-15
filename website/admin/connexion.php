<div class="row main">
    <div class="col-sm-1 sidenav"></div>
		<div class="col-sm-9 vidcol">
		<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
				<label for="username">Nom d'utilisateur:</label>
				<input type="text" class="form-control" id="username" name="username">
			</div>
			<div class="form-group">
				<label for="password">Mot de passe:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-default">Connexion</button>
		</form>

		</div>
	</div>
</div>