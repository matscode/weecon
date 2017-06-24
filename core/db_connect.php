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

	$dbuser = 'root';
	$dbhost = 'localhost';
	$dbpass = 'london';

	$dbname = 'weecon';


	$dbCon = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );

	if ( $dbCon->connect_errno ) {
		$dbCon->connect_error;
	}
