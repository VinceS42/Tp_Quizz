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

    test = test()
          
         test.then(result => { 
          console.log(result['reponse']);
          if (randomValue === result['reponse']) { 

              reponse(result)
      
          } else {
      
              reponse(result)
      
          }
      
          disableButtons();
      
          const questionblock = document.querySelector('.question');
      
          const nextButton = document.createElement('a');
          nextButton.textContent = 'Suivant';
          nextButton.classList.add('next');
          questionblock.appendChild(nextButton);
          nextButton.href = '/';                                          // pourquoi ça? on revient directement a la racine de la page (index.php)

        });
    });
      
  }); 

function disableButtons() {
  responses.forEach(response => {
    response.disabled = true;
  });
}

function reponse(result) {
    
    responses.forEach(response => {
        if (response.innerHTML === result['reponse']) {
            response.classList.add('bg-success'); 
        } else {
            response.classList.add('bg-danger'); 
        }
      });

}



async function test() {
  $input = document.querySelector('input[name=question]');
    const reponse = await fetch('../api.php?question=' + document.querySelector('input[name=question]').value); //fetch renvoie une promise, donc voila pourquoi je n'ai pas besoin d'en créer une nouvelle
    // { 
    //    method: 'GET',
    //    body: {"question": document.querySelector('input[name=question]').value['question']} //controler sur MDN fetch "FOURNIR VOTRE PROPRE OBJET REQUETE"
    //   }
    

        const data = await reponse.json();
        // const question = data.question;

        // console.log(data);



      // reponse.headers.forEach((value, name) => {
      //   console.log(`${name}: ${value}`);
      // });

      // reponse.headers.forEach
      // console.log(reponse.headers.get('question'))



    if (reponse.ok === true) {          
            return data;
    } 
    throw new Error('impossible to fetch')
}