/* Muda menu */
/* Imagina que tem um menu no cabeçalho, fixed, top:0 */
<style>
        #menutopwrap {display:inline-block;position:fixed;top:0;left:0;right:0;width:100%;max-width:1366px;margin:0 auto;margin-top:-3px;padding:1.8% 3.6%;z-index:100;text-align:center;}
        .bgMenuWrap {background-color:#000000;}
        .boxShadowMenuWrap {-webkit-box-shadow: 0px 8px 10px -8px rgba(0,0,0,0.34);box-shadow: 0px 8px 10px -8px rgba(0,0,0,0.34);}
</style>
/* (Com o background-color da cor estabelecida na classe .bgMenuWrap, e um box-shadow definido na classe ;boxShadowMenuWrap) */

/* Assim: */
<!-- menutopwrap -->
<div id='menutopwrap'>
        <!-- conteúdo do div -->
</div>
<!-- menutopwrap -->

/* E quando scroll muda o background-color, o padding e coloca um blur: */
<style>
        .bgBrancoMenuWrap {background: rgba(255, 255, 255, 0.34);backdrop-filter:blur(3px);padding:0.9% 3.6% !important;}
</syle>

/* Usando jQuery */
/* Vê a posição da barra de rolagem */
<script>
        $( document ).ready(function() {
                /* Quando abre a página */
                $('#menutopwrap').removeClass('bgBrancoMenuWrap');
                $('#menutopwrap').addClass('boxShadowMenuWrap');
                $('#menutopwrap').addClass('bgMenuWrap');

                /* Define a posição do scroll como no topo da página */
                var posScrollAnterior = window.pageYOffset;

                /* Quando scroll: */
                window.onscroll = function() {
                        /* Cria uma nova variável pra comparar com a posição da barra de rolagem anterior */
                        var posScrollAtual = window.pageYOffset;

                        if (posScrollAnterior > posScrollAtual) {
                                /* Se rolou pra cima: */
                                $('#menutopwrap').removeClass('bgBrancoMenuWrap');
                                $('#menutopwrap').addClass('boxShadowMenuWrap');
                                $('#menutopwrap').addClass('bgMenuWrap');
                        } else {
                                /* Rolou pra baixo: */
                                $('#menutopwrap').removeClass('boxShadowMenuWrap');
                                $('#menutopwrap').removeClass('bgMenuWrap');
                                $('#menutopwrap').addClass('bgBrancoMenuWrap');
                        }

                        /* Mas se tá até apenas 90px do topo, faz ficar igual quando abre */
                        if (window.pageYOffset < 90) {
                                $('#menutopwrap').removeClass('bgBrancoMenuWrap');
                                $('#menutopwrap').addClass('boxShadowMenuWrap');
                                $('#menutopwrap').addClass('bgMenuWrap');
                        }

                        /* Atualiza a variável pra comparar de novo ao próximo scroll */
                        posScrollAnterior = posScrollAtual;
                } /* Function */
        }); /* Ready */
</script>
/* Muda menu */
