<?php
        // Função pra uma mensagem específica pra cada horário do dia
        if (!function_exists('opcaoMsg')) {
                function opcaoMsg($data) {
                        // Pega o horário da data no formato de 24h com 0 na frente
                        $horario = $data->format("H");
                        // Inicia o array pras opções de mensagem
                        $opcao = [];

                        // Se o horário for depois das 18h
                        if ($horario >= '18') {
                                // Coloca essas opções no array declarado
                                $opcao = array(
                                                        'Após as dezoito horas',
                                                        'Além das 18 horas',
                                                        'Depois de 18h'
                                                );

                        } else if ( ( $horario > '00') && ($horario < '06') ) {
                                $opcao = array(
                                                        'Após a meia-noite',
                                                        'De madrugada',
                                                        'Depois da zero hora e antes das seis da manhã'
                                                );

                        } else if ( ($horario > '06') && ($horario < '12') ) {
                                $opcao = array(
                                                        'De manhã',
                                                        'Fotossíntese ocorrendo',
                                                        'Entre 6h da manhã e 11h59'
                                                );

                        } else if ( ($horario >= '12') && ($horario < '18') ) {
                                $opcao = array(
                                                        'Da hora do almoço até 17h59',
                                                        'Tarde',
                                                        '12h até próximo ao pôr-do-sol'
                                                );
                        } // if

                        // Conta quantas opções
                        $opcoes = count($opcao);
                        // Seta uma opção random entre 0 (a primeira) e o máximo de opções do array $opcao na variável $opcoes
                        $opcaoRand = mt_rand(0,$opcoes);

                        // Se no array $opcao tem a opção de número $opcaoRand
                        if ($opcao[$opcaoRand] != null) {
                                // Mostra a opção que o número randômico escolheu
                                return $opcao[$opcaoRand];
                        } else {
                                // Se ocorreu algum erro e o número random deu em uma opção inexistente no array $opcao
                                return 'Oi';
                        }
                } // Função
        } // Existe
?>
