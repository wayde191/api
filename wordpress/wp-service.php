<?php
/**
 * WordPress User Page
 *
 * Handles service call,
 * and other user handling.
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require( dirname(__FILE__) . '/wp-load.php' );

$_POST['log'] = 'admin';
$_POST['pwd'] = 'admin';

$user = wp_signon('', '');

var_dump($user);



?>