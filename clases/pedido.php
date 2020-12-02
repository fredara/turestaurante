<?php

class Pedidos{

    var $cod_pedido, $fechaPedido, $horaEntrega, $lugarEntrega;
    var $primero,$ultimo,$total,$proximo,$anterior;

    //constructor de la clase
    function Pedidos(){
        $this->cod_pedido=$this->fechaPedido=$this->horaEntrega=$this->lugarEntrega="";
        $this->primero=$this->ultimo=$this->total=$this->proximo=$this->anterior="";
        include ("conexion.php");
    }
    
    //agrega un Pedido
    function AddPedido($id_pedido, $nombre, $apellido, $selecDirec, $direccion, $nroDirec, $direcEspe, $barrio, $tipoDirec, $indicacion, $telefono, $correo) {
    $err="OK";	
    $query="INSERT INTO tbl_pedido (id_pedido, nombre, apellido, selecDirec,  direccion, nroDirec, direcEspe, barrio, tipoDirec, indicacion, telefono, correo, estatus, fecha_creado) values ('$id_pedido', '$nombre', '$apellido', '$selecDirec', '$direccion', '$nroDirec', '$direcEspe', '$barrio', '$tipoDirec', '$indicacion', '$telefono', '$correo', 'Abierto', '".date('Y-m-d H:i:s')."')";
    $con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass);
    @mysqli_select_db($con,$this->vardb);
    $rs=@mysqli_query($con,$query);
    if ($rs) {
        $this->cod_pedido=@mysqli_insert_id($con);
    }else { 
        $err='X'; 
    }
    @mysqli_close($con);
    return $err;
    }



    //listar PRODUCTOS
    /*function listarPedido($buscar, $cod_pedido, $cod_cliente, $estatus, $desde, $hasta, $pag, $regxpag){
        if (empty($pag)) $pag=1;
        if (empty($regxpag)) $regxpag=15;
        $inic = ($pag * $regxpag) - $regxpag;
        $con=@mysql_connect($this->varhost,$this->varlogin,$this->varpass);
        @mysql_select_db($this->vardb);	
        if ($buscar == 4 and !empty($desde) and !empty($hasta)) {
            $desde=$this->FechaOriginal($desde);
            $hasta=$this->FechaOriginal($hasta);
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE (t1.fregistro>='$desde' AND t1.fregistro <= '$hasta') ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==3 and !empty($estatus)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.estatus='$estatus' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==2 and !empty($cod_cliente)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.cod_cliente = '$cod_cliente' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==1 and !empty($cod_pedido)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.cod_pedido ='$cod_pedido' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";
        } else {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente)  ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";
        }
        $rs=@mysql_query($query);
        if (@mysql_num_rows($rs)){ 
            $query="SELECT FOUND_ROWS()";
            $rss=@mysql_query($query);
            $this->total=@mysql_result($rss,0,'FOUND_ROWS()');
            while($obj = @mysql_fetch_object($rs)) {
                   $return[] = $obj;
            }
            $this->proximo = $pag + 1;
            $this->anterior = $pag - 1;
            $this->primero = $inic + 1;
            $this->ultimo=$inic + $regxpag;
            if ($this->total < $this->ultimo)
                $this->ultimo=$this->total;
        }
        
        @mysql_close();
        return $return;
    }



    //listar PRODUCTOS
    function listarServiciosActivos($buscar, $cod_pedido, $cod_cliente, $estatus, $desde, $hasta, $pag, $regxpag){
        if (empty($pag)) $pag=1;
        if (empty($regxpag)) $regxpag=15;
        $inic = ($pag * $regxpag) - $regxpag;
        $con=@mysql_connect($this->varhost,$this->varlogin,$this->varpass);
        @mysql_select_db($this->vardb);	
        if ($buscar == 4 and !empty($desde) and !empty($hasta)) {
            $desde=$this->FechaOriginal($desde);
            $hasta=$this->FechaOriginal($hasta);
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE (t1.fregistro>='$desde' AND t1.fregistro <= '$hasta') ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==3 and !empty($estatus)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.estatus='$estatus' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==2 and !empty($cod_cliente)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.cod_cliente = '$cod_cliente' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";	
        } elseif ($buscar==1 and !empty($cod_pedido)) {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) WHERE t1.cod_pedido ='$cod_pedido' ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";
        } else {
            $query="SELECT SQL_CALC_FOUND_ROWS t1.*, date_format(t1.fregistro, '%d/%m/%Y') as fechaR, t2.nombre_usuario, t2.apellido_usuario, t3.nombre_cliente, t4.nombre_conductor FROM tbl_pedido t1  left join tbl_usuario t2 on (t1.cod_usuario_creo=t2.cod_usuario) left join tbl_cliente t3 on (t1.cod_cliente=t3.cod_cliente) left join tbl_transporte_conductor t4 on (t1.cod_conductor=t4.cod_conductor) where t1.cod_conductor!='0'  ORDER BY t1.cod_pedido DESC LIMIT $inic, $regxpag";
        }
        $rs=@mysql_query($query);
        if (@mysql_num_rows($rs)){ 
            $query="SELECT FOUND_ROWS()";
            $rss=@mysql_query($query);
            $this->total=@mysql_result($rss,0,'FOUND_ROWS()');
            while($obj = @mysql_fetch_object($rs)) {
                   $return[] = $obj;
            }
            $this->proximo = $pag + 1;
            $this->anterior = $pag - 1;
            $this->primero = $inic + 1;
            $this->ultimo=$inic + $regxpag;
            if ($this->total < $this->ultimo)
                $this->ultimo=$this->total;
        }
        
        @mysql_close();
        return $return;
    }*/


    //ver datos de un Pedido
    /*function getPedido($cod_pedido){
        $err="OK";
        $query="SELECT t1.*, date_format(t1.fecha_cierre, '%d/%m/%Y') as fechaC,  date_format(t1.fregistro, '%d/%m/%Y') as fechaR, date_format(t1.fechaPedido, '%d/%m/%Y') as fechaP, t2.nombre_cliente, t2.num_identificacion, t2.direccion1, t2.cod_cliente, t3.nro_tlf, t4.correo, t5.cod_empresa FROM tbl_pedido t1  left join tbl_cliente t2 on (t1.cod_cliente=t2.cod_cliente) left join tbl_telefono t3 on (t1.cod_cliente=t3.cod_cliente) left join tbl_correo t4 on (t1.cod_cliente=t4.cod_cliente) left join tbl_empresa t5 on (t5.cod_empresa='1') WHERE t1.cod_pedido='$cod_pedido'";
        $con=@mysql_connect($this->varhost,$this->varlogin,$this->varpass);
        @mysql_select_db($this->vardb);		
        $rs=@mysql_query($query);
        if (@mysql_num_rows($rs)>0){
            $err='s';
            $this->cod_pedido=$cod_pedido;
            $this->cod_cliente=@mysql_result($rs,0,'cod_cliente');
            $this->nombre_cliente=@mysql_result($rs,0,'nombre_cliente');
            $this->fechaR=@mysql_result($rs,0,'fechaR');
            $this->fechaPedido=@mysql_result($rs,0,'fechaPedido');
            $this->fechaP=@mysql_result($rs,0,'fechaP');
            $this->horaEntrega=@mysql_result($rs,0,'horaEntrega');
            $this->lugarEntrega=@mysql_result($rs,0,'lugarEntrega');
            $this->estatus=@mysql_result($rs,0,'estatus');
            $this->num_identificacion=@mysql_result($rs,0,'num_identificacion');
            $this->direccion1=@mysql_result($rs,0,'direccion1');
            $this->telefono=@mysql_result($rs,0,'nro_tlf');
            $this->correo=@mysql_result($rs,0,'correo');
            $this->total=@mysql_result($rs,0,'total');
            $this->estatusOrden=@mysql_result($rs,0,'estatusOrden');
            $this->fechaC=@mysql_result($rs,0,'fechaC');

            $this->cod_empresa=@mysql_result($rs,0,'cod_empresa');
            $this->comentario_cierre=@mysql_result($rs,0,'comentario_cierre');

            $this->registro_app=@mysql_result($rs,0,'registro_app');

            $this->opcion_pedido1=@mysql_result($rs,0,'opcion_pedido1');
            $this->opcion_pedido2=@mysql_result($rs,0,'opcion_pedido2');
            $this->opcion_pedido3=@mysql_result($rs,0,'opcion_pedido3');
            $this->opcion_pedido4=@mysql_result($rs,0,'opcion_pedido4');


            $this->modalidad_pago=@mysql_result($rs,0,'modalidad_pago');
            $this->precios=@mysql_result($rs,0,'precios');
            $this->tipoCli=@mysql_result($rs,0,'tipoCli');
            $this->tipo_entrega=@mysql_result($rs,0,'tipo_entrega');
            $this->nombre_entrega=@mysql_result($rs,0,'nombre_entrega');


            $this->tipo_servicio=@mysql_result($rs,0,'tipo_servicio');
            $this->telefono=@mysql_result($rs,0,'telefono');
            $this->correo=@mysql_result($rs,0,'correo');


            $this->estatus_pago=@mysql_result($rs,0,'estatus_pago');
            $this->cod_conductor=@mysql_result($rs,0,'cod_conductor');

            $this->despacho=@mysql_result($rs,0,'despacho');

            } else { 
        }
        if ($rs) {}
        else { $err="X"; }
        @mysql_close();
        return $err;
    }*/
    
   
    function getIDPedido($id_pedido){
        $err="OK";
        $query="SELECT t1.* from tbl_pedido where t1.id_pedido='$id_pedido' ";
        $con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass,$this->vardb);
		@mysqli_select_db($con,$this->vardb);		
		$rs=@mysqli_query($con,$query);
		if (@mysqli_num_rows($rs)>0){
            $err='s';
            $this->id_pedido=$this->mysqli_result($rs,0,'id_pedido');

        } else { 
            $err='';
        }
        @mysqli_close($con);
        return $err;
    }


    
    
   
    
    /*
  	//Elimina item de detalle de aprobación de una cotización
	function delAprobacionDetalleP($cod_aprobacion) {
		$err="OK";
		$query="DELETE FROM tbl_pedido_aprobacion WHERE cod_aprobacion='$cod_aprobacion'";
		$con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass,$this->vardb);
		@mysqli_select_db($con,$this->vardb);
		$rs=@mysqli_query($con,$query);		
		if ($rs) {}
		else { $err='X'; }
		@mysqli_close($con);
		return $err;
	}
    */ 
    
    function modPedidoMontos($cod_pedido, $total) {
        $err="OK";
        $query="UPDATE tbl_pedido set  montoTotal='$total' WHERE cod_pedido='$cod_pedido'";
        $con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass,$this->vardb);
        @mysqli_select_db($con,$this->vardb);
        $rs=@mysqli_query($con,$query);		
        if ($rs) {}
        else { $err='X'; }
        @mysqli_close($con);
        return $err;
    }

    function addPedidoDetalle($cod_pedido, $cantidad, $descrip, $cantidadxprecio) {
        $err="OK";	
        $query="INSERT INTO tbl_pedido_detalle (cod_pedido, descrip, cantidad, cantidadxprecio, fregistro) values ('$cod_pedido', '$descrip', '$cantidad', '$cantidadxprecio', '".date('Y-m-d H:i:s')."')";
        $con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass,$this->vardb);
        @mysqli_select_db($con,$this->vardb);
        $rs=@mysqli_query($con,$query);
        if ($rs) {
            $this->cod_pedido_detalle=@mysqli_insert_id($con);
        }else { 
            $err='X'; 
        }
        @mysqli_close($con);
        return $err;
    }



    //Agregar   pago Pedido
    function addPagoPedido($moneda, $tasa, $instrumento, $banco, $ntransa, $fecha, $monto, $cod_pedido) {
        $err="OK";
        $fecha=$this->FechaOriginal($fecha);
        $query="insert into tbl_pedido_pagos (moneda, tasa, instrumento, banco, ntransa, fecha, monto, cod_pedido, cod_usuario_creo, fregistro) values ('$moneda', '$tasa', '$instrumento', '$banco', '$ntransa', '$fecha', '$monto', '$cod_pedido', '".$_SESSION['cod_usuario_log_green']."', '".date('Y-m-d H:i:s')."')";
        $con=@mysqli_connect($this->varhost,$this->varlogin,$this->varpass,$this->vardb);
        @mysqli_select_db($con,$this->vardb);
        $rs=@mysqli_query($con,$query);
        if ($rs) {
            $this->cod_pedido_pago=@mysqli_insert_id($con);
        }else { 
            $err='X'; 
        }
        @mysqli_close($con);
        return $err;
    }


        
    //funcion para las fechas seleccionadas con calendarios
    function FechaOriginal($fecha) {	
        $mifecha = explode("/",$fecha);
        $lafecha = $mifecha[2]."-".$mifecha[1]."-".$mifecha[0];
        return $lafecha;
    }
    
    function FechaNormal($fecha) {
        $mifecha = explode("-",$fecha);
        $lafecha = $mifecha[2]."/".$mifecha[1]."/".$mifecha[0];
        return $lafecha;
    }
    function mysqli_result($res, $row, $field=0) { 
        $res->data_seek($row); 
        $datarow = $res->fetch_array(); 
        return $datarow[$field]; 
    }
}
?>