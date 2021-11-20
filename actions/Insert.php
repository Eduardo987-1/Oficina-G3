<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$r_uri = "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/" ;
$path_root = "{$root}{$r_uri}";
include "{$path_root}models/BaseModels.php";

class Insert extends BaseModels
{

    public function __construct()
    {
    	$database = new ConnectDatabase();

    	$this->database = $database->connect();
    }

    public function index()
    {
    	global $r_uri;

    	$columns  = '';
    	$values   = '';
    	$tabela   = $_REQUEST['tabela'] ?? '';
    	$redirect = $_REQUEST['redirect'] ?? '';

		$params = $this->getInfoRequest($_REQUEST);

		$columns = implode(',', array_keys($params));
		$values  = '"' . implode('","', $params) . '"';

    	$sql =
    	"
	    	INSERT INTO {$tabela}
			({$columns})
			VALUES({$values});
    	";

    	$result = $this->database->query($sql);

    	header("Location: {$r_uri}{$redirect}");
		exit;
    }
}