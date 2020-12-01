<?php
session_start();
extract($_REQUEST);
require_once("../clases/pedido.php");

switch ($operacion){

	//crear pedido
    case "gdp": 
        $ped = new Pedidos();
        $codigo_verificado = true;
        while($codigo_verificado==true){
            $id_pedido = rand(000000,999999);
            $existe = $ped->getIDPedido($id_pedido);
            
            if(empty($existe)){
                $codigo_verificado = false;
            }
        }   
            echo "asdada";
        break;
        $resp = new stdClass();
        if(!empty($id_pedido) and  !empty($nombre) and !empty($apellido) and !empty($selecDirec) and !empty($direccion) and !empty($nroDirec) and !empty($direcEspe) and !empty($barrio) and !empty($tipoDirec) and !empty($indicacion) and !empty($telefono) and !empty($correo)  ){

            $error = $ped->AddPedido($id_pedido, $nombre, $apellido, $selecDirec, $direccion, $nroDirec, $direcEspe,$barrio, $tipoDirec, $indicacion, $telefono, $correo);

            if ($error != 'OK') {
                $resp->msg = "Falla en el proceso de Guardado";
                $resp->msg2 = "Lo Resolveremos lo mas pronto Posible.";
                $resp->acc = "Error";
                $json = json_encode($resp);
                echo $json;
            } else {
                $precioTotal=0;
                $i=count($descrip);
                for ($j=0;$j<$i;$j++) {
                    $precioTotal = $precioTotal + $cantixpre[$j];
                    $ped->addPedidoDetalle($ped->cod_pedido, $descrip[$j], $cantixpre[$j]);
                }

                $ped->modPedidoMontos($ped->cod_pedido, $precioTotal);
                $resp->msg = "Pedido Registrado con Exito";
                $resp->msg2 = "Gracias";
                $resp->acc = "Guarda";
                $json = json_encode($resp);
                echo $json;
            }
            
            

        }else{
            $resp->msg = "Faltan Datos Para Procesar";
            $resp->msg2 = "Por Favor Ingrese los datos";
            $resp->acc = "Error";
            $json = json_encode($resp);
            echo $json;
        }
	break;	
	
	
	default:
		header("Location:../index.php");
	break; 
}
?>