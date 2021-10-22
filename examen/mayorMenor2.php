<?php
    session_start();

    if(!isset($_SESSION['sol'])){
        $_SESSION['sol']=rand(1,100);
        $_SESSION['min']=1;
        $_SESSION['max']=100;
    }

    if(isset($_GET['verSol'])){
        echo '<p>La solución es: '.$_SESSION['sol'].'</p>';
    }
    else if(isset($_GET['nuevo'])){
        session_unset();
        $_SESSION['sol']=rand(0,100);
        $_SESSION['min']=0;
        $_SESSION['max']=100;
    }
    else if(isset($_GET['respuesta']) && !empty($_GET['respuesta'])){
        $posSol=(int)$_GET['respuesta'];
        if($posSol!=0){
            if($posSol==$_SESSION['sol']){
                echo '<p><strong>Juego resuelto la respuesta era: '.$posSol.' </strong>, recarga la página para generar otro juego</p>';
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
        else{
            echo '<p>No has indicado un número valido</p>';
        }    
    }
    else{
        echo '<p>No has indicado nada</p>';
    }

?>

<p><?php echo 'El número esta entre '.$_SESSION['min'].' y '.$_SESSION['max'].''?></p>

<form method="GET" action="mayorMenor2.php">
    <label for="respuesta">Indica un numero, a ver si aciertas: </label><input type="text" name="respuesta" id="respuesta" value="">
    <input type="submit" value="Comprobar">
</form>

<form method="GET" action="mayorMenor2.php">
    <input type="submit" name="verSol" id="verSol" value="Mostrar Solución">
</form>

<form method="GET" action="mayorMenor2.php">
    <input type="submit" name="nuevo" id="nuevo" value="Nuevo juego">
</form>

