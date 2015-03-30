<?php
/**
 * Icon converter
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

function otak_icon($id) {
	if($id == "1") return "twitter";
	else if($id == "2") return "bullhorn";
	else if($id == "3") return "calendar";
	else if($id == "4") return "newspaper-o";
	else if($id == "5") return "user";
	else if($id == "6") return "child";
	else if($id == "7") return "level-up";
	else if($id == "8") return "level-down";
	else if($id == "9") return "graduation-cap";
	else if($id == "10") return "unlock-alt";
	else if($id == "11") return "comment";
	else if($id == "12") return "thumbs-down";
	else return "square-o";
}