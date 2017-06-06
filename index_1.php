<?php
session_start();

if (isset($_SESSION['loggedin']))  
{ 
echo 'Hola, '; 
echo '<b>'.$_SESSION['username']. '</b>.'; 

    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Ingresar Producto </title>
        <link href="css/form.css" type=" text/css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-1.7.2.min_1.js"></script>
        <script type="text/javascript" src="js/efectoform.js"></script>
    </head>   
    <body>
        <div id="todo">
            <div id="principal">
                <h1>PRODUCTO</h1>
            </div>
            <br>
            <div id="formulario">
                <div id="titulo">
                    <h1>Producto</h1>
                </div>
                <form id="tabla1"  method="post" enctype="multipart/form-data" action="Control.php"><br>
                    <fieldset id="form1">
                        <legend>
                            Datos Producto
                        </legend><br>
                        <div id="parte1">
                            <label for="nombre">Nombre:<span>*</span> </label><input type="text" name="nombre" id="nombre" required><br>
                            <br><label for="id_producto">Id producto:<span>*</span> </label><input type="text" name="id_producto" id="id_producto" required><br>
                            <br><label for="precio">Precio:<span>*</span> </label><input type="text" name="precio" id="precio" required><br>
                        </div>
                        <div id="parte2">

                            <label for="categoria">Categoria: <span>*</span></label>
                            <select id="categoria" name="categoria" required>
                                <?php
                                require_once 'DataBase.php';
                                $db = new DataBase();
                                $db->Conectar();
                                $res = $db->consultar("categoria");
                                while ($row = mysqli_fetch_array($res)) {
                                    $id_categoria = $row[0];
                                    $nombre_c = $row[1];
                                    ?>
                                <option value="<?php echo $id_categoria ?>"><?php echo $nombre_c ?></option>
                                <?php
                                }
                                ?>
                            </select><br>

                            <br><label for="fotografia">Fotografia:<span>*</span> </label><input name="fotografia" id="fotografia" type="file" required>
                        </div>
                    </fieldset><br>
                    <input type="submit" value="Enviar producto" class="btn" name="enviarproducto"  id="enviarproducto"><br><br>
                </form>
            </div>     

            <div id="formulario">
                <div id="titulo">
                    <h1>Detalle</h1>
                </div>
                <form id="tabla1"  method="post" enctype="multipart/form-data" action="Control.php"><br>
                    <fieldset id="form1">
                        <legend>
                            Datos del detalle del producto
                        </legend><br>
                        <div id="parte1">
                            <br><label for="id_detalle">Id detalle:<span>*</span> </label><input type="text" name="id_detalle" id="id_detalle" required><br>
                            <br><label for="id_producto">Id producto:<span>*</span> </label><input type="text" name="id_producto" id="id_producto" required><br>              
                        </div>
                        <div id="parte2">
                            <label for="fabricante">Fabricante:<span>*</span> </label><input type="text" name="fabricante" id="fabricante" required><br>
                            <br><label for="caracteristica">Caracteristica:<span>*</span> </label><textarea name="caracteristica" id="caracteristica" type="text" required></textarea>
                        </div>
                    </fieldset><br>
                    <input type="submit" value="Enviar Detalle" class="btn" name="enviardetalle"  id="enviardetalle"><br><br>
                </form>
            </div> 

            <div id="formulario">
                <div id="titulo">
                    <h1>Stock</h1>
                </div>
                <form id="tabla1"  method="post" enctype="multipart/form-data" action="Control.php"><br>
                    <fieldset id="form1">
                        <legend>
                            Stock del producto
                        </legend><br>
                        <div id="parte1">
                            <br><label for="id_stock">Id Stock:<span>*</span> </label><input type="text" name="id_stock" id="id_stock" required><br>
                            <br><label for="id_producto">Id producto:<span>*</span> </label><input type="text" name="id_producto" id="id_producto" required><br>              
                        </div>
                        <div id="parte2">
                            <label for="cantidad">cantidad:<span>*</span> </label><input type="number" name="cantidad" id="cantidad" min="1" max="10" required><br>
                            <br><label form="disponibilidad">Disponibilidad:<span>*</span> </label>
                            <br><input type = "Radio" id="si" name="disponibilidad" value="si"><label for="si" required>Si</label><br>
                            <br><input type = "Radio" id="no" name="disponibilidad" value="no"><label for="no">No</label><br>
                        </div>
                    </fieldset><br>
                    <input type="submit" value="Enviar Stock" class="btn" name="enviarstock"  id="enviarstock"><br><br>
                </form>
            </div> 

       
            <br>
            <input type="button" value="consultar" name="consultar"  id="consultar" onclick="location = 'TablaConsulta.php'">
        </div>
    </body>
</html>
