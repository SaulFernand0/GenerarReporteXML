<?php
    function call($f_i, $f_f, $cliente){
        require "conexion.php";
        $resp = mysqli_query($conex, "select * from cliente c join venta v on (c.idcliente = v.idcliente) join detalle d on (d.idventa = v.idventa) join producto p on (p.idproducto = d.idproducto) where c.idcliente = 1 and v.fecha between '$f_i' and '$f_f' and c.idcliente = '$cliente'");
        if($resp){
            $xml = new DOMDocument("1.0");
            $xml->formatOutput = true;
            $fitness = $xml->createElement("clientes");
            $xml-> appendChild($fitness);
    
            while($row = mysqli_fetch_array($resp)){
    
                $cliente=$xml->createElement("cliente");
                $fitness->appendChild($cliente);
    
                $idcliente = $xml->createElement("idcliente", $row['idcliente']);
                $cliente->appendChild($idcliente);
    
                $nombres = $xml->createElement("nombres", $row['nombres']);
                $cliente->appendChild($nombres);
    
                $apellidos = $xml->createElement("apellidos", $row['apellidos']);
                $cliente->appendChild($apellidos);
    
                $dni = $xml->createElement("dni", $row['dni']);
                $cliente->appendChild($dni);
    
                $direccion = $xml->createElement("direccion", $row['direccion']);
                $cliente->appendChild($direccion);
            }
    
            echo "<xmp>".$xml->saveXML()."</xmp>";
            $xml->save("report.xml");
    
        }else{
            echo "error..!";
        }
    }
?>