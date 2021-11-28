<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$r_uri = "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/" ;
$path_root = "{$root}{$r_uri}";
include "{$path_root}models/BaseModels.php";

class Comentario extends BaseModels
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
        $redirect = $_REQUEST['redirect'] ?? $_REQUEST['origin'] ?? 'index.php';

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

        $mensagens['sucesso'][] = "Registro inserido com sucesso na tabela: '{$tabela}'";
        //$mensagens['erro'][] = "O Registro não pode inserido na tabela: '{$tabela}'";
        $json_mensagens = json_encode($mensagens) ?? '[]';

        header("Location: {$r_uri}{$redirect}?mensagens={$json_mensagens}");
        exit;
    }

    public function getComentario()
    {
        global $r_uri;

        $sql =
        "
            SELECT * FROM comentario;
        ";

        $result = $this->database->query($sql)->fetchAll();

        return $result;
    }
}