<?php
    session_start();

    if(!isset($_SESSION['sol'])){
        $_SESSION['sol']=rand(0,100);
        $_SESSION['min']=0;
        $_SESSION['max']=100;
    }

    var_dump($_SESSION);

    if(isset($_GET['verSol'])){
        echo '<p>La solución es: '.$_SESSION['sol'].'</p>';
    }
    else if(isset($_GET['nuevo'])){
        session_unset();
        $_SESSION['sol']=rand(0,100);
        $_SESSION['min']=0;
        $_SESSION['max']=100;
    }
    else if(isset($_GET['respuesta'])){
        $posSol=$_GET['respuesta'];
        if($posSol==$_SESSION['sol']){
            echo '<p>juego resuelto la respuesta era:'.$posSol.' recarga la página para generar otro juego</p>';
            unset($_SESSION['sol']);
        }
        else{
            if($posSol<$_SESSION['sol'] || $posSol>$_SESSION['min']){
                $_SESSION['min']=$posSol;
            }
            else if($posSol>$_SESSION['sol'] || $posSol<$_SESSION['max']){
                $_SESSION['max']=$posSol;
            }
            echo '<p>el número indicado no era la solución</p>';
        } 
    }

?>

<p><?php echo 'El número esta entre '.$_SESSION['min'].' y '.$_SESSION['max'].''?></p>

<form method="GET" action="mayorMenor.php">
    <label for="respuesta">Indica un numero, a ver si aciertas: </label><input type="number" name="respuesta" id="respuesta" value="" required>
    <input type="submit" value="Comprobar">
</form>

<form method="GET" action="mayorMenor.php">
    <input type="submit" name="verSol" id="verSol" value="Mostrar Solución">
</form>

<form method="GET" action="mayorMenor.php">
    <input type="submit" name="nuevo" id="nuevo" value="Nuevo juego">
</form>

