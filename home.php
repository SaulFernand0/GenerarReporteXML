<?php
    require "index.php";
    if(isset($_GET['submit'])){
        $fecha_inicio = $_GET['f_i'];
        $fecha_final = $_GET['f_f'];
        $client = $_GET['cliente'];
        call($fecha_inicio, $fecha_final, $client);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <form>
            <div class="row row-cols-4">
                <div class="col col-lg-2">
                    <input class="form-control" type="date" name="f_i">
                </div>

                <div class="col col-lg-2">
                    <input class="form-control" type="date" name="f_f">
                </div>

                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="cliente"> 
                        <option selected>Clientes</option>
                            <?php
                                require "conexion.php";
                                $respuesta = mysqli_query($conex, "select * from cliente");
                                while($row=$respuesta->fetch_assoc()){
                                    echo "<option value='{$row['idcliente']}'>{$row['nombres']}</option>";
                                }  
                            ?>
                    </select>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 745px;">Generar Reporte</button>
                </div>
            </div>
        </form>
    </div>

    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>
