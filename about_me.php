<?php

	require_once( 'inc/header.php' );

	// functions that return void/nothing
	function love()
	{
		echo 'i love you';
	}

	//functions that return result
	/**
	 * @param integer $a
	 * @param integer $b
	 *
	 * @return integer
	 */
	function add( $a, $b )
	{
		return ( $a + $b );
	}

	function double( $a )
	{
		return ( $a * 2 );
	}

	function power( $number, $power )
	{
		echo $number ** $power;
	}

	function greeter( $name, $message = 'How are you?' )
	{
		echo $message . ' ' . $name . '.';
	}


	//	love();

	$num1 = 2;
	$num2 = 3;
	$res  = add( $num1, $num2 );

	//	echo ($res + 2);

	//  echo double( 50);

	//	power( 6, 3 );

	//	greeter( 'Michael' );