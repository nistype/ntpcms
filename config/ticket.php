<?php
/**
*
*
*
* @package ZanCMS
* @author Sr.Osito
* @author Max Style
* @copyright ZanCMS (c) 2016 - All rights reserved.
* @version 1.0
*
*
*
**/

# Ticket

function GenerateTicket(){
	$sessionKey = 'Habbot-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
	return $sessionKey;		
}

?>