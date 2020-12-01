let objPlatos = {
    plato1:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu1/1.png',
        precio:'13.000',
        decrip:'Proteina Baby Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas',
        extra1_descrip:'Queso Paisa En Cubos',
        extra1_precio:'3.000',
        extra1_img:'../images/Categorias/default.png',
        extra2_descrip:'Cebolla Caramelizada',
        extra2_precio:'2.000',
        extra2_img:'../images/Categorias/default.png',
        extra3_descrip:'Pepinos con Limon',
        extra3_precio:'2.500',
        extra3_img:'../images/Categorias/default.png'
    },
    plato2:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu2/2.png',
        precio:'10.000',
        decrip:'Plato 2 Baby Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas',
        extra1_descrip:'Queso Paisa En Cubos',
        extra1_precio:'3.000',
        extra1_img:'../images/Categorias/default.png',
        extra2_descrip:'Cebolla Caramelizada',
        extra2_precio:'2.000',
        extra2_img:'../images/Categorias/default.png',
        extra3_descrip:'Pepinos con Limon',
        extra3_precio:'2.500',
        extra3_img:'../images/Categorias/default.png'
    },
    plato3:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu3/3.png',
        precio:'15.000',
        decrip:'Plato3 Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas',
        extra1_descrip:'Queso Paisa En Cubos',
        extra1_precio:'3.000',
        extra1_img:'../images/Categorias/default.png',
        extra2_descrip:'Cebolla Caramelizada',
        extra2_precio:'2.000',
        extra2_img:'../images/Categorias/default.png',
        extra3_descrip:'Pepinos con Limon',
        extra3_precio:'2.500',
        extra3_img:'../images/Categorias/default.png'

    },
    plato4:{
        imagenPlato:'../images/Categorias/PARRILLAS/menu4/4.png',
        precio:'12.000',
        decrip:'Plato 4 Beff 300gr sazonada con salsa especial de ajo, tomillo, laurel y pimenton. Zanahorias, Cebollas. Incluye tambien: papas en rodajas',
        extra1_descrip:'Queso Paisa En Cubos',
        extra1_precio:'3.000',
        extra1_img:'',
        extra2_descrip:'Cebolla Caramelizada',
        extra2_precio:'2.000',
        extra2_img:'',
        extra3_descrip:'Pepinos con Limon',
        extra3_precio:'2.500',
        extra3_img:''
    }

};


//console.log("precioplato1",objPlatos.plato1.precio);

let precioModalPlato = document.getElementById('precioModalPlato');
let fondoImagenModal = document.getElementById("modal-headerdos");
let descPla = document.getElementById("DescripPlato");
let btnaddPlato = document.getElementById("btnaddPlato");
let direc;

let DescripExtra1 = document.getElementById("DescripExtra1");
let DescripExtra2 = document.getElementById("DescripExtra2");
let DescripExtra3 = document.getElementById("DescripExtra3");

function CargarPlato2(val){
    //console.log(val.id);
    cantPlato = document.getElementById('inputcantidos');
    direc = traeDataModalPlato(val.id);
    
    //console.log("direc img", direc.imagenPlato);

    precioModalPlato.innerHTML='$'+direc.precio;
    fondoImagenModal.style.backgroundImage ="url("+direc.imagenPlato+")";
    descPla.innerHTML=direc.decrip;
    btnaddPlato.innerHTML='Añadir al Pedido ($'+direc.precio+')';
    cod_plato = val.id;
    modaldos.style.display = 'block';
    document.getElementById("BtnAbrirPedidos").style.display = "none";

    //carga extras
    DescripExtra1.innerHTML=direc.extra1_descrip+' $'+direc.extra1_precio+' <input type="checkbox" name="extras[0]" id="extras1">';
    DescripExtra2.innerHTML=direc.extra2_descrip+' $'+direc.extra2_precio+' <input type="checkbox" name="extras[1]" id="extras2">';
    DescripExtra3.innerHTML=direc.extra3_descrip+' $'+direc.extra3_precio+' <input type="checkbox" name="extras[2]" id="extras3">';

}
let ContenidoPedidosModal = document.getElementById('moda_contenido_pedidos');
let nroItem=0;
let CamExt = 0;
function AgregaPlatoalPedido(){
    document.getElementById('footer-sidebar').style.position = 'relative';
    //direc $("#pedido_t").append
    //console.log("erntreaneel boton agregar");
    nroItem=nroItem+1;

    preciosinPunto = cleanChar(direc.precio, '.');

    let cantxprecio = parseFloat(preciosinPunto) * parseFloat(cantPlato.value);
    cantxprecioFormat = humanizeNumber(cantxprecio);
    $("#moda_contenido_pedidos").append('<div class="modal_items" id="modal_items'+nroItem+'"><div class="itemAgregado1"><img src="'+direc.imagenPlato+'"  class="img-item-Pedido"><strong class="btn-quitaritem" onclick="javascript:borrar(' + nroItem + ');sumacampos('+nroItem+','+CamExt+');">Quitar</strong></div><div class="itemAgregado2"><div class="itemAgregado2"><div class="Deta-Item"><span><strong>'+direc.decrip+'</strong></span><p><span><strong>'+cantPlato.value+'x</strong></span> $'+direc.precio+' = $'+cantxprecioFormat+' <input type="hidden" id="cantxprecio'+nroItem+'" value="'+cantxprecio+'"><input type="hidden" name="cod_producto[]" id="cod_producto'+nroItem+'" value="'+cod_plato+'"><input type="hidden" name="cantidad[]" id="cantidad'+nroItem+'" value="'+cantPlato.value+'"></p></div></div></div><br></div>');



    for (let i = 1; i < 4; i++) {
        if (i==1) {
            var precio_extra = direc.extra1_precio;
            var img_extra = direc.extra1_img;
            var descrip_extra = direc.extra1_descrip;
        }
        if (i==2) {
            var precio_extra = direc.extra2_precio;
            var img_extra = direc.extra2_img;
            var descrip_extra = direc.extra2_descrip;
        }
        if (i==3) {
            var precio_extra = direc.extra3_precio;
            var img_extra = direc.extra3_img;
            var descrip_extra = direc.extra3_descrip;
        }
       
        console.log("el precio es :", precio_extra);
        if (document.getElementById("extras"+i).checked==true) {
            CamExt = CamExt + 1;
            precioExtraFormat = humanizeNumber(precio_extra);
            precioExtraSinP = cleanChar(precio_extra, '.');
            $("#moda_contenido_pedidos").append('<div class="modal_items" id="modal_itemsExtra'+CamExt+'"><div class="itemAgregado1" style="flex: 0 1 0;"><img src="'+img_extra+'"  class="img-item-Pedido"><strong class="btn-quitaritem" onclick="javascript:borrarExtra(' + CamExt + ');sumacampos('+CamExt+','+CamExt+');">Quitar</strong></div><div class="itemAgregado2"><div class="itemAgregado2"><div class="Deta-Item"><span><strong>'+descrip_extra+'</strong></span><p><span><strong>1 x </strong></span> $'+precio_extra+' = $'+precio_extra+' <input type="hidden" id="cantxprecioExtra'+CamExt+'" value="'+precioExtraSinP+'"><input type="hidden" name="cod_producto[]" id="cod_producto'+CamExt+'" value="'+cod_plato+'"><input type="hidden" name="cantidad[]" id="cantidad'+CamExt+'" value="1"></p></div></div></div><br></div>');
        }
    }


    //cierra el modal del plato
    modaldos.style.display = 'none';
    direc='';
    if (document.getElementById('extras1').checked==true) { 
        $("#msg_extra1").remove();
        act1 = false;
    }
    if (document.getElementById('extras2').checked==true) { 
        $("#msg_extra2").remove();
        act2 = false;
    }
    if (document.getElementById('extras3').checked==true) { 
        $("#msg_extra3").remove();
        act3 = false;
    }


    //abreModalPedido
    document.getElementById("BtnAbrirPedidos").style.display = "none";
    modalPed.style.display = 'block';

    sumacampos(nroItem, CamExt);

    

}
function borrar(cual) {
    console.log("cual borra", "#modal_items"+cual);
	$("#modal_items"+cual).remove();
	return false;
}
function borrarExtra(cual) {
	$("#modal_itemsExtra"+cual).remove();
	return false;
}
campos=1;
function sumacampos(id, CamExt) {
    var total = 0;
    if(id>=campos)
		campos=campos+1;
	for(var i=0; i < campos; i++) {
        if(document.getElementById('cantxprecio'+i)) {
            total=total+parseFloat(eval("document.getElementById('cantxprecio"+i+"').value"));
        }
    }


    if(CamExt>=campos)
		campos=campos+1;
	for(var i=0; i < campos; i++) {
        if(document.getElementById('cantxprecioExtra'+i)) {
            total=total+parseFloat(eval("document.getElementById('cantxprecioExtra"+i+"').value"));
        }
    }
    totalFormat = humanizeNumber(total);
    document.getElementById('Subtotal').innerHTML = 'SubTotal: $'+totalFormat;
}
        
function humanizeNumber(n) {
    /*n = n.toString()
    while (true) {
      var n2 = n.replace(/(\d)(\d{3})($|,|\.)/g, '$1.$2$3')
      if (n == n2) break
      n = n2
    }
    return n*/
    var value = n; 

    var num2 = value.toString().split('.');
    var thousands = num2[0].split('').reverse().join('').match(/.{1,3}/g).join('.');
    var decimals = (num2[1]) ? ','+num2[1] : '';

    var answer =  thousands.split('').reverse().join('')+decimals;
    return answer;
}
function cleanChar(str, char) {
   // console.log('cleanChar()'); // HACK: trace
    while (true) {
        var result_1 = str.replace(char, '');
        if (result_1 === str) {
            break;
        }
        str = result_1;
    }
    return str;
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
    document.getElementById("BtnAbrirPedidos").style.display = "Block";
    direc='';
});

window.addEventListener('click', function(e){
    //console.log(e.target);
    if(e.target == flexdos){
        modaldos.style.display = 'none';
        document.getElementById("BtnAbrirPedidos").style.display = "Block";
        cantPlato.value=1;
        direc='';
    }
});



//Suma o resta a la cantidad del plato actual
let cantPlato = document.getElementById('inputcantidos');

function CambiaCantidadPlato(op){
    var valorActual = parseFloat(cantPlato.value);
    
    
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
    //console.log("cantidad plato", cantPlato.value);
    var catFlo = parseFloat(cantPlato.value);
    //console.log("precio", direc.precio);
    preciosinP = cleanChar(direc.precio, '.');
    let sumaCantxPrecio = catFlo*preciosinP;

    //console.log("la suma es: ", sumaCantxPrecio);
    sumaCantxPrecio = humanizeNumber(sumaCantxPrecio);
    btnaddPlato.innerHTML='Añadir al Pedido ($'+sumaCantxPrecio+')';
}
//finde la funcion

