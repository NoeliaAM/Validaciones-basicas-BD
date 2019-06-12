<script>
    function show_tables(){
        document.getElementById('tables').style.display = 'block';
        document.getElementById('forms').style.display = 'none';
    }
    function show_forms(){
        document.getElementById('tables').style.display = 'none';
        document.getElementById('forms').style.display = 'block';
    }
    function eliminar_p(){
        <?php
            $id_personal = $_GET['id'];    
            $consulta="DELETE FROM personal WHERE id= ".$id_personal;
            mysqli_query($conexion,$consulta);           
        ?>
        swal("Dato eliminado", "El dato ah sido eliminado de la tabla personal", "success");
        
    }
    function eliminar_s(){
        <?php
            $id_sucursal = $_GET['id'];
            $consulta="SELECT * FROM personal WHERE codigosuc = '$id_sucursal'";
            $result = mysqli_query($conexion, $consulta);
            $encontrar = mysqli_num_rows($result); 
            echo Console::log('', $encontrar);
            if($encontrar>=1){
                
            }else{
                $consulta2="DELETE FROM sucursal WHERE id= ".$id_sucursal;
                mysqli_query($conexion,$consulta2);    
            }
        ?>
    }
</script>

<?php
    if(isset($_POST['ingresar_personal'])){
        if($_POST['codigosuc'] != "" && $_POST['nom'] != "" && $_POST['apellidos'] != "" && $_POST['email'] != "" && $_POST['puesto'] != "" && $_POST['sx'] != "" && $_POST['Fena'] != ""){
            
            $codigosuc=$_POST['codigosuc'];
            $nom=$_POST['nom'];
            $apellidos=$_POST['apellidos'];
            $email=$_POST['email'];
            $puesto=$_POST['puesto'];
            $sx=$_POST['sx'];
            $Fena=$_POST['Fena'];
            
            $consulta = "SELECT * FROM sucursal WHERE codigosuc = '$codigosuc'";
			$result = mysqli_query($conexion, $consulta);
			$encontrar = mysqli_num_rows($result);
            
            if($encontrar==0){
                echo '<script>swal("codigosuc no valido", "El codigosuc ingresado no es valido", "error");</script>';
            }else{
                $consulta = "SELECT * FROM personal WHERE email = '$email'";
                $result = mysqli_query($conexion, $consulta);
                $encontrar = mysqli_num_rows($result);

                if($encontrar == 1) { 
                    echo '<script>swal("e-mail no valido", "e-mail ya registrado", "error");</script>'; 
                }else{
                    $datos = "INSERT INTO personal (id,codigosuc,nom,apellidos,email,puesto,sx,Fena)VALUES('', '$codigosuc','$nom','$apellidos','$email','$puesto','$sx','$Fena')";
                    $result = mysqli_query($conexion, $datos);	
                    header('location: index.php');
                    echo '<script>swal("Datos agregados", "Los datos se han ingresado con exito", "success");</script>';
                }   
            }
        }else{   echo '<script>swal("Campos vacios", "Por favor llena todos los datos", "error");</script>'; }
    }
    if(isset($_POST['ingresar_sucursal'])){
        if($_POST['codigosuc'] != "" && $_POST['domicilio'] != "" && $_POST['ciudad'] != "" && $_POST['cp'] != "" && $_POST['tel'] != ""){
            
            $codigosuc=$_POST['codigosuc'];
            $domicilio=$_POST['domicilio'];
            $ciudad=$_POST['ciudad'];
            $cp=$_POST['cp'];
            $tel=$_POST['tel'];
            
            $consulta = "SELECT * FROM sucursal WHERE codigosuc = '$codigosuc'";
			$result = mysqli_query($conexion, $consulta);
			$encontrar = mysqli_num_rows($result);

			if($encontrar == 1) { echo '<script>swal("codigo de sucursal no valido", "El codigo de sucursal ingresado ya esta siendo usado ingrese otro", "error");</script>'; 
            }else{
			$datos = "INSERT INTO sucursal (id,codigosuc,domicilio,ciudad,cp,tel)VALUES('', '$codigosuc','$domicilio','$ciudad','$cp','$tel')";

			$result = mysqli_query($conexion, $datos);	
			echo '<script>swal("Datos agregados", "Los datos se han ingresado con exito", "success");</script>';
			}
        }else{   echo '<script>swal("Campos vacios", "Por favor llena todos los datos", "error");</script>'; }
    }
?>