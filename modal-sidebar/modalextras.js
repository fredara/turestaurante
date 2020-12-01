let modalExtras = document.getElementById('mimodalExtras');
let flexExtras = document.getElementById('flexExtras');


function abreModalExtras(){
    console.log("click en abrir modal extras");
    modalExtras.style.display = 'block';
}

var act1 = false;
var act2 = false;
var act3 = false;
window.addEventListener('click', function(e){
    if(e.target == flexExtras){
        modalExtras.style.display = 'none';

        if (document.getElementById('extras1').checked==true) { 
            if (act1==false) {
                $("#extrasAgg").append('<span id="msg_extra1">Agregado: '+direc.extra1_descrip+'  $'+direc.extra1_precio+'<br></span>');
                 act1 = true;
            }
            
        }else{
            $("#msg_extra1").remove();
            act1 = false;
        }



        if (document.getElementById('extras2').checked==true) { 
            if (act2==false) {
                $("#extrasAgg").append('<span id="msg_extra2">Agregado: '+direc.extra2_descrip+'  $'+direc.extra2_precio+'<br></span>'); 
                act2 = true;
            }
        }else{
            $("#msg_extra2").remove();
            act2 = false;
        }




        if (document.getElementById('extras3').checked==true) { 
            if (act3==false) {
                $("#extrasAgg").append('<span id="msg_extra3">Agregado: '+direc.extra3_descrip+'  $'+direc.extra3_precio+'<br></span>');
                act3 = true;                
            }
        }else{
            $("#msg_extra3").remove();
            act3 = false;
        }


    }
});