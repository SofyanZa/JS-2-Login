var app = {
  init: function() {
    // On peut ajouter des propriétés à un objet sans les avoir déclarés avant
    // On ajoute donc la propriété fieldUsername à app et elle contient une référence à l'input de l'identifiant
    // app.fieldUsername = document.querySelector('#field-username');

    // On déclare au même endroit toutes les propriétés qui permettent de manipuler le DOM pour notre formulaire
    app.fields = document.querySelectorAll('.field-input');
    app.loginForm = document.getElementById('login-form');
    app.errorArea = document.querySelector('#errors');

    // On ajoute les écouteurs d'événement » nos inputs
    // app.fieldUsername.addEventListener('blur', app.isInputInvalid);
    for (var fieldIndex = 0;fieldIndex < app.fields.length;fieldIndex += 1) {
      // On récupère l'input à l'index courant
      var field = app.fields[fieldIndex];
      // On ajoute l'eventListener à cet input
      field.addEventListener('blur', app.isInputInvalid);
    }

    // On ajoute un écouteur d'événement à notre formulaire
    app.loginForm.addEventListener('submit', app.isValidForm);

  },
  isInputInvalid: function(event) {
    // event fait référence à l'événement qui a exécuté notre fonction
    // event.target fait référence à l'élément de DOM concerné par l'événement qui a déclenché notre fonction
    // event.target.value fait donc référence au texte de l'input concerné par l'événement, on le stocke dans la variable typedText
    // var typedText = event.target.value; On n'en a plus besoin
    // console.log(typedText);

    app.checkField(event.target);
  },
  isValidForm: function(event) { // parfois dans le code on écrit evt au lieu de event
    // Cette instruction est utilie pour développer, on l'enlève dès que tout fonctionne
    // event.preventDefault();
    
    // avant de faire nos vérifications, on réinitialise le ocntenu de la div#erors
    app.errorArea.innerHTML = '';

    // Pour éviter d'utiliser innerHTML pour vider la zone d'erreur, on pourrait aussi utiliser le code suivant (merci Thomas B) :
    // while (app.errorArea.firstChild) {
    //   app.errorArea.removeChild(app.errorArea.firstChild);
    // }

    for (var fieldIndex = 0;fieldIndex < app.fields.length;fieldIndex += 1) {
      var currentField = app.fields[fieldIndex];
      // On vérifie que les deux champs sont valides
      if(app.checkField(currentField) == false) {
        // Si app.checkField() retourne false, il y a une erreur dans l'input
        // On doit afficher un message et empêcher l'envoi du formulaire
        event.preventDefault();

        // On a utilisé la propriété innerHTML de notre élément mais on va plut-ot se servir de createElement() et appendchild()
        // app.errorArea.innerHTML += '<p>' + currentField.placeholder +' doit contenir au moins 3 caractères</p>';
        // On crée un élément P vide, c'est un élément du DOM mais il n'est pas placé dans la page
        var newErrorElement = document.createElement('p');
        // On précise ensuite le contenu de ce P
          // On crée un noeud de texte dans le DOM (qui n'est pas encore placé)
        var newErrorText = document.createTextNode(currentField.placeholder +' doit contenir au moins 3 caractères');
        newErrorElement.appendChild(newErrorText);
        // On indique ensuite que ce P devient l'enfant de la div#errors
        app.errorArea.appendChild(newErrorElement);

        // console.error('ce champs est invalide');
      }
    }
  },
  checkField: function(field) {
    if(field.value.length < 3) {
      // Avec className, on modifie directement la valeur de l'attribut class de l'input
      // field.className = 'field-input invalid';

      // Ce serait plus pratique et plus facile d'utiliser la propriété classList
      field.classList.remove('valid');
      field.classList.add('invalid');
      return false;
    } else {
      // field.className = 'field-input valid';
      field.classList.add('valid');
      field.classList.remove('invalid');
      return true;
    }
  }
};

document.addEventListener('DOMContentLoaded', app.init);
