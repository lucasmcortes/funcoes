/* Quando desmarca o input/select/textarea e ele tá com value diferente de nada */
/* o backgruond-color e a cor do texto mudam de acordo com o que tá definido no :root {} no styles */
/* (tipo: <style> :root {--pal_cor_um:#FFFFFF;}</style>) */
/* (ou outra cor que colocar no lugar das 'var(--cor_um)'), usando o formato #FFFFFF (hex) */
/* Input colors */
$('input, select, textarea').on('blur', function() {
        if ($(this).val() === '') {
                var color = 'var(--cor_um)';
                var color2 = 'var(--cor_dois)';
        } else if ($(this).val() !== '') {
                var color = 'var(--cor_dois)';
                var color2 = 'var(--cor_um)';
        }
        $(this).css({
                'background-color': color,
                'color': color2
        });
});
/* Input colors */
