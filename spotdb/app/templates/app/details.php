{% load static %}

<?php
/**
 * This is an example of how to authenticate a user with a University username
 * and password.
 * 
 * It required the instillation of the file Authenticator.php in the same 
 * directory.
 * 
 * @todo The developer must edit this file to define the constant DEVELOPER_URL.
 * 
 * @author Iain Hart (iain@cs.man.ac.uk)
 * @date 1st November 2013
 */

// @todo Replace the following defined constant with the URL which runs the 
// program requiring authentication.
define ("DEVELOPER_URL", "http://localhost/app/details.php");

// Define the location of the service on the Computer Science server.
define("AUTHENTICATION_SERVICE_URL", "http://studentnet.cs.manchester.ac.uk/authenticate/");

// Define the location of CAS's logtout service on the Computer Science server.
define("AUTHENTICATION_LOGOUT_URL", "http://studentnet.cs.manchester.ac.uk/systemlogout.php");

// Locate the Authenticator class.
require_once("Authenticator.php");

// Start a php session to store variables. This will be used to hold the ticket
// issued to the user so that when the user returns from CAS we know that
// we are interacting with the same user.
session_start();

// Uncomment this next line if study year is required but this will necessitate
// an extra query on the database so only use it if genuinely needed.
// Authenticator::requireStudyLevel();

// Validate the user.
Authenticator::validateUser();

// To invalidate a user uncomment the following. It uses header() to send the
// user to CAS's logout page on the Computer Science server. To work you must
// not have returned any output to the client before calling it.

// Authenticator::invalidateUser();

?>