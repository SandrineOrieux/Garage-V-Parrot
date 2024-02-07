//import { startStimulusApp } from '@symfony/stimulus-bundle';
import 'bootstrap';
//const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);


$(document).ready(function () {
  // Cette fonction est exécutée lorsque le document est entièrement chargé
  // Elle sélectionne tous les éléments avec la classe .carousel et initialise chaque carrousel
  $('.carousel').carousel();

});