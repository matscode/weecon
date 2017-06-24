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

	function debug( $var )
	{

		echo '<pre>';
		print_r( $var );
		echo '</pre>';

	}

	function sanitizeInput( $var )
	{
		$var = trim( $var );

		$var = htmlspecialchars( $var );


		return $var;
	}

	function message( $message, $type )
	{
		switch ( $type ) {
			case 'pass':

				$string = '<div class="msg" style = "color: green;" >' . $message . '</div>';

				break;
			default:
				$string = '<div class="msg" style = "color: red;" >' . $message . '</div>';

				break;
		}

		return $string;
	}



	function redirect( $location )
	{
		$location = str_replace( '.', '/', $location );

		header( 'Location: ' . $location . '.php' );
	}

	function flash($key, $flash){

	}