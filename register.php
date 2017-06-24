<?php
	/**
	 *
	 * Description - weecon
	 *
	 * @package        App
	 * @category
	 * @author         Michael Akanji <matscode@gmail.com>
	 * @date           2017-06-11
	 * @copyright (c)  2016 - 2017, TECRUM (http://www.tecrum.com)
	 *
	 */

?>


<?php require_once( 'inc/header.php' ) ?>

<?php


	$first_name = $username = $passwordPlain = null;

	$errorMsgs  = [];
	$successMsg = '';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		// process the form


		$first_name    = sanitizeInput( $_POST['first_name'] );
		$username      = sanitizeInput( $_POST['username'] );
		$passwordPlain = $_POST['password'];
		$password      = md5( $_POST['password'] );

		// check if username is unique
		$qry = "SELECT id FROM users WHERE username = '" . $username . "'";

		if ( $dbCon->query( $qry )->num_rows > 0 ) {
			$errorMsgs[] = 'Username already exist, please choose another username';
		}

		//doing validation
		$password_min_len = 6;

		if ( empty( $first_name ) ) {
			$errorMsgs[] = 'First name is required';
		}

		if ( empty( $username ) ) {
			$errorMsgs[] = 'Username is required';
		}

		if ( empty( $passwordPlain ) || strlen( $passwordPlain ) < $password_min_len ) {
			$errorMsgs[] = 'Password cant be less than ' . $password_min_len . ' characters';
		}


		if ( ! $errorMsgs ) {
			$qry = "INSERT INTO users (first_name, username, password) VALUES ('" . $first_name . "', '" . $username . "', '" . $password . "')";

			//saving the sata
			if ( ! $dbCon->query( $qry ) ) {
				echo $dbCon->error;
			}

			flash_data('msg', 'Your account as been created successfully');

			redirect( 'index');

		}

	}

	$errorMsg = join( '<br>', $errorMsgs );

?>


<main>

	<fieldset>
		<legend>
			Create an Account
		</legend>

		<?= message( $errorMsg, 'error' ) ?>

		<form action="" method="post">
			<div class="form-group">
				<label for="firstName">First Name</label>
				<input type="text" name="first_name" id="firstName" placeholder="Michael" value="<?= $first_name ?>">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="matmot" value="<?= $username ?>">
			</div>

			<div class="form-group">
				<label for="password">Passowrd</label>
				<input type="password" name="password" id="password" placeholder="uDj5idF48%&" value="<?= $passwordPlain ?>">
				<span id="showPass" style="margin-top: 20px; border: solid #999 1px;">show password</span>
			</div>

			<div class="form-group">
				<button type="submit">Create my Account</button>
			</div>
		</form>

		<div class="form-group">
			Have an Account? <a href="/">Login</a>
		</div>


	</fieldset>
</main>

<script>
	var btn = document.getElementById('showPass');
	var passwordInput = document.getElementById('password');

	btn.onclick = function () {
		passwordInput.setAttribute('type', 'text');
	}

</script>

<?php require_once( 'inc/footer.php' ) ?>
