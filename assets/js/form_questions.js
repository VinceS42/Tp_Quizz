// const responses = document.querySelectorAll('.response');

// responses.forEach(response => {
//   response.addEventListener('click', (e) => {
//     e.preventDefault();

//     const randomValue = response.innerHTML;
    
//     responses.forEach(element => {
//       if (randomValue === 'Paris') {
//         if (element === response) {
//           element.classList.add('bg-success'); // Réponse correcte mise en vert
//         } else {
//           element.classList.add('bg-danger'); // Autres réponses mises en rouge
//         }
//       } else {
//         if (element.innerHTML === 'Paris') {
//           element.classList.add('bg-success'); // Réponse incorrecte (Paris) mise en vert
//         } else {
//           element.classList.add('bg-danger'); // Autres réponses mises en rouge
//         }
//       }
//     });

//     disableButtons();
//   });
// });

// function disableButtons() {
//   responses.forEach(response => {
//     response.disabled = true;
//   });
// }
        //response.removeEventListener('click', (e) => {})
  
// async function fetch () {
//     const response = await fetch('../process/process.php')
//     if (response.ok === true) {
//         return result.text()
//         return console.log(body);
//         }
//         throw new Error('impossible to fetch')
// }

const responses = document.querySelectorAll('.response');

responses.forEach(response => {
  response.addEventListener('click', (e) => {
    e.preventDefault();

    const randomValue = response.innerHTML;

    if (randomValue === 'Paris') { 

        reponse()

    } else {

        reponse()

    }

    disableButtons();

    const questionblock = document.querySelector('.question');

    const nextButton = document.createElement('button');
    nextButton.textContent = 'Suivant';
    nextButton.classList.add('next');
    questionblock.appendChild(nextButton);

  });
});

function disableButtons() {
  responses.forEach(response => {
    response.disabled = true;
  });
}

function reponse() {
    
    responses.forEach(reponse => {
        if (reponse.innerHTML === 'Paris') {
            reponse.classList.add('bg-success'); 
        } else {
            reponse.classList.add('bg-danger'); 
        }
      });

}

async function fetch() {
    const response = await fetch('../api.php') 
        if (response.ok === true) {
            return reponse.text()
    } 
    throw new Error('impossible to fetch')
}