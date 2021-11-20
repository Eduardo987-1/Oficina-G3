<?php

// http://localhost/oficina_meu/actions.php?class_name=Insert&action=index&nome=algo&email=algo@legal.com&senha=12345678&tabela=usuarios&redirect=login.php

$root = $_SERVER['DOCUMENT_ROOT'];
$r_uri = "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/" ;
$path_root = "{$root}{$r_uri}";

class Actions
{
	function __construct()
	{
	}

	public function execute()
	{
		global $path_root;

		$class_name = $_REQUEST['class_name'] ?? '';
		$action     = $_REQUEST['action'] ?? '';

		// VALIDA SE CLASSE EXISTE
		$file = "{$path_root}actions/{$class_name}.php";
		if (!file_exists($file)) {
			echo '<pre>';
			print_r('arquivo n exite');
			exit();
		}

		require $file;

		$class_action = new $class_name();

		// VALIDA SE METODOS EXISTE
		if (!method_exists($class_action, $action)) {
			echo '<pre>';
			print_r('metodo n exite');
			exit();
		}

		$class_action->{$action}();
	}
}

$actions = new Actions();
$actions->execute();