<?php
        // Função que escolhe qual visita vai pra tabela de visitas
        if (!function_exists('insereVisita')) {
                function insereVisita($visita_link,$visita_user_id,$rmt_addr,$user_agent) {
                        $cond = 0;
                        $visita = 0;

                        $cond++;
                        if ( (strpos($visita_user_id, 'robots') !== false) || ($visita_user_id = 0) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        }

                        $cond++;
                        if ($rmt_addr != 0) {
                                $visita++;
                        } else {
                                $visita = 0;
                        }

                        $cond++;
                        if ( (strpos($user_agent, 'bot') !== false) || ($user_agent = 0) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        }

                        $cond++;
                        if ( (strpos($visita_link, 'robots') !== false) || (strpos($visita_link, 'includes') !== false) ) {
                                $visita = 0;
                        } else {
                                $visita++;
                        }

                        if ($visita == $cond) {
                                $visita = 1;
                        } else {
                                $visita = 0;
                        }

                        return $visita;
                } // Função
        } // Existe

        // E aplica
        if (insereVisita($visita_link,$visita_user_id,$rmt_addr,$user_agent) == 1) {
		$stmt = $conn->prepare("INSERT INTO visitas (visita_user_id, visita_link, visita_data, visita_rmt_addr, visita_user_agent) VALUES(?, ?, ?, ?, ?)");
		$stmt->bind_param("issss",$visita_user_id,$visita_link,$data,$rmt_addr,$user_agent);
		$stmt->execute();
		$stmt->close();
	} // if
?>
