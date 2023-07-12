let tempo;
let life = 3;
let timer = 5;
let pts = 0;

function timerForQuestion() {
    if (timer > 0) {
        timer -= 1;

        let str = '00:' + ((timer > 9)?timer:'0' + timer);

        document.querySelector('.timer').innerHTML = str;
    } else {
        clearInterval(tempo);

        life -= 1;

        if (life > 0) {

            document.querySelector('.life').innerHTML = 'Vies restantes : ' + life;

            document.querySelector('.timer').innerHTML = 'Temps dépassé. <a href="#" data-quizz="continue">Continuer ?</a>';

            document.querySelector('a[data-quizz="continue"]').addEventListener('click', continueQuizz);
        } else {
            document.querySelector('.life').innerHTML = 'Vies restantes : ' + life;

            document.querySelector('.timer').innerHTML = 'Perdu ! <a href="#" data-quizz="replay">Rejouer ?</a>';

            document.querySelector('a[data-quizz="replay"]').addEventListener('click', replayQuizz);
        }
    }
}

function continueQuizz() {
    timer = 5;
    tempo = setInterval(timerForQuestion, 1000);
}

function replayQuizz() {
    life = 3;
    timer = 5;
    // Faire un fetch ici
    tempo = setInterval(timerForQuestion, 1000);

    document.querySelector('.life').innerHTML = 'Vies restantes : ' + life;
}

if (document.URL.indexOf('question.php') > -1) {
    document.querySelector('a[data-quizz="play"]').addEventListener('click', (event) => {
        tempo = setInterval(timerForQuestion, 1000);
    });
}
