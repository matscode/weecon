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


	session_start();

	//we manage it

	function set_data($mixed, $value = ''){
		if(is_array( $mixed)){
			// set multiple session data
			foreach ($mixed as $key => $value){
				$_SESSION[$key] = $value;
			}

			return;
		}

		$_SESSION[$mixed] = $value;
	}

	function get_data($key){
		return (isset($_SESSION[$key]) && !empty( $_SESSION[$key])) ? $_SESSION[$key] : '';
	}

	function user_is_auth(){
		return get_data( 'is_auth');
	}


	function delete_data($key){
		unset($_SESSION[$key]);
	}


	function flash_data($key, $value = ''){

		if($value){
			set_data( $key, $value);
		} else {
			$data = get_data( $key);
			delete_data( $key);

			return $data;
		}
	}