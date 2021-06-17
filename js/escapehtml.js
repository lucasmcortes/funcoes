// escape enter e espaço
// http://www.htmlescape.net/htmlescape_tool.html
function escapeHTML() {
        // de onde vem
        var x=document.getElementById('bacana');
        var preescape="" + x.value;
	var escaped="";

	var i=0;

        for(i=0;i<preescape.length;i++) {
		var p=preescape.charAt(i);

		p=""+escapeBR(p);
		p=""+escapeNBSP(p);

		escaped=escaped+p;
	}

        // pra onde vai o resultado do enter que virou <br/> e do espaço qu virou &nbsp
	x=document.getElementById('resultado');
	x.value=escaped;
}

function escapeBR(original) {
        var thechar = original.charCodeAt(0);
        switch(thechar) {
		case 10: return "<br/>"; break; //newline
		case '\r': break;
	}
	return original;
}

function escapeNBSP(original) {
        var thechar = original.charCodeAt(0);
	switch(thechar) {
		case 32: return "&nbsp;"; break; //space
	}
	return original;
}

// digitando
$('#entrada').on('keyup', function () {
        // quando digita vai colocando o valor arrumado pela função naquela id do resultado
        escapeHTML(document.getElementById('entrada').value);
});
// digitando
// escape enter e espaço
