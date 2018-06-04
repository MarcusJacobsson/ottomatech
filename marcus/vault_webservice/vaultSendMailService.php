<?php

require 'functions.php';
require '../nusoap/nusoap.php';

$server=new nusoap_server();
$server->configureWSDL("vaultSendMailService"."urn:vaultSendMailService");
$server->register(
        "test", //name of function
        array("name"=>'xsd:string'), //input
        array("return"=>'xsd:string')); //output

$server->register(
        "sendMail", //name of function
        array("to"=>'xsd:string', "token"=>'xsd:string'), //input
        array("return"=>'xsd:string')); //output

$server->register(
        "sendWarningMail", //name of function
        array("to"=>'xsd:string', "timezone"=>'xsd:string'), //input
        array("return"=>'xsd:string')); //output

$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:'';
$server->service($HTTP_RAW_POST_DATA);

