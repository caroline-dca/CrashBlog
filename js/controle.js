// // // // NOUVELLE CATEGORIE // // // //

var DOMcategorie = document.getElementsByName('Categorie');
var RadioNewCat = DOMcategorie[DOMcategorie.length - 1];
var DOMnewCat = document.getElementById('newCat');

DOMnewCat.addEventListener('keydown', function(){
  RadioNewCat.checked = true;
});
