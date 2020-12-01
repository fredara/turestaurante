let objPlatos = {
    plato1:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu1/1.png',
        precio:'13.000',
        decrip:'Proteina Baby Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas'
    },
    plato2:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu2/2.png',
        precio:'10.000',
        decrip:'Plato 2 Baby Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas'  
    },
    plato3:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu3/3.png',
        precio:'15.000',
        decrip:'Plato3 Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas'
    },
    plato4:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu4/4.png',
        precio:'12.000',
        decrip:'Plato 4 Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas'
    }

};


console.log("precioplato1",objPlatos.plato1.precio);

let precioModalPlato = document.getElementById('precioModalPlato');
let fondoImagenModal = document.getElementById("modal-headerdos");
let descPla = document.getElementById("DescripPlato");
let btnaddPlato = document.getElementById("btnaddPlato");



function CargarPlato2(val){
    //console.log(val.id);

    let direc = traeDataModalPlato(val.id);
    
    //console.log("direc img", direc.imagenPlato);

    precioModalPlato.innerHTML='$'+direc.precio;
    fondoImagenModal.style.backgroundImage ="url("+direc.imagenPlato+")";
    descPla.innerHTML=direc.decrip;
    btnaddPlato.innerHTML='Añadir al Pedido ($'+direc.precio+')';
    
    
    modaldos.style.display = 'block';


}

function traeDataModalPlato(plato){
    if (plato=='plato1') {
        return objPlatos.plato1;
    }
    if (plato=='plato2') {
        return objPlatos.plato2;
    }
    if (plato=='plato3') {
        return objPlatos.plato3;
    }
    if (plato=='plato4') {
        return objPlatos.plato4;
    }

}




let modaldos = document.getElementById('mimodalPlato');
let flexdos = document.getElementById('flexdos');

let cerrardos = document.getElementById('closedos');


cerrardos.addEventListener('click', function(){
    modaldos.style.display = 'none';
});

window.addEventListener('click', function(e){
    //console.log(e.target);
    if(e.target == flexdos){
        modaldos.style.display = 'none';
        cantPlato.value=1;
    }
});



//Suma o resta a la cantidad del plato actual
let cantPlato = document.getElementById('inputcantidos');

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

