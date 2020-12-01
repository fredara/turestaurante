
	// Get the modal
var modal = document.getElementById("myModal");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("BtnAbrirPedidos").style.display = "Block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("BtnAbrirPedidos").style.display = "Block";
  }

}

$( document ).ready(function() {
      modal.style.display = "block";
      document.getElementById("BtnAbrirPedidos").style.display = "none";
	});
