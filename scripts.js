
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
    }
    function eliminar_s(){
        <?php
            $id_sucursal = $_GET['id'];
            $consulta="SELECT * FROM personal WHERE codigosuc = '$id_sucursal'";
            $result = mysqli_query($conexion, $consulta);
            $encontrar = mysqli_num_rows($result); 
            if($encontrar>=1){
                
            }else{
                $consulta2="DELETE FROM sucursal WHERE id= ".$id_sucursal;
                mysqli_query($conexion,$consulta2);    
            }
        ?>
    }