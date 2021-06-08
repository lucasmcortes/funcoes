/* Modelo de loading */

/* Topo do script, logo no início do <body> */
<body>
/* Coloca um div com uma imagem com o gif de loading (carregando.gif) dentro */
<div id="loader" style="z-index:999999999;min-width:1008vw;max-width:1008vw;min-height:1008vh;max-height:1008vh;margin:auto;background-color:#ffffff;">
	<div style="margin:auto;display:inline-block;position:fixed;top:-144px;left:0;bottom:0;right:0;height:36px;width:89px;">
		<img style='height:auto;width:100%;max-width:180px;' src="www.exemplo.com/img/carregando.gif"></img>
	</div>
</div>

/* Abre uma tag <extremos> (por exemplo) */
<extremos>

/* loadinginiciado.js */
        /* E coloca ela pra ficar invisível */
        /* E prepara o <body> pra ficar com o #loader enquanto carrega a página */
	/* position:fixed pra ficar quietinho esperando */
	/* width:100% pra ocupar a página toda e deixar o loader ficar no centro horizontal */
	/* overflow-y:scroll pra posicionar a barra de rolagem mesmo sem precisar e a página continuar no mesmo lugar (pro caso de aparecer uma [naquela página])*/
        <script>
        	$("extremos").css({"display": "none"});
        	$("body").css({"position": "fixed", "width": "100%", "overflow-y": "scroll"});
        </script>
/* loadinginiciado.js */

/* _________________________________________________________________ */
/* Aqui entra todo o conteúdo da página que o DOM vai lendo */
/* _________________________________________________________________ */

/* Fecha a tag <extremos> */
</extremos>
</body>

/* loadingcompleto.js */
        /* Mostra a página de novo, deixando o #loader invisível */
        /* E a página (já lida pelo DOM) embaixo é mostrada com o "display:block" na <extremos> */
	/* E reseta o position e overflow-y do <body> pra página se comportar adequadamente */
        $("#loader").fadeOut("fast", function() {
        	$("extremos").css({"display": "block"});
        	$("body").css({"position": "static", "width": "100%", "overflow-y": "visible"});
        });
/* loadingcompleto.js */

/* Modelo de loading */
