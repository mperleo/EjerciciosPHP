<?php

    /********************* CONSTANTES CON LOS DATOS PARA CONECTAR CON LA BASE DE DATOS *********************/
    define('DB_SERVER', 'localhost');
    define('DB_SERVER_USERNAME', 'root');
    define('DB_SERVER_PASSWORD', '');
    define('DB_DATABASE', 'daw_tienda_virtual');

    
    /*************************************** FUNCIONES TABLA CLIENTE ***************************************/
    // funcion para hacer select, de un cliente en la que se pueden indicar coondiciones para la busqueda 
    function seleccionarCliente(string $condiciones){
        $base_datos= new mysqli( DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE); // hago la conexón con la base de datos
        // si hay error en la conexión retorno el mensaje de error y salgo de la función
        if (mysqli_connect_errno()) {
            return sprintf("Falló la conexión con la base de datos: %s\n", mysqli_connect_error());
        }
        else{
            $sqlConsulta= "SELECT * FROM clientes WHERE referencia='".$condiciones."';";

            $consulta= $base_datos->query( $sqlConsulta);

            $registro = $consulta->fetch_assoc(); // guardo el resultado de la conulsta en un array asociativo

            $consulta->free();
            if ($base_datos) $base_datos->close();
            return $registro;// devuelvo los resultados
        }
    }

    // funcion para hacer select, de todos los elementos de la tabla clientes, pudiendo indicar los atributos que se quieren seleccionar
    function seleccionarTodos(string $atributos){
        $base_datos= new mysqli( DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE); // hago la conexón con la base de datos
        // inicio las variables
        $registro = array();
        $temp = null;
        // si hay error en la conexión retorno el mensaje de error y salgo de la función
        if (mysqli_connect_errno()) {
            return sprintf("Falló la conexión con la base de datos: %s\n", mysqli_connect_error());
        }
        else{
            // si se indican que todos los atributos se modifica para que los obetnga todos
            if(strcmp($atributos,"todos")===0){
                $atributos="*";
            }

            $sqlConsulta= 'SELECT '.$atributos.' FROM clientes';
            //var_dump($sqlConsulta);

            $consulta= $base_datos->query( $sqlConsulta);

            // guardo todos los resultados de la consulta en un array de arrays asociativos para luego usarlos en las páginas
            $i = 0;
            do{ 
                $temp = $consulta->fetch_assoc();
                if($temp!== null){
                    $registro[$i]= $temp;
                    $i++;
                }
            }while ($temp !== null);

            $registro['n-indices']=$i; // guardo el numero total de resultados en el array
            $consulta->free();
            if ($base_datos) $base_datos->close();
            return $registro; // devuelvo los resultados
        }
    }

    // función para obtener el valor de un atributo de un registro de una tabla dada
    function obtenerValorRegistro(string $atributo,string $valor, mysqli $base_datos){
        $sqlconsulta="SELECT ".$atributo." FROM clientes WHERE ".$atributo."=('".$valor."')";
        //var_dump($sqlconsulta);
        $resultado=$base_datos->query($sqlconsulta);
        $resultado = $resultado->fetch_assoc(); //guardo el resultado como un array asociativo para usarlo despues

        return $resultado; // devuelvo el resultado
    }

    // funcion para hacer insert into
    function crearCliente (){
        $base_datos= new mysqli( DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE); // hago la conexón con la base de datos
        
        // inicio las variables
        $cliente = array();
        $atributos = "";
        $valores = "";

        // si hay error en la conexión retorno el mensaje de error y salgo de la función
        if (mysqli_connect_errno()) {
            return sprintf("Falló la conexión con la base de datos: %s\n", mysqli_connect_error());
        }
        else{
            if( empty($_POST['nombre']) || empty($_POST['apellidos']) ||
                empty($_POST['cifnif']) || empty($_POST['domFiscal']) ||
                empty($_POST['domEnvio']) || empty($_POST['email']) ||
                empty($_POST['password']) )
            {
                $mensaje= "No se ha podido registrar, faltan datos";
            }
            else{
                // busco si el email esta repetido, si existe creo un mensaje de error
                if(obtenerValorRegistro('email', $_POST['email'], $base_datos) != null){
                    $mensaje='El correo "'.$_POST['email'].'" ya esta en la base de datos, indica otro';
                }
                // busco si el CIF esta repetido, si existe creo un mensaje de error
                else if(obtenerValorRegistro('cifnif', $_POST['cifnif'], $base_datos) != null){
                    $mensaje='El cif-nif "'.$_POST['cifnif'].'" ya esta en la base de datos, indica otro';
                }// si el correo y el CIF son unicos sigo con la inserción
                else{
                    // guardo los datos del forumulario en un array
                    $cliente['nombre']= $_POST['nombre'];
                    $cliente['apellidos']= $_POST['apellidos'];
                    $cliente['cifnif']= $_POST['cifnif'];
                    $cliente['domFiscal']= $_POST['domFiscal'];
                    $cliente['domEnvio']= $_POST['domEnvio'];
                    $cliente['email']= $_POST['email'];
                    $cliente['password']= $_POST['password'];
                    $cliente['referencia']=generarNuevaRef($base_datos);

                    // formateo las 2 cadenas que continen los datos y los nombres de los atributos para luego hacer el insert
                    foreach($cliente as $clave => $valor){
                        if(empty($atributos)){ // si es el primer valor lo incuyo 
                            $atributos= sprintf( "%s",$clave);
                            $valores= sprintf( "'%s'",$valor);
                        }
                        else{ // para el resto de valores copio el valor anterior de la variable y pongo una coma antes del anterior para que la sintaxis sea valida en la consulta
                            $atributos= sprintf( "%s, %s",$atributos, $clave);
                            $valores= sprintf( "%s, '%s'",$valores, $valor);
                        }
                        
                    }
                    //var_dump($atributos);
                    //var_dump($valores);

                    $sqlconsulta= "INSERT INTO clientes (".$atributos.") VALUES (".$valores.")";
                    //var_dump($sqlconsulta);
                    
                    // si la consulta no es valida se indica con un mensaje de error
                    if($base_datos->query($sqlconsulta)==false){
                        $mensaje = "No se ha podido guardar el cliente en la base de datos";
                    }
                    else{
                        $mensaje = $cliente['referencia']; // si es valida se guarda la referencia del nuevo usuario
                    }
                }
            }
        }
        if ($base_datos) $base_datos->close();
        return $mensaje; // devuelvo el mensaje generado por la función que indicara el resultado de la consulta
    }

    // Función para genear la ID de un nuevo usuario
    function generarNuevaRef(mysqli $base_datos){
        // busco la referencia más reciente de la base de datos
        $sql="select max(referencia) from clientes";
        $id_ultima= $base_datos->query( $sql);
        $id_ultima = $id_ultima->fetch_assoc(); // la guardo en un array para usarla

        // inicio las variables
        $referencia="";

        if(($id_ultima===false)||($id_ultima===null)){
            // si es el primer usuario que se registra
            $referencia="ZA000001";
        }
        else{
            // si no es el primer usuario, uso la referencia que saco de la busqueda
            // separo el número en la string y le sumo 1
            $aux=$id_ultima["max(referencia)"];
            // inicio las variables auxiliares
            $i=0;
            $j=1;
            $num=0;

            // modifico el contenido de i para sacar el número siguente
            for ($i = strlen($aux)-1; $i>=0 ; --$i) {

            if($i===strlen($aux)-1){
                // al primero número le sumo 1
                $num=(int)$aux[$i]+1;
            }
            else{
                // hay que multiplcar los sucesivos por 10, 100, 1000...
                $num=((10**$j)*(int)$aux[$i])+$num;
                $j++; // aumento la potencia en una unidad para la siguiente cifra
            }
        }
            // meto en la variable el codigo del nuevo usuario con el codigo completo y el formato de la base de datos
            $referencia= sprintf( 'ZA%06d',$num);
        }
        return $referencia;
    }

    // funcion para update
    function modificarCliente(){
        $base_datos= new mysqli( DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE); // hago la conexón con la base de datos

        // inicio las variables
        $cliente = array();
        $atributos = "";
        $mensaje= null;

        // si hay error en la conexión retorno el mensaje de error y salgo de la función
        if (mysqli_connect_errno()) {
            return sprintf("Falló la conexión con la base de datos: %s\n", mysqli_connect_error());
        }
        else{
            // para todos los campos modificables de la tabla clientes compruebo que existen en el formulario y si existen los meto en al array para luego hacer la modificación

            if(!empty($_POST['nombre'])){
                $cliente['nombre']= $_POST['nombre'];
            }
                
            if(!empty($_POST['apellidos'])){
                $cliente['apellidos']= $_POST['apellidos'];
            }
            
            // para el cif se comprueba que sea unico, si no lo es se indica un error
            if(!empty($_POST['cifnif'])){
                if(obtenerValorRegistro('cifnif', $_POST['cifnif'], $base_datos) != null){
                    $mensaje='El cif-nif "'.$_POST['cifnif'].'" ya esta en la base de datos, indica otro';
                }
                else{
                    $cliente['cifnif']= $_POST['cifnif'];
                }  
            } 
            
            if(!empty($_POST['domFiscal'])){
                $cliente['domFiscal']= $_POST['domFiscal'];
            }

            if(!empty($_POST['domEnvio'])){
                $cliente['domEnvio']= $_POST['domEnvio'];
            }
            
            // para el correo se comprueba que sea unico, si no lo es se indica un error
            if(!empty($_POST['email'])){
                if(obtenerValorRegistro('email', $_POST['email'], $base_datos) != null){
                    $mensaje='El correo "'.$_POST['email'].'" ya esta en la base de datos, indica otro';
                }
                else{
                    $cliente['email']= $_POST['email'];
                }
            } 
            
            if(!empty($_POST['password'])){
                $cliente['password']= $_POST['password'];
            }

            // compruebo si se ha mandado el formulario vacio
            if( empty($cliente) ){
                $mensaje= "No has indicado ningún dato a modificar";
            }
            // si no es vacio y si la varable mensaje no contiene nada se puede hacer la operación en la base de datos
            else if($mensaje==null){
                // formateo las 2 cadenas que continen los datos y los nombres de los atributos para luego hacer el update, es más sencillo que para el insert por la sintaxis de SQL y se hace mediante una sola cadena
                foreach($cliente as $clave => $valor){
                    if(empty($atributos)){
                        $atributos= sprintf( "%s = '%s'",$clave, $valor); // para el primer valor se incluye directamente
                    }
                    else{
                        $atributos= sprintf( "%s , %s = '%s'", $atributos,$clave, $valor); // para el resto de valores copio el valor anterior de la variable y pongo una coma antes del anterior para que la sintaxis sea valida en la consulta
                    } 
                }
                //var_dump($atributos);


                $sqlconsulta= "UPDATE clientes SET ".$atributos." WHERE referencia = '".$_POST['referencia_get']."'";
                //var_dump($sqlconsulta);
                
                //si la consulta no se ha realizado correctamente indico en la variable el mensaje correspondiente
                if($base_datos->query($sqlconsulta)==false){
                    $mensaje = "No se ha podido guardar las modificaciones del cliente en la base de datos";
                }
                else{
                    $mensaje = $_POST['referencia_get']; // si es valida se guarda la referencia del nuevo usuario
                }
            }     
        }
        if ($base_datos) $base_datos->close();
        return $mensaje; // devuelvo el mensaje generado por la función que indicara el resultado de la consulta
    }

    // funcion para delete
    function borrarCliente(string $referencia){
        $base_datos= new mysqli( DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE); // hago la conexón con la base de datos
        $registro = null;
        // si hay error en la conexión retorno el mensaje de error y salgo de la función
        if (mysqli_connect_errno()) {
            return sprintf("Falló la conexión con la base de datos: %s\n", mysqli_connect_error());
        }
        else{
            // borro el usuario y compruebo que el borrado es correcto, si no es correcto se retornara un mensaje que indica el error, si se borra correctamente el mensaje indicara que la operación se hizo con exito
            $sqlconsulta= "DELETE FROM clientes WHERE referencia='".$referencia."';";

            if($base_datos->query($sqlconsulta)==false){
                $mensaje = "No se ha podido borrar el cliente en la base de datos";
            }
            else{
                $mensaje = null;
            }
            if ($base_datos) $base_datos->close();
            return $mensaje; // devuelvo el mensaje generado por la función que indicara el resultado de la consulta
        }
    }

?>