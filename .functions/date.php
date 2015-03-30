<?php
/**
 * Date converter
 *
 * @project: Function
 * @version: 1.0
 *
 * @author: Niji Ano
 * @created on: 18 Mar, 2015
 *
 * @url: http://www.anoniji.com
 * @email: anoniji@outlook.com
 * @license: Creative Commons
 *
 */

function otak_date($date) {
	$dt1 = substr($date,0,2);
	$dt2 = substr($date,2,2);
	$dt3 = substr($date,4,4);
	$dt4 = substr($date,8,2);
	$dt5 = substr($date,10,2);
	return $dt1."/".$dt2."/".$dt3." @ ".$dt4."h".$dt5;
}
?>