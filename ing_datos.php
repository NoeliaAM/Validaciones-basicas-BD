<?php
    if(isset($_POST['ingresar_personal']))
    {
        if($_POST['codigosuc'] != "" && $_POST['nom'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['puesto'] != "" && $_POST['sx'] != "" && $_POST['Fena'] != ""){
            $no=$_POST['no_m'];
            $pass=$_POST['userpass'];

            $consultaX = "SELECT * FROM registro_maestros WHERE no_trabajador = '$no' AND password = '$pass'";

            $result = mysqli_query($con, $consultaX);
            $countX =mysqli_num_rows($result);

            if($countX == 1)
            {
                header("location: MainPage.php");
            }
            else
            {
                echo '<script>alert("No. de trabajador o contraseña incorrecta.");</script>';
                echo '<script> window.location="inises.php";</script>';
            }
        }else{   echo '<script>swal("Campos vacios", "Por favor llena todos los datos", "error");</script>'; }
    }
?>