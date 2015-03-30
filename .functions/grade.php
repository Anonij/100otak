<?php
/**
 * Grade converter
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

function otak_grade($id) {

	if($id == "0") return "Compte désactivé";
	if($id == "10") return "Nouveau membre";
	else if($id == "99") return "Fondateur";
	else return "error";

}