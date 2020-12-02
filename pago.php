<?php
extract($_REQUEST);
//print_r($cod_producto_extra);
//echo "--------------";

  ?>
<!doctype html>
    <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="icon" href="img/logoico.png" type="image/png" />
        <title>Restaurante</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="css/piedepagina.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/categorias.css" rel="stylesheet" />
<link href="css/Menus.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
 <!-- estilos del modal de platos />-->
<link href="css/modal2.css" rel="stylesheet" />
<!-- estilos del modal de Extras />-->
<link href="css/modalextras.css" rel="stylesheet" />
<!-- estilos del modal Pedidos  />-->
<link href="css/sidebar.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/formulario.css">
        <link rel="stylesheet" href="css/pagoModal.css">
  


         <!--
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       -->

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
      function guardaData() {
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var selecDirec = $("#selecDirec").val();
        var direccion = $("#direccion").val();
        var nroDirec = $("#nroDirec").val();
        var direcEspe = $("#direcEspe").val();
        var barrio = $("#barrio").val();
        var tipoDirec = $("#tipoDirec").val();
        var indicacion = $("#indicacion").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var efectivo = $("#efectivo").val();
        var bancoConsig = $("#bancoConsig").val();
        var nequi = $("#nequi").val();

        var campos = document.getElementsByName('descrip[]').length;
        let descrip=[];let cantidad=[];let cantixpre=[];
        for(var i=0; i < campos; i++) {
          if(document.getElementById('descrip'+i)) {
              descrip.push(document.getElementById('descrip'+i).value);
          }
          if(document.getElementById('cantidad'+i)) {
              cantidad.push(document.getElementById('cantidad'+i).value);
          }
          if(document.getElementById('cantixpre'+i)) {
            cantixpre.push(document.getElementById('cantixpre'+i).value);
          }
        }


        var campos_extra = document.getElementsByName('descripcion_extra[]').length;
        let descripcion_extra=[];let cantidad_extra=[];let cantxprecioExtra=[];
        for(var k=0; k < campos_extra; k++) {
          if(document.getElementById('descripcion_extra'+k)) {
              descripcion_extra.push(document.getElementById('descripcion_extra'+k).value);
          }
          if(document.getElementById('cantidad_extra'+k)) {
              cantidad_extra.push(document.getElementById('cantidad_extra'+k).value);
          }
          if(document.getElementById('cantxprecioExtra'+k)) {
            cantxprecioExtra.push(document.getElementById('cantxprecioExtra'+k).value);
          }
        }
        
        //console.log(descrip);
        
        var operacion = 'gdp';
        
        if(nombre!='' && apellido!='' && selecDirec!='' && direccion!='' && nroDirec!='' && direcEspe!='' && barrio!='' && tipoDirec!='' && indicacion!='' && telefono!='' && correo!='') {
          //console.log("tiene todos los datos entra");
          $.get("controlador/pedido.controller.php",
            { 
              operacion: operacion, 
              nombre: nombre,
              apellido: apellido,
              selecDirec: selecDirec,
              direccion: direccion,
              nroDirec: nroDirec,
              direcEspe: direcEspe,
              barrio: barrio,
              tipoDirec: tipoDirec,
              indicacion: indicacion,
              telefono: telefono,
              correo: correo,
              efectivo: efectivo,
              bancoConsig: bancoConsig,
              nequi: nequi,
              descrip: descrip,
              cantidad: cantidad,
              cantixpre: cantixpre,
              descripcion_extra: descripcion_extra,
              cantidad_extra: cantidad_extra,
              cantxprecioExtra: cantxprecioExtra
             




            },
            function(resultado){
                console.log(resultado); 
                if(resultado){
                  document.getElementById("mensajeModal").innerHTML = resultado.msg;
                  document.getElementById("Mensaje2Modal").innerHTML = resultado.msg2;
                  modal.style.display = 'block'; 

                  setTimeout(function(){location.href="index.html";},3000);
                  return false;
                }else{
                  document.getElementById("mensajeModal").innerHTML = "Error";
                  document.getElementById("Mensaje2Modal").innerHTML = "Por Favor Contacte a Soporte";
                  modal.style.display = 'block';
                  return false;
                }
            },
            'json'

          );
        }else{
          document.getElementById("mensajeModal").innerHTML = 'Falta Informacion Necesaria';
          document.getElementById("Mensaje2Modal").innerHTML = 'Por Favor Ingrese los datos Faltantes';
          modal.style.display = 'block';
        }
        
        return false;
      }

      function blockSubmit(){
        document.getElementById("button3").disabled = true;

        guardaData();
      }
  </script>

    </head>
    <!-- Load Facebook SDK for JavaScript -->
    
<body >



<div id="miModal" class="modal">
    <div class="flex" id="flex">
      <div class="contenido-modal">
        <div clashttp://localhost/tronsal/images/logo_1.pngs="modal-header flex">
          
          <p style="margin-left: 160px;" style=" font-size:35px;">AVISO</p>

          <span class="close" id="close">&times;</span>
        </div>
        
        <div class="modal-body">
          <p id="mensajeModal">Por Favor Espere...</p>
          <br>
          <p id="Mensaje2Modal">Se Están Acutalizando los Precios de los Productos. Gracias</p>     
        </div>
        <div class="footer">
          <h3>Tu Restaurante &copy;</h3>
        </div>
      </div>
    </div>
  </div>





  
 

      
      

   <section class="formulariogg" >
      <span><h1 class="sec1pago">Detalles de Pedido</h1></span>
      <hr class="lineapago">
      <div class="container">
        <div class="row"> 
          <div class="col-md-3">
          </div>
          <div class="col-md-6 text-center">
            <form onsubmit="return guardaData()">
           <!--<form action="controlador/pedido.controller.php" method="post" enctype="multipart/form-data" name="form1" id="form1">-->
              <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Nombre:</span>
             </div>
             <div class="form-row col-md-12">
               <input class="form-control-pago"   type="text" name="nombre" id="nombre" placeholder="" required>
              </div>
                <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Apellidos:</span>
             </div>
             <div class="form-row col-md-12">
               <input class="form-control-pago"   type="text" name="apellido" id="apellido" placeholder="" required>
              </div>
                 <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Tu Direccion:</span>
             </div>
             <div class="form-row col-md-12">
<div class="form-row col-md-6">
              <select class="form-control-pago" name="selecDirec" id="selecDirec" >
                 <option value="">Seleccione</option>
                 <option value="Calle">Calle</option>
                 <option value="Carrera">Carrera</option>
                 <option value="Diagonal">Diagonal</option>
                 <option value="Transversal">Transversal</option>
                 <option value="Avenida">Avenida</option>
                 <option value="Manzana">Manzana</option>
                 <option value="Kilometro">Kilómetro</option>
                 <option value="Via">Vía</option>
               </select>
</div>
&nbsp;
<div class="form-row col-md-6">
               <input class="form-control-pago"   type="text" id="direccion" name="direccion" placeholder="" required>
               </div>
               
              </div>

                <div class="form-row col-md-12" style="margin-top: 10px;">
<div class="form-row col-md-6">
              <input class="form-control-pago"   type="text" id="nroDirec" name="nroDirec" placeholder="#" required>
</div>
&nbsp;
<div class="form-row col-md-6">
               <input class="form-control-pago"   type="text" name="direcEspe" id="direcEspe" placeholder="" required>
               </div>
               
              </div>
              <div class="form-row col-md-12" style="margin-top: 10px;">
               <input class="form-control-pago"   type="text" name="barrio" id="barrio" placeholder="Barrio" required>
              </div>

              <div class="form-row col-md-12" style="margin-top: 10px;">
                <select class="form-control-pago" name="tipoDirec" id="tipoDirec" >
                 <option>Seleccione tipo</option>
                 <option>Casa</option>
                 <option>Apartamento</option>
                 <option>Oficina</option>
                 <option>Otro</option>
               
               </select>
              </div>
                <div class="form-row col-md-12" style="margin-top: 10px;">
                  <textarea class="form-control-pago" name="indicacion" id="indicacion" placeholder="Indicación" required></textarea>
               
              </div>
               <div class="form-row col-md-12" style="margin-top: 10px;">
                   <label>&nbsp;</label>
               
              </div>
               
                 <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Telefono:</span>
             </div>
             <div class="form-row col-md-12">
               <input class="form-control-pago"   type="text" id="telefono" name="telefono" placeholder="" required>
              </div>
                 <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Correo Electronico:</span>
             </div>
             
             <div class="form-row col-md-12">
               <input class="form-control-pago"   type="text" id="correo" name="correo" placeholder="" required>
              </div>
               <div class="form-group col-md-12">
                <div class="custom-control custom-checkbox">
                  
                  <label style="color: #9f6f08; font-family: Arial Rounded MT Bold ; font-weight: normal;font-size: 21px;">Paga tu pedido al momento de la entrega</label>
                </div>
              </div>
                 <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Elige el metodo que utilizaras:</span>
             </div>
             
              <div class="">
                  <span class="input-group-text-pago">Efectivo<input type="checkbox" value="n"   id="efectivo" name="efectivo"></span>
                </div>
                   <div class="">
                  <span class="input-group-text-pago">Consignacion Bancolombia<input type="checkbox" value="n"   id="bancoConsig" name="bancoConsig"></span>
                </div>
                   <div class="">
                  <span class="input-group-text-pago">Nequi<input type="checkbox" value="n"   id="nequi" name="nequi"></span>
                </div>
            
                <div class="input-group">
                 <span style="color: #9f6f08;margin-top: 10px;font-size:21px;font-weight: bold;">Tu Pedido:</span>
             </div>

               <div class="input-group-indicepago">
                    <tr>
                                        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="texto">
                                          
                                           <tr >
                                           
                                            <td  align="left" width="3%" ><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong>PRODUCTO</strong></span></td>
                                            
                                          
                                            <td align="right" width="19%" ><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong>VALOR</strong></span></td>
                                           
                                          </tr>
                                         
             </div>
</table>
</td>
</tr>
 <div class="input-group" style="margin-top: 20px;">
                    <tr>
                                        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="texto">
<?php
$total=0;
$c=0;
                                    foreach ($cod_producto as $id) {
                                      
                                   $total=$total+$cantxprecio[$id];
?>
                                          
                                           <tr >
                                           
                                            <td colspan="2"  align="left" ><span style="color: #9f6f08;font-size:16px;font-weight: bold;"><strong><?php echo $descripcion[$id] ?> X<?php echo $cantidad[$id]?></strong></span>
                                            <input type="hidden" name="descrip[]" value="<?php echo $descripcion[$id]?>" id="descrip<?php echo $c?>" >
                                            <input type="hidden" name="cantidad[]" value="<?php echo $cantidad[$id]?>" id="cantidad<?php echo $c?>" >
                                            </td>
                                            
                                          
                                            <td align="right" width="19%" ><span style="color: #9f6f08;font-size:16px;font-weight: bold;"><strong><?php echo "$".$cantxprecio[$id] ?></strong></span>
                                            <input type="hidden" name="cantixpre[]" value="<?php echo $cantxprecio[$id]?>" id="cantixpre<?php echo $c?>" >
                                            </td>
                                           
                                          </tr>
<?php $c=$c+1;} ?>
<?php
$k=0;
if (!empty($cod_producto_extra)) {

                                    foreach ($cod_producto_extra as $id_extra) {
                                   $total=$total+$cantxprecioExtra[$id_extra];
?>
                                          
                                           <tr >
                                           
                                            <td colspan="2"  align="left" ><span style="color: #9f6f08;font-size:16px;font-weight: bold;"><strong><?php echo $descripcion_extra[$id_extra] ?> X<?php echo $cantidad_extra[$id_extra]?></strong></span>
                                            <input type="hidden" name="descripcion_extra[]" value="<?php echo $descripcion_extra[$id_extra]?>" id="descripcion_extra<?php  echo $k?>" >
                                            <input type="hidden" name="cantidad_extra[]" value="<?php echo $cantidad_extra[$id_extra]?>" id="cantidad_extra<?php  echo $k?>" >
                                          </td>
                                            
                                          
                                            <td align="right" width="19%" ><span style="color: #9f6f08;font-size:16px;font-weight: bold;"><strong><?php echo "$".$cantxprecioExtra[$id_extra] ?></strong></span>
                                            <input type="hidden" name="cantxprecioExtra[]" value="<?php echo $cantxprecioExtra[$id_extra]?>" id="cantxprecioExtra<?php  echo $k?>" >
                                          </td>
                                           
                                          </tr>
<?php } 
} ?>
   <tr>
                   <td valign="top" colspan="3">&nbsp;</td>
                 </tr>
                
                                      
                                      
                                     

                                           
                                         
           
</table>
</td>
</tr>
  <tr>
                                        <td valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="texto">

 <tr>
                                           
                                            <td style=" background-color: #ffd388;
      border-radius: 10px;
      -webkit-box-shadow: none !important;
  box-shadow: none !important;
  padding: 10px 10px;
  height: 50px;" class="input-group-total" align="left"  ><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong>Sub Total</strong></span><br><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong>Total</strong></span></td>
  <td valign="top" colspan="">&nbsp;</td>
  <td class="input-group-total" align="right"  ><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong><?php echo "$".$total?></strong></span><br><span style="color: #9f6f08;font-size:20px;font-weight: bold;"><strong><?php echo "$".$total?></strong></span></td>
                                            
                                          
                                            
                                           
                                          </tr>

     <tr>
                   <td valign="top" colspan="3">&nbsp;</td>
                 </tr>

     <tr>
                   <td valign="top" colspan="3">
                 
              <input name="button3" type="submit" class="finaPedido_btn" id="button3" value="Realizar Pedido" onclick="blockSubmit();"  />
              <!--<input name="operacion" type="hidden" class="operacion" id="operacion" value="gdp" />-->
            </td>
</tr>

     <tr>
                   <td valign="top" colspan="3" style="color: #9f6f08;font-size:17px;font-weight: bold;">¿Tienes alguna duda?;</td>
                 </tr>

 <tr>
                   <td valign="top" colspan="3">
                 
              <a target="_blank" title="Click para chatear" href="https://api.whatsapp.com/send?phone=584247477830&text=Hola%20estoy%20interesado%20en%20hacer%20un%20pedido%20necesito%20mas%20informacion" target="_blank" rel="noopener"  class="preguntarpor" name="preguntarpor" >Preguntar Por <span class="fa fa-whatsapp"></span></a>
</tr>
                 


                                        </table>
                                      </td>
                                    </tr>


                                    <tr>
                   <td valign="top" colspan="3">&nbsp;</td>
                 </tr>
                  <tr>
                   <td valign="top" colspan="3">&nbsp;</td>
                 </tr>
                  <tr>
                   <td valign="top" colspan="3">&nbsp;</td>
                 </tr>


          
          
  
              
              </div>
            </form>
          </div>
   
         
      <br><br>
    </section>   
  

      

   <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>

   <script type="text/javascript">
let modal = document.getElementById('miModal');
let flex = document.getElementById('flex');

let cerrar = document.getElementById('close');

    //modal.style.display = 'block';

cerrar.addEventListener('click', function(){
    modal.style.display = 'none';
});

window.addEventListener('click', function(e){
    //console.log(e.target);
    if(e.target == flex){
        modal.style.display = 'none';
    }
});


		
</script>

</div>
    </body>
</html>
