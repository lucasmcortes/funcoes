/* função pra retornar um número random entre um e outro */

function Rndm(min, max) {
        return Math.random() * (max - min + 1) + min
}

// e a versão pra números inteiros
function Rndm(min, max) {
        return Math.round(Math.random() * (max - min + 1) + min)
}

/* função pra retornar um número random entre um e outro */
