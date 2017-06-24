<?php
	/**
	 *
	 * Description - weecon
	 *
	 * @package        App
	 * @category
	 * @author         Michael Akanji <matscode@gmail.com>
	 * @date           2017-06-13
	 * @copyright (c)  2016 - 2017, TECRUM (http://www.tecrum.com)
	 *
	 */
?>

<?php require_once( 'inc/header.php' ) ?>


<?php
	// is user logged in
	if ( ! user_is_auth() ) {
		$errorMsg = 'Login to access page';

		redirect( 'index' );
	}


?>

<main>

	<?php
		$msg = flash_data( 'msg' );
	?>

	<?= message( $msg, 'pass' ) ?>

	<h1>Dashboard</h1>
	<hr>


	<div class="form-group">
		<a href="sign_out.php">Sign Out</a>
	</div>
</main>


<?php require_once( 'inc/footer.php' ) ?>
