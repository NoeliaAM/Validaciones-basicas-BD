<script>
    function show_tables(){
        document.getElementById('tables').style.display = 'block';
        document.getElementById('forms').style.display = 'none';
    }
    function show_forms(){
        document.getElementById('tables').style.display = 'none';
        document.getElementById('forms').style.display = 'block';
    }
    $(document).ready(function(){
        $('select').formSelect();
        $('.datepicker').datepicker();
    });
</script>
<?php
if(isset($_POST['iniciar_sesion']))
{
	if($_POST['no_m'] != "" && $_POST['userpass'] != "")
	{
		$no=$_POST['no_m'];
		$pass=$_POST['userpass'];
		
		$consultaX = "SELECT * FROM registro_maestros WHERE no_trabajador = '$no' AND password = '$pass'";

		$result = mysqli_query($con, $consultaX);
		$countX =mysqli_num_rows($result);

		if($countX == 1)
		{
			$_SESSION['inicio_sesion'] = 'dog';
			header("location: MainPage.php");
		}
		else
		{
			echo '<script>alert("No. de trabajador o contraseña incorrecta.");</script>';
			echo '<script> window.location="inises.php";</script>';
		}
	}
	else
	{

		echo '<script>alert"Llene todos los campos que se necesitan.");</script>';
			echo '<script> window.location="inises.php";</script>';
	}
}
?>