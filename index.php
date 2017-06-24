<?php require_once( 'inc/header.php' ) ?>


<?php
	// is user logged in
	if ( user_is_auth() ) {
		redirect( 'dashboard' );
	}

	$username = $passwordPlain = null;

	$errorMsgs  = [];
	$successMsg = '';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		// process the form
		$username      = $_POST['username'];
		$passwordPlain = $_POST['password'];
		$password      = md5( $_POST['password'] );

		// check if username is unique
		$qry = "SELECT * FROM users WHERE username = '" . $username . "'";

		$res = $dbCon->query( $qry );

		if ( $res->num_rows > 0 ) {
			// user found

			$user = $res->fetch_object();

			//validate password
			if ( $password === $user->password ) {
				flash_data( 'msg', 'You av successfully logged in as a user' );

				// set the user information/data
				set_data( [
					'is_auth'    => true,
					'uid'        => $user->id,
					'first_name' => $user->first_name,
					'username'   => $user->username
				] );

				redirect( 'dashboard' );
			}

			$errorMsgs[] = 'Incorrect username and password';

		} else {
			$errorMsgs[] = 'Incorrect username and password';
		}

	}

	$errorMsg = join( '<br>', $errorMsgs );

	$var = [];

?>

<main>

	<fieldset>
		<legend>
			Login
		</legend>

		<?php
			$msg = flash_data( 'msg' );
		?>

		<?= message( $msg, 'pass' ) ?>
		<?= message( $errorMsg, 'error' ) ?>

		<form action="" method="post">
			<div class="float-left">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" placeholder="matmot">
				</div>

				<div class="form-group">
					<label for="password">Passowrd</label>
					<input type="password" name="password" id="password" placeholder="uDj5idF48%&">
				</div>

				<div class="form-group">
					<button type="submit">Login</button>
				</div>
			</div>
		</form>

		<div class="form-group">
			<a href="register.php">Create an Account</a>
		</div>

	</fieldset>
</main>


<?php require_once( 'inc/footer.php' ) ?>
