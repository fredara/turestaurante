let modalPed = document.getElementById('modalPed');
let flexSideBar = document.getElementById('flexSideBar');
function OpenPedido() {
    //console.log("open");
    /*document.getElementById("modalPedidosId").style.width = "80%";
    //document.getElementById("main").style.marginRight = "80%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.6)";
    document.getElementById("BtnAbrirPedidos").style.display = "none";*/
    document.getElementById("BtnAbrirPedidos").style.display = "none";
    modalPed.style.display = 'block';
}





/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
 /* document.getElementById("modalPedidosId").style.width = "0";
  //document.getElementById("main").style.marginRight = "0";
  document.body.style.backgroundColor = "";*/
  document.getElementById("BtnAbrirPedidos").style.display = "Block";
  modalPed.style.display = 'none';
}





window.addEventListener('click', function(e){
   
    //console.log("target",e.target.nodeName);
    //if(e.target.nodeName == 'HTML'){
    if(e.target == flexSideBar){
        console.log("entra");
        /*document.getElementById("modalPedidosId").style.width = "0";
        document.body.style.backgroundColor = "";*/
        document.getElementById("BtnAbrirPedidos").style.display = "Block";
        modalPed.style.display = 'none';
    }
});