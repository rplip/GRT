<?php
session_start();

if (isset($_SESSION[tabExportExcel])){
	$tabExportExcel = $_SESSION[tabExportExcel];
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: attachment; filename=liste-contact-clients.xls"); 
	echo $tabExportExcel; 
}