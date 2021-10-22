<?php

    echo '<link rel="stylesheet" type="text/css" href="estilo/ejercicios.css">';

    echo "<header>";
    echo "<h1>Ejercicios PHP</h1>";
    echo "<h2>Bloque 2a - Miguel Pérez León</h2>";
    echo "</header>";

    echo '<div class="cuerpo">';

        
        echo "<h2>Ejercicios de Iniciación </h2>";

        echo '<a class="enlace-ej" href="informacion.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 2 - Información (informacion.php)</h3>";
            echo "<p>Mostrar toda la información posible del servidor y del usuario remoto que ha lanzado la petición al servidor.<br> - Crear una página PHP “informacion.php” que al invocarla, muestre directamente toda la información posible de la petición del cliente, como por ejemplo:</p>"; 
?>
            <pre>
    Solicitud desde: &lt;nombre de host o su IP>:&lt;Puerto remoto> 
    Usando Protocolo: &lt;Nombre del protocolo> 
    Usando petición tipo: &lt;Tipo de petición> 
    Usando Navegador: &lt;Tipo de navegador cliente>
    Idiomas preferidos: &lt;idioma/s del navegador cliente>

    Parámetros recibidos por GET: &lt;nombre parámetro>=&lt;valor parámetro>

    Parámetros recibidos por POST: &lt;nombre parámetro>=&lt;valor parámetro>

    ...y cualquier otra información que se pueda obtener de la petición entrante... 
            </pre>  
<?php    
            echo "<p>- En esta misma página, se pondrán dos formularios con algunos elementos “input” de prueba (los que quieras). Los dos al ser enviados irán a la misma página origen (“informacion.php”), pero el primero será enviado usando el método “get” y el segundo usando el método “post”, así se podrá probar lo indicado en el punto anterior.</p>";
        echo '</div>';
        echo '</a>';

        echo '<a class="enlace-ej" href="sumaNumeros.php?numero=7">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 3 - Suma Números (sumaNumeros.php)</h3>";
            echo "<p>Manejo de parámetros y Estructuras de Control. </p>";
            echo "<p>- Crear una página PHP “sumaNumeros.php” que sea capaz de recibir un
            número como parámetro de entrada y mostrar en forma de tabla el
            proceso de cálculo de la suma de los N primeros números debidamente
            formateada. </p>";
            echo "<p>- Se debe mostrar el número de iteración y la suma acumulada, es decir,
            si se recibe, por ejemplo, el 7 como parámetro para N, debe salir... </p>";
            echo "<p>- Si no se recibe el parámetro o éste no es válido (llega con alguna letra,
            por ejemplo), mostrará un mensaje de error en datos de entrada. </p>";
            echo "<p>Para el envío de parámetros, se usará un control de texto dentro de un
            formulario, donde el usuario pueda introducir el número del cual desea
            obtener la suma. También se incluirá un botón “Enviar” para poder
            enviar el formulario al ser pulsado.</p>";
            echo "<p>- Intentad que las celdas donde salen los números estén alineadas a la
            derecha para una mejor visualización. </p>";
        echo '</div>';
        echo '</a>';

        echo '<a class="enlace-ej" href="tablaMultiplicar.php?numero=7">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 4 - Tabla Multiplicar (tablaMultiplicar.php)</h3>";
            echo "<p>Manejo de parámetros y Estructuras de Control.</p>";
            echo "<p>- Crear una página PHP “tablaMultiplicar.php” que sea capaz de recibir un
            número como parámetro de entrada y mostrar la tabla de multiplicar
            correspondiente debidamente formateada. </p>";
            echo "<p>- Si no se recibe el parámetro o éste no es válido (llega con alguna letra,
            por ejemplo), mostrará la tabla de multiplicar del 1. </p>";
            echo "<p>- Para el envío de parámetros, se usará un control de texto dentro de un
            formulario, donde el usuario pueda introducir el número del cual desea
            obtener la tabla de multiplicar. También se incluirá un botón “Enviar”
            para poder enviar el formulario al ser pulsado. </p>";
            echo "<p>- Intentad que las celdas donde salen los números estén alineadas a la
            derecha para una mejor visualización. </p>";
        echo '</div>';
        echo '</a>';

        echo '<a class="enlace-ej" href="fibonacci.php?numero=6">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 5 - Serie Fibonacci (fibonacci.php)</h3>";
            echo "<p>Manejo de parámetros y Estructuras de Control.</p>";
            echo "<p>- Crear una página PHP “fibonacci.php” que sea capaz de recibir un
            número como parámetro de entrada y mostrar en forma de tabla los N
            primeros términos de la sucesión de Fibonacci debidamente formateada,
            siendo N el número recibido como parámetro. 
            </p>";
            echo "<p>- En la sucesión de Fibonacci se calcula un término como la suma de los
            dos términos anteriores (Tn= Tn-1 + Tn-2; n>2), siendo los dos primeros
            términos de la sucesión el valor 1 (T1=1 y T2=1). Así, el término 5 de la
            sucesión será el 5 (T4+T3 = 5), y el término 6 será el 8 (T5+T4 = 8)… </p>";
            echo "<p>*** No es necesario hacer una función recursiva para generar los elementos de la
            sucesión, basta con recordar los dos términos anteriores para calcular el siguiente
            en cada posible iteración, teniendo en cuenta que los dos primeros términos valen 1. 
            </p>";
            echo "<p>- Se debe mostrar el número de iteración y el término calculado, es decir,
            si se recibe, por ejemplo, el 6 como parámetro para N, debe salir... 
            </p>";
            echo "<p>- Si no se recibe el parámetro o éste no es válido (llega con alguna letra,
            por ejemplo), mostrará la tabla de multiplicar del 1. </p>";
            echo "<p>- Para el envío de parámetros, se usará un control de texto dentro de un
            formulario, donde el usuario pueda introducir el número del cual desea
            obtener la tabla de multiplicar. También se incluirá un botón “Enviar”
            para poder enviar el formulario al ser pulsado. </p>";
            echo "<p>- Intentad que las celdas donde salen los números estén alineadas a la
            derecha para una mejor visualización. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="contador.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 6 - Contador (contador.php)</h3>";
            echo "<p>Manejo de parámetros y manejo de sesiones. Contador (php_06)</p>";
            echo "<p>- Crear una página PHP “contador.php”, que muestre el valor
            almacenado en una variable de sesión denominada “contador” en un
            formulario con un control de texto que podrá ser modificado, y tres
            botones, uno para “actualizar”, otro para “establecer” y otro para “limpiar”. Todos los botones enviarán el formulario usando el método
            “get”.  </p>";
            echo "<p>- Al extraer el contador de la sesión, si no se encuentra, se introducirá en
            sesión con el valor “0”. </p>";
            echo "<p>- Cada vez que se invoque a la página “contador.php”, sin parámetros
            GET o por haber pulsado el botón “actualizar”, deberá incrementar la
            variable “contador” de la sesión, y mostrar el resultado habitual. </p>";
            echo "<p>- Cuando se invoque a la página por haber pulsado el botón “establecer”,
            se pondrá la variable “contador” de la sesión al valor recibido del
            control de texto, teniendo en cuenta que si no es un número válido, no
            se establecerá en la sesión y se volverá a mostrar el resultado habitual,
            añadiendo un mensaje de “Valor de Contador incorrecto”. </p>";
            echo "<p>- Cuando se invoque a la página por haber pulsado el botón “limpiar”, se
            eliminará la variable “contador” de la sesión, volviendo a mostrar el
            resultado habitual.</p>";
            echo "<p>*** Si abres la página con un navegador Web, el contador debe comenzar en 1 y si
            actualizas 4 veces debe salirte un 5, después, si abres la página con otro navegador
            diferente, debe también comenzar en 1 por ser una nueva sesión. 
            </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="mayorMenor.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 7 - Mayor o Menor (mayorMenor.php)</h3>";
            echo "<p>Manejo de parámetros y manejo de sesiones.</p>";
            echo "<p>- Crear una página PHP “mayorMenor.php”, donde se tendrá el control y
            la lógica del juego. </p>";
            echo "<p>- Se tendrá un formulario con un control de texto para permitir al usuario
            introducir paulatinamente números hasta dar con el número oculto que
            ha sido generado aleatoriamente y guardado en sesión previamente. </p>";
            echo "<p>- Se tendrán tres botones, uno para “comprobar” si el número
            introducido es correcto, otro para comenzar un “nuevo juego”, y otro
            para “mostrar solución” (el número generado) y finalizar el juego. </p>";
            echo "<p>- El número se encontrará entre 1 y 100, y deberá ser obligatoriamente
            entero. Además, si no se recibe o éste no es válido (llega con alguna
            letra, por ejemplo, o no es un número entero), mostrará un mensaje de
            error indicándolo. </p>";
            echo "<p>- Se mostrará el siguiente mensaje: “Dame un número entre X e Y”,
            siendo inicialmente X=1 e Y=100, y según se reciban números del
            usuario, se actualizará X e Y para reducir o acotar el rango, es decir, si
            el número aportado por el usuario es inferior al oculto se actualizará X
            con ese número, y si el número es superior al oculto se actualizará Y. </p>";
            echo "<p>*** Pista: Quizá debas guardar X e Y en sesión para recordarlos entre las
            diferentes peticiones. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="inicio.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 8 - Sesión de Usuario (inicio.php y login.php)</h3>";
            echo "<p>Manejo de formularios, paso de parámetros y manejo de sesiones.</p>";
            echo "<p>- Crear dos páginas PHP, una como “inicio.php” y otra como “login.php”. </p>";
            echo "<p>- La página de “inicio” será un ejemplo básico de página de un portal
            web en el que se detectará si hay un usuario validado en la sesión
            activa, y es así, mostrará el mensaje “Hola NOMBRE, has conectado
            hace X segundos.” (“NOMBRE” es el nombre del usuario que se ha
            conectado a la sesión, y “X” el tiempo en segundos transcurridos desde
            que conectó), y un botón que permita desconectar la sesión cuando sea
            pulsado, para ello se llamará a la misma página de inicio con un
            parámetro “logout=1”. En este caso, se limpiará de la sesión todos los
            datos que existan, antes de mostrar el mensaje indicado anteriormente,
            y se mostrará el mensaje “Usuario desconectado. Actualice la página
            para reconectar.”. </p>";
            echo "<p>- En el caso de que en la página de “inicio” no se detecte a un usuario
            conectado, se redirigirá el acceso a la página de “login.php” para
            realizar su función. </p>";
            echo "<p>- En la página de “login”, si no se detectan los parámetros de acceso, se
            mostrará un formulario para solicitar el “usuario” y la “contraseña”, y
            un botón para “conectar” que al pulsarse, se llamará a la misma página
            de “login” con los parámetros de acceso. Se simulará la validación de
            usuario y contraseña comprobando que sea, por ejemplo, el usuario
            “admin” y la contraseña “1234”. Si se valida correctamente, se
            guardará en sesión los datos necesarios para comprobar que hay un
            usuario válido (como mínimo el nombre y el tiempo en el que ha
            conectado) y se responderá al navegador con una redirección a la
            página de “inicio”. Si no se valida correctamente, se tendrá en cuenta
            de alguna forma el número de veces que ha intentado conectar el
            usuario sin éxito. </p>";
            echo "<p>- Si el número de intentos de acceso es menor de 5 veces, se mostrará
            de nuevo el formulario de acceso, pero si es 5 o más veces, se marcará
            la sesión de alguna forma como “bloqueada” y a partir de entonces, y
            hasta que no caduque la sesión, se mostrarán tanto en la página de
            “inicio” como en la de “login” un mensaje como “El acceso se ha
            bloqueado temporalmente por haber fallado al menos 5 veces.”. </p>";
            echo "<p>- Se deberán adaptar/modificar adecuadamente las páginas para el caso
            del acceso bloqueado. </p>";
            echo "<p>*** Para hacer pruebas de bloqueo, si no quieres esperar a que
            caduque la sesión, puedes incluir un botón que permita desconectar la
            sesión como se indica más arriba. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="divisas1.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 9 - Conversor de Divisas - I (divisas1.php)</h3>";
            echo "<p>Manejo de formularios, paso de parámetros, bucle de generación de controles. </p>";
            echo "<p>- Crear una página PHP “divisas1.php”, donde se tendrá todo el control y
            la lógica del conversor de divisas. Esta página incluirá un archivo
            “divisas_fun.php” que contendrá las diferentes funciones que debes
            desarrollar como apoyo a este ejercicio y los dos siguientes. </p>";
            echo "<p>- Se tendrá un formulario con un control de texto para permitir al usuario
            introducir una cantidad de dinero en Euros, que es la que se convertirá
            a otra moneda, debajo un grupo de botones de “radio” con las
            diferentes divisas a las que se puede realizar la conversión (sin incluir la
            moneda “Euro”) y debajo un botón “convertir” para enviar el formulario. </p>";
            echo "<p>- Cuando se reciba la petición con datos POST del formulario, y si todo
            va bien, se mostrará el resultado del proceso de conversión y el
            formulario de nuevo. 
            </p>";
            echo "<p>- A la hora de recibir el dato con la cantidad a convertir, se debe validar
            que es un número válido (con decimales posiblemente) y que se recibe
            el código de moneda a convertir, teniendo en cuenta la  tabla
            de monedas y conversión dada.</p>";
            echo "<p>*** Los datos de las divisas deben estar definidos en un array asociativo, que será
            devuelto por una función que programéis y utilizarlo como fuente de información
            para las funciones de conversión que hagáis. 
            </p>";
            echo "<p>*** El array asociativo puede estar definido con la clave de índice igual al “Código”
            indicado, y como valor un array que contiene dos elementos, uno con el texto de la
            “divisa” y otro con el “valor” de la misma en Euros. 
            </p>";
            echo "<p>Si la cantidad no es un número válido o el código de divisa no se
            encuentra en el array de datos, se mostrará un error como resultado de
            la conversión. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="divisas2.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 10 - Conversor de Divisas - II (divisas2.php)</h3>";
            echo "<p>Manejo de formularios, paso de parámetros, bucle de generación de controles.</p>";
            echo "<p>- Crear una página PHP “divisas2.php”, con la adaptación del ejercicio
            anterior para que el control de las divisas en lugar de ser un grupo de
            botones de “radio” sea un grupo de botones múltiple de tipo
            “checkbox”, y según las divisas seleccionadas, mostrar el valor de la
            conversión de cada una de ellas. </p>";
            echo "<p>- Esta página incluirá el archivo “divisas_fun.php” con las funciones que
            desarrolles como apoyo a este ejercicio, como por ejemplo, para usar el
            array de datos de divisas para generar la lista de controles “checkbox”
            necesarios como los resultados al mostrarlos. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="divisas3.php">';
        echo '<div class="ejercicio">';
            echo "<h3>Ejercicio 11 - Conversor de Divisas - III (divisas3.php)</h3>";
            echo "<p>Manejo de formularios, paso de parámetros, bucle de generación de controles.</p>";
            echo "<p>- Crear una página PHP “divisas3.php”, con la adaptación del ejercicio
            anterior para que en lugar de tener un grupo de botones “checkbox” o
            de “radio”, se tengan dos controles de tipo “select”, uno saldrá a la
            izquierda del control de la cantidad para que se pueda seleccionar la
            “moneda origen” de la conversión. Y el segundo saldrá a la derecha de
            la cantidad para indicar la “moneda destino” de la conversión. 
            </p>";
            echo "<p>- El procedimiento de validación se ampliará para la moneda de origen, y
            el factor de conversión será: <br><u> Resultado= Cantidad / ValorOrigen * ValorDestino</u> 
            </p>";
            echo "<p>*** Evidentemente, el valor origen y el destino dependerán de la moneda origen y
            la moneda destino seleccionadas. </p>";
            echo "<p>- Esta página incluirá el archivo “divisas_fun.php” con las funciones que
            desarrolles como apoyo, como por ejemplo, para usar el array de datos
            de divisas a la hora de generar las opciones de los “select” necesarios
            para elegir las monedas origen y destino, así como para la función de
            conversión que programes. </p>";
            echo "<p></p>";
        echo '</div>';
        echo "</a>";


        echo "<h2>Ejercicios de Bases de Datos</h2>";

        echo '<div class="ejercicio-no-enlace">';
            echo "<h3>bd_01. Funciones de Base de Datos (base_datos_fun.php)</h3>";
            echo "<p>Preparar un archivo
            “base_datos_fun.php” que contendrá las funciones que desarrolles para
            trabajar con la base de datos, como por ejemplo una función para conectar
            debidamente, otras para hacer el tratamiento de las consultas, inserciones,
            modificaciones, eliminaciones, de cualquier tabla que tengas que mantener,
            etc. </p>";
        echo '</div>';


        echo "<h2>Mantenimiento de Clientes</h2>";

        echo '<a class="enlace-ej" href="listarClientes.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_01. Listado Clientes (listarClientes.php)</h3>";
            echo "<p>Manejo de base de datos para consultas.  </p>";    
            echo "<p>- Crear una página PHP “listarClientes.php”, que se conectará a una base
            de datos, consultará una tabla y mostrará la lista resultante en forma
            de tabla HTML con los campos de la tabla “clientes” de la base de datos.</p>";
            echo "<p>*** Se deben introducir varios registros de prueba manualmente para ver algún
            resultado, aunque al principio es mejor probar sin registros para ver que sale
            también bien. </p>";
            echo "<p>- Si desarrollas o utilizas paginación de resultados, se recomienda utilizar
            en los enlaces de acceso a las diferentes páginas el mismo nombre de
            archivo añadiéndole un parámetro con el número de página
            correspondiente. </p>";
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="consultarCliente.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_02. Consultar Clientes (consultarCliente.php)</h3>";
            echo "<p>Manejo de base de datos para consultas.  </p>"; 
            echo "<p>- Crear una página PHP “consultarCliente.php”, que deberá recibir por
            GET un identificador de cliente el cual se buscará en la base de datos. </p>";
            echo "<p>- Si se encuentra el cliente, se mostrará un formulario rellenado con los
            datos obtenidos pero sin que el usuario pueda modificarlos, sólo es
            para consulta.</p>";    
            echo "<p>- Si no se encuentra, se mostrará un mensaje de error indicando que no
            existe el cliente o similar. </p>";  
            echo "<p>*** Haz las pruebas manualmente usando la URL del navegador, no es necesario
            hacer un formulario para introducir el “id_cliente” y hacer la llamada a la página. </p>";   
            
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="crearCliente.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_03. Crear Clientes (crearCliente.php)</h3>";
            echo "<p>Manejo de base de datos para inserciones.  </p>";
            echo "<p>- Crear una página PHP “crearCliente.php”, que si no recibe parámetros
            por POST sobre los datos de un cliente, mostrará un formulario para
            poder rellenarlo y enviarlo con un botón “crear”. </p>";  
            echo "<p>- Cuando se llegue a la página por haber pulsado el botón “crear”, se
            cogerán los parámetros, que lleguen por POST, para poder crear un
            cliente y lanzar la consulta SQL para insertarlo debidamente. </p>";    
            echo "<p>*** Se recomienda utilizar consultas preparadas para evitar problemas de inyección
            SQL o fallos en las consultas por haber introducido datos extraños en los campos
            del formulario. </p>";  
            echo "<p>- Si algo falla, se mostrará el formulario con los datos que haya
            introducido el usuario, y con un mensaje de error con la información del
            fallo, como por ejemplo que la “referencia” o el “email” ya existen, etc. 
            </p>";   
            echo "<p>- Evidentemente se usará la tabla de “clientes” para realizar las
            inserciones, teniendo en cuenta que el campo “id_cliente” se genera
            automáticamente por la base de datos al insertar, y la “referencia” y el
            “email” deben ser únicos, es decir, que el que se vaya a insertar no
            debe existir previamente. Si quieres, opcionalmente puedes validar que
            el campo “cifnif” sea válido y que no exista ya. 
            </p>";  
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="modificarCliente.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_04. Modificar Clientes (modificarCliente.php)</h3>";
            echo "<p>Manejo de base de datos para actualizaciones.  </p>";   
            echo "<p>- Crear una página PHP “modificarCliente.php”, que deberá recibir por
            GET un identificador de cliente el cual se buscará en la base de datos. </p>";  
            echo "<p>- Si se encuentra el cliente y no se reciben parámetros por POST sobre
            los datos del mismo, mostrará un formulario rellenado con los datos
            obtenidos para que el usuario pueda modificarlos, y con un botón
            “modificar” para lanzar la petición de modificación. </p>";  
            echo "<p>- Cuando se llegue a la página por haber pulsado el botón “modificar”, se
            cogerán los parámetros de GET para poder buscar el cliente a modificar,
            y los parámetros de POST para establecer los nuevos valores y lanzar la
            consulta SQL para modificarlo debidamente. </p>";  
            echo "<p>*** Se recomienda utilizar consultas preparadas para evitar problemas de inyección
            SQL o fallos en las consultas por haber introducido datos extraños en los campos
            del formulario.</p>";  
            echo "<p>- Si algo falla, o el cliente no se encuentra, se mostrará el formulario con
            los datos que haya introducido el usuario, y con un mensaje de error
            con la información del fallo, como por ejemplo que la “referencia” o el
            “email” ya existen (siempre que no sean datos del mismo registro que
            se está modificando), etc.</p>";  
            echo "<p>- Como antes, se usará la tabla de “clientes” para realizar las búsquedas
            y modificaciones, teniendo en cuenta que el campo “id_cliente” se
            mantendrá invariable (no se puede modificar), que la “referencia” y el
            “email” deben ser únicos (siempre que no sean datos del mismo
            registro que se está modificando), es decir, que si se modifica la
            “referencia” o el “email” respecto del valor original, se debe comprobar que los nuevos no existen ya en otro cliente. Opcionalmente puedes
            validar que el campo “cifnif” sea válido y que no exista ya. </p>";  
        echo '</div>';
        echo "</a>";
        
        echo '<a class="enlace-ej" href="borrarCliente.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_05. Borrar Clientes (borrarCliente.php)</h3>";
            echo "<p>Manejo de base de datos para eliminaciones.</p>";  
            echo "<p>- Crear una página PHP “borrarCliente.php”, que deberá recibir por GET
            un identificador de cliente el cual se buscará en la base de datos.</p>";  
            echo "<p>- Si se encuentra el cliente, y no se reciben parámetros por POST sobre
            la eliminación, mostrará un formulario rellenado con los datos
            obtenidos pero sin que el usuario pueda modificarlos, y con un botón
            “confirmar borrado” para lanzar la petición.</p>";  
            echo "<p>- Cuando se llegue a la página por haber pulsado el botón “confirmar
            borrado”, se cogerá al menos el identificador del cliente que deberá
            venir por POST (junto con el botón de confirmar), se validará que es el
            mismo que viene por GET, y en su caso se lanzará la consulta SQL para
            eliminarlo debidamente. </p>";  
            echo "<p>- Si algo falla (el cliente no se encuentra, por ejemplo), se intentará
            mostrar el formulario con los datos del cliente (como al principio), y con
            un mensaje de error con la información del fallo. </p>";  
            echo "<p>- Se usará la tabla de “clientes” para realizar las búsquedas y
            eliminaciones. 
            </p>";    
        echo '</div>';
        echo "</a>";

        echo '<a class="enlace-ej" href="mantenerClientes.php">';
        echo '<div class="ejercicio">';
            echo "<h3>art_06. Mantener Clientes (mantenerClientes.php)</h3>";
            echo "<p>Unificar varias acciones en una página. </p>";     
            echo "<p>- Utilizando como base la página PHP creada anteriormente
            “listarClientes.php”, crear la página “mantenerClientes.php”, que
            deberá unificar la función de listado y enlazar a las 4 funciones
            desarrolladas sobre la tabla “clientes”. 
            </p>";  
            echo "<p>- Se mostrará la lista de clientes en forma de tabla, teniendo en cada fila
            una columna adicional en la que se incluirá un botón o enlace para
            acceder a “consultar”, “modificar” o “eliminar” el cliente mostrado en
            dicha fila, generando los enlaces hacia los archivos correspondientes ya
            desarrollados. </p>";  
            echo "<p>- Se mostrará antes y después de la lista de clientes un botón o enlace
            denominado “crear” que al ser pulsado lance una petición a la página
            “crearCliente.php”.</p>";  
            echo "<p>- Se adaptarán las vistas de las páginas previas (“consultarCliente.php”,
            “crearCliente.php”, “modificarCliente.php”, y “borrarCliente.php”) para incluir un botón o enlace denominado “Volver” que al ser pulsado lance
            la petición a la página “mantenerClientes.php”. </p>";  
            echo "<p>- Si desarrollas / utilizas paginación de resultados, se recomienda incluir
            en los enlaces el número de página activo para mantenerlo a la hora de
            volver desde las 4 funciones de mantenimiento desarrolladas. </p>";    
        echo '</div>';
        echo "</a>";

    echo '</div>';

    echo "<footer class='footer'>";
        echo "<p>Miguel Pérez León - 71046648Q</p>";
    echo "</footer>";
?>
