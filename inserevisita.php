<?php

        // Pega o url acessado
        $visita_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Se é um acesso logado
        if (isset($_SESSION['user_id'])) {
                $visita_user_id = $_SESSION['user_id'];
        } else {
                $visita_user_id = 0;
        } // if

        if (isset($_SERVER['REMOTE_ADDR'])) {
                $rmt_addr = $_SERVER['REMOTE_ADDR'];
        } else {
                $rmt_addr = '0';
        } // if

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
        } else {
                $user_agent = '0';
        } // if

        // Função que escolhe qual visita vai pra tabela de visitas
        if (!function_exists('insereVisita')) {
                function insereVisita($visita_link,$visita_user_id,$rmt_addr,$user_agent) {
                        // Coloca duas variáveis pra comparar vários estágios de validação da necessidade de salvar esse acesso
                        // Qualquer condição que não seja cumprida invalida pro acesso ser salvo
                        // Cada condição, soma na variável $cond
                        // Cada sucesso também soma na variável $visita
                        $cond = 0;
                        $visita = 0;

                        $cond++;
                        if ( (strpos($visita_user_id, 'robots') !== false) || ($visita_user_id = 0) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        } // if


                        $cond++;
                        if ($rmt_addr != 0) {
                                $visita++;
                        } else {
                                $visita = 0;
                        } // if

                        $cond++;
                        if ( (strpos($user_agent, 'bot') !== false) || ($user_agent = 0) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        } // if

                        $cond++;
                        if ( (strpos($visita_link, 'robots') !== false) || (strpos($visita_link, 'includes') !== false) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        } // if

                        // Se passou tudo, vai dar o mesmo número de sucessos na variável $visita comparado ao número de condições somados na variável $cond
                        if ($visita == $cond) {
                                // Simplifica em 1 ou 0
                                $visita = 1;
                        } else {
                                $visita = 0;
                        } // if

                        return $visita;
                } // Função
        } // Existe

        // E aplica
        if (insereVisita($visita_link,$visita_user_id,$rmt_addr,$user_agent) == 1) {
                // Se deu sucesso, insere na tabela
		$stmt = $conn->prepare("INSERT INTO visitas (visita_user_id, visita_link, visita_data, visita_rmt_addr, visita_user_agent) VALUES(?, ?, ?, ?, ?)");
		$stmt->bind_param("issss",$visita_user_id,$visita_link,$data,$rmt_addr,$user_agent);
		$stmt->execute();
		$stmt->close();
	} // if
?>
