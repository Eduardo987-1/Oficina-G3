<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$r_uri = "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/" ;
$path_root = "{$root}{$r_uri}";
include "{$path_root}models/BaseModels.php";

class Login extends BaseModels
{
    public function __construct()
    {
        session_start();
    	$database = new ConnectDatabase();

    	$this->database = $database->connect();
    }

    public function index()
    {
    	global $r_uri;

    	$columns  = '';
    	$values   = '';
    	$tabela   = $_REQUEST['tabela'] ?? '';
    	$redirect = $_REQUEST['redirect'] ?? false;
        $origin   = $_REQUEST['origin'] ?? 'index.php';

		$params = $this->getInfoRequest($_REQUEST);

        $email = $params['email'] ?? '';
        $senha = $params['senha'] ?? '';

    	$sql =
    	"
            SELECT * FROM usuarios
            WHERE email = '{$email}'
            AND senha = '{$senha}'
            LIMIT 1;
    	";

    	$result = $this->database->query($sql)->fetchAll();

        if (count($result) > 0) {

            $_SESSION['login'] = current($result);

            if ($redirect) {
            	header("Location: {$r_uri}{$redirect}");
        		exit;
            }
        }

        $mensagens['erro'][] = "Usuario não econtrado, verifique as informações";

        $json_mensagens = json_encode($mensagens) ?? '[]';

        // em caso de erro
        header("Location: {$r_uri}{$origin}?mensagens={$json_mensagens}");
    }

    public function checkLogin()
    {
        global $r_uri;
        if (!isset($_SESSION['login'])) {
            $mensagens['erro'][] = "Você precisa estar logado para acessar algumas telas do sistema";

            $json_mensagens = json_encode($mensagens) ?? '[]';
            header("Location: {$r_uri}index.php?mensagens={$json_mensagens}");
        }else{
            return $_SESSION['login'];
        }
    }
}