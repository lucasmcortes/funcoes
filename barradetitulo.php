<?php
        // Função pra barra amarela com texto dentro na direita
        if (!function_exists('BarraDeTitulo')) {
                // O inverte fica no normal pra poder usar a função só com uma variável (a do texto),
                // mas se quiser pode colocar ($txt_barra, 'inverte') pra usar o outro setup de cores e colocar o texto do outro lado horizontalmente
                function BarraDeTitulo($txt_barra, $inverte = 'normal') {
                	if ($inverte == 'inverte') {
                		$txt_align = 'left';
                		$txt_cor = 'eeefca';
                		$bg_cor = '3B0055';
                	} else {
                		$txt_align = 'right';
                		$txt_cor = '3B0055';
                		$bg_cor = 'f5ce1b';
                	} // if

                        // Coloca o texto todo em caixa alta
                	$txt_show = strtoupper($txt_barra);

                        // Exibe o texto
                    	echo "
                		<p style='min-width:100%;max-width:100%;float:left;background-color:#".$bg_cor.";color:#".$txt_cor.";font-size:13px;padding:13px;margin:0 auto;text-align:".$txt_align.";'>
                			".$txt_show."
                		</p>
                	";

                } // Função
        } // Exists
?>
