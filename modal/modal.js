function CargarPlato(val){
    //console.log(val.id);

    modal.style.display = 'block';
}
//Suma o resta a la cantidad del plato actual
let cantPlato = document.getElementById('inputcanti');

function CambiaCantidadPlato(op){
    
    var valorActual = parseFloat(cantPlato.value);
    //console.log(cantPlato.value);
    if (cantPlato.value=='') {valorActual=0;}
    if (op=='menos') {
        //console.log("asda",valorActual);
        cantPlato.value=valorActual-1;
    }else{
        //console.log("massad",valorActual);
        cantPlato.value=valorActual+1;
    }
    if (cantPlato.value<1) {
        cantPlato.value=1;
    }
}
//finde la funcion


//funcion para que el campo de cantidad del plato sea solo numero
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
//finde la funcion



let modal = document.getElementById('miModal');
let flex = document.getElementById('flex');

let cerrar = document.getElementById('close');


cerrar.addEventListener('click', function(){
    modal.style.display = 'none';
});

window.addEventListener('click', function(e){
    //console.log(e.target);
    if(e.target == flex){
        modal.style.display = 'none';
    }
});
