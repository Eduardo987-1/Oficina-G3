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
    	$redirect = $_REQUEST['redirect'] ?? $_REQUEST['origin'] ?? 'index.php';
        $mensagens = [];

		$params = $this->getInfoRequest($_REQUEST);

		$columns = implode(',', array_keys($params));
		$values  = '"' . implode('","', $params) . '"';

        try {

        	$sql =
        	"
    	    	INSERT INTO {$tabela}
    			({$columns})
    			VALUES({$values});
        	";

        	$result = $this->database->query($sql);

            $mensagens['sucesso'][] = "Registro inserido com sucesso na tabela: '{$tabela}'";
        } catch (Exception $e) {
            $mensagens['erro'][] = "O Registro não pode inserido na tabela: '{$tabela}'";
        }

        $json_mensagens = json_encode($mensagens) ?? '[]';

    	header("Location: {$r_uri}{$redirect}?mensagens={$json_mensagens}");
		exit;
    }

    public function insertOrError()
    {
        global $r_uri;

        $columns  = '';
        $values   = '';
        $tabela   = $_REQUEST['tabela'] ?? '';
        $redirect = $_REQUEST['redirect'] ?? $_REQUEST['origin'] ?? 'index.php';

        $params = $this->getInfoRequest($_REQUEST);


        $conditions = [];
        foreach ($params as $column => $value) {
            $conditions[] = "{$column} = '{$value}'";
        }

        $str_conditions = implode(' AND ', $conditions);

        $sql =
        "
            SELECT *
            FROM {$tabela}
            WHERE
            {$str_conditions}
        ";

        $result = $this->database->query($sql)->fetchAll();

        $has_agendamento = count($result) > 0;

        if (!$has_agendamento) {
            $columns = implode(',', array_keys($params));
            $values  = '"' . implode('","', $params) . '"';

            $sql =
            "
                INSERT INTO {$tabela}
                ({$columns})
                VALUES({$values});
            ";
            $mensagens['sucesso'][] = "Registro inserido com sucesso na tabela: '{$tabela}'";

            $result = $this->database->query($sql);
        }else{
            $mensagens['erro'][] = "O Registro não pode inserido na tabela: '{$tabela}', pois ja existe um registro semelhante!";
        }

        $json_mensagens = json_encode($mensagens) ?? '[]';

        header("Location: {$r_uri}{$redirect}?mensagens={$json_mensagens}");
        exit;
    }
}