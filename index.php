<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<body>
<?php include('scripts.php'); ?>
<nav><div class="container"><a>SuperTest</a></div></nav>
<div class="row container">
    <div class="col l3">
        <br>
        <div class="collection">
            <a onclick="show_tables();" class="collection-item">Tablas</a>
            <a onclick="show_forms();" class="collection-item">Agregar datos</a>
        </div>
    </div>
    <div class="col l9">
        <div id="tables">
            <blockquote>Personal</blockquote>
            <table>
                <thead>
                  <tr>
                      <th>id</th>
                      <th>codigosuc</th>
                      <th>nom</th>
                      <th>apellidos</th>
                      <th>email</th>
                      <th>puesto</th>
                      <th>sx</th>
                      <th>Fena</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $consulta = mysqli_query($conexion, "SELECT * FROM personal");
                while($row = mysqli_fetch_array($consulta)){
                    echo 
                    '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'. $row['codigosuc'].'</td>
                    <td>'. $row['nom'].'</td>
                    <td>'. $row['apellidos'].'</td>
                    <td>'. $row['email'].'</td>
                    <td>'. $row['puesto'].'</td>
                    <td>'. $row['sx'].'</td>
                    <td>'. $row['Fena'].'</td>
                    <td><a class="btn-floating btn-small red" onclick="eliminar_p();" href="index.php?id='.$row['id'].'"><i class="material-icons">clear</i></a></td>
                    </tr>';        
                }

                ?>
                </tbody>
            </table>
            <blockquote>Sucursal</blockquote>
            <table>
                <thead>
                  <tr>
                      <th>id</th>
                      <th>codigosuc</th>
                      <th>domicilio</th>
                      <th>ciudad</th>
                      <th>cp</th>
                      <th>tel</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $consulta = mysqli_query($conexion, "SELECT * FROM sucursal");
                    while($row = mysqli_fetch_array($consulta)){
                        echo 
                        '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'. $row['codigosuc'].'</td>
                        <td>'. $row['domicilio'].'</td>
                        <td>'. $row['ciudad'].'</td>
                        <td>'. $row['cp'].'</td>
                        <td>'. $row['tel'].'</td>
                        <td><a class="btn-floating btn-small red" onclick="eliminar_s()" href="index.php?id='.$row['id'].'"><i class="material-icons">clear</i></a></td>
                        </tr>';        
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div id="forms" style="display:none">
            <div class="row">
                <blockquote>Añadir datos a tabla "Personal"</blockquote>
                <form class="col s12" method="post" action="index.php">
                  <div class="row">
                    <div class="input-field col s2">
                      <input id="codigosuc" name="codigosuc" type="number" class="validate">
                      <label for="codigosuc">codigosuc</label>
                    </div>
                    <div class="input-field col s5">
                      <input id="nom" name="nom" type="text" class="validate">
                      <label for="nom">nom</label>
                    </div>
                    <div class="input-field col s5">
                      <input id="apellidos" name="apellidos" type="text" class="validate">
                      <label for="apellidos">apellidos</label>
                    </div>
                  </div>
                <div class="row">
                    <div class="input-field col s5">
                      <input id="email" name="email" type="email" class="validate">
                      <label for="email">email</label>
                    </div>
                    <div class="input-field col s2">
                      <select id="puesto" name="puesto" class="browser-default">
                        <option value="" default>puesto</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Mostrador">Mostrador</option>
                      </select>
                    </div>
                    <div class="input-field col s2">
                      <select id="sx" name="sx" class="browser-default">
                        <option value="">sx</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                      </select>
                    </div>
                    <div class="input-field col s3">
                      <input type="date" id="Fena" name="Fena">
                    </div>
                  </div>
                <center><input type="submit" class="btn center" value="Ingresar datos" name="ingresar_personal"></center>
                </form>
            </div>
            <div class="row">
                <blockquote>Añadir datos a tabla "Sucursal"</blockquote>
                <form class="col s12" method="post" action="index.php">
                  <div class="row">
                    <div class="input-field col s2">
                      <input id="codigosuc2" name="codigosuc" type="number" class="validate">
                      <label for="codigosuc2">codigosuc</label>
                    </div>
                    <div class="input-field col s5">
                      <input id="domicilio" name="domicilio" type="text" class="validate">
                      <label for="domicilio">domicilio</label>
                    </div>
                    <div class="input-field col s5">
                      <input id="ciudad" name="ciudad" type="text" class="validate">
                      <label for="ciudad">ciudad</label>
                    </div>
                  </div>
                <div class="row">
                    <div class="input-field col s3">
                      <input id="cp" name="cp" type="text" class="validate">
                      <label for="cp">cp</label>
                    </div>
                    <div class="input-field col s9">
                      <input type="tel" id="tel" name="tel" pattern="\[0-9]{3}\[0-9]{3}[0-9]{4}" title="Utiliza un formato valido 0123456789" class="validate">
                      <label for="tel">tel</label>
                    </div>
                  </div>
                <center><input type="submit" class="btn center" value="Ingresar datos" name="ingresar_sucursal"></center>
                </form>
              </div>
        </div>
    </div>
</div>
    <script href="scripts.js"></script>
</body>
</html>