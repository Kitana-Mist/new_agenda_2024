<?php
include_once('../includes/header.php'); // inclui o arquivo header.php localizado no diretório ../includes/

// SANITIZAÇÃO DE ENTRADA (formas como os dados chegam)
$acao = filter_var(isset($_GET['acao']) ? $_GET['acao'] : 'bemvindo', FILTER_SANITIZE_STRING);

// DEFINIR CAMINHOS EM VARIÁVEIS
$paginas = [
    'bemvindo' => 'conteudo/cadastro_contato.php',
    'editar' => 'conteudo/update_contato.php',
    'perfil' => 'conteudo/perfil.php',
    'relatorio' => 'conteudo/relatorio.php'
];

// VERIFICAR SE A AÇÃO EXISTE NO ARRAY, CASO CONTRÁRIO, USAR A PÁGINA PADRÃO
$pagina_incluir = isset($paginas[$acao]) ? $paginas[$acao] : $paginas['bemvindo'];

// INCLUIR A PÁGINA CORRESPONDENTE
include_once($pagina_incluir);

include_once('../includes/footer.php');
 
