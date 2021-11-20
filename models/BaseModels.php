<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$r_uri = "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/" ;
$path_root = "{$root}{$r_uri}";
include "{$path_root}models/ConnectDatabase.php";

class BaseModels
{
	public $database;

    public function __construct()
    {
    }

    public function getInfoRequest($request)
    {
    	unset($request['class_name']);
    	unset($request['action']);
    	unset($request['tabela']);
    	unset($request['redirect']);

    	return $request;
    }
}