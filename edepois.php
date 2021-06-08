<?php
        //////////////////////////////////////////////////////////////////////////////
        // No topo do script de todas as páginas (cabecalho.inc.php)
        // Se tá deslogado
        if (!isset($_SESSION['user_id'])) {
                // Seta o $uid pra 0
        	$uid = 0;
                // Pega o url e divide na barra de espaço
        	$next_url = explode('/', $_SERVER['REQUEST_URI']);
                // Tira o primeiro e o último (o 'www.dominio.com' e o que vem depois da última barra (ou algum nada ou algum $_GET, por exemplo))
        	$next_url = array_slice($next_url, 1, -1);
                // Monta de novo em uma string
        	$next_url = implode('/', $next_url);
        } else if (isset($_SESSION['user_id'])) {
                // Se tá logado, só deixa o $uid igual o user_id
        	$uid = $_SESSION['user_id'];
        } // !isset($_SESSION['user_id'])

        //////////////////////////////////////////////////////////////////////////////
        // Em um arquivo de funções
        // Função pra onde ir depois de logar quando acessa uma página que só tá disponível enquanto logado
        // Por exemplo num 'minhaconta'
        if (!function_exists('eDepois')) {
                function eDepois($next_url) {
                	header("Location: www.dominio.com/entrar/?sequencia=".$next_url."");
                	ob_end_flush();
                	exit();
                } // Função
        } // Existe

        //////////////////////////////////////////////////////////////////////////////
        // No topo de uma página que requer login pra ser acessada a função é chamada assim (no topo do script):
        session_start();
	if (!isset($_SESSION['user_id'])) {
		include_once 'cabecalho.inc.php';
		eDepois($next_url);
	}

        //////////////////////////////////////////////////////////////////////////////
        // Na página de login (/entrar) com o $_GET['sequencia'] no url
        // (Sendo aquela string $next_url)
        // Faz um $_POST['sequencia'] com o $_GET['sequencia'] e passa com ajax pro arquivo que valida o acesso
        if (isset($_GET['sequencia'])) {
        	$sequencia = $_GET['sequencia'];
        } else if (!isset($_GET['sequencia'])) {
        	$sequencia = 'minhaconta';
        } // if

        //////////////////////////////////////////////////////////////////////////////
        // No arquivo que valida o acesso
        // Quando dá acesso granted com a senha correta, etc
        // Na hora de redirecionar pra página que vai quando realiza o login
        // Se o $_GET['sequencia'] era diferente de 'minhaconta'
        if ($_POST['sequencia'] != 'minhaconta') {
                $_SESSION['depois'] = $_POST['sequencia'];
        } else {
                // == 'minhaconta'
                $_SESSION['depois'] = null;
        } // $_POST['sequencia']

        //////////////////////////////////////////////////////////////////////////////
        // Na /minhaconta
        // Vê se entrou pra ir em alguma página especial
        // Ou se só fez login normal ($_POST['sequencia'] do entrar é 'minhaconta')
        // Se a $_SESSION['depois'] foi setada na página que valida o login
        if (isset($_SESSION['depois'])) {
                // E tem conteúdo
        	if ($_SESSION['depois'] != null) {
                        // Coloca numa variável
        		$continuar_url = $_SESSION['depois'];
                        // E tira da $_SESSION
        		unset($_SESSION['depois']);
                        // E força pra redirect no javascript mesmo com os ~headers already sent~
        		echo "
        			<script>
        				$(document).ready(function() {
        					window.location.href = 'www.dominio.com/".$continuar_url."';
        				});
        			</script>
        		";
        	} // if != null
        } // isset($_SESSION['depois'])
?>
