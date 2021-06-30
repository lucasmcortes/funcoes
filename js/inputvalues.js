/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
/* Esquema pra definir os values quando já haviam sido preenchidos anteriormente pelo usuário (enquanto na mesma aba) */

function pegaInputValues() {
        $('input, textarea').on('keyup', function() {
                if ($(this).attr('id') !== 'pwd') {
                        sessionStorage.setItem($(this).attr('id'), $(this).val());
                }
        });
}
pegaInputValues();

function colocaInputValues() {
        $('input, textarea').each(function() {
                if ($(this).attr('id') !== 'pwd') {
                        if (sessionStorage.getItem($(this).attr('id')) !== '') {
                                $(this).val(sessionStorage.getItem($(this).attr('id')));
                        } else {
                                $(this).val('');
                        }
                }
        });
}
colocaInputValues();

/* Esquema pra definir os values quando já haviam sido preenchidos anteriormente pelo usuário (enquanto na mesma aba) */
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */
