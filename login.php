<?php
session_start();
?>
<?php
require_once 'DataBase.php';
$db = new DataBase();
$db->conectar();
$rec = $db->consultar("usuario");
while ($row = mysqli_fetch_array($rec)) {
    $cedula = $row[0];
$nombre = $row[1];
$pais = $row[2];
$correo = $row[3];
$ciudad = $row[4];
$codigo = $row[5];
$telefono = $row[6];
$t_usuario = $row[7];
}

 $_SESSION['cedula' ]= $cedula;
 $_SESSION['pais' ]= $pais;
 $_SESSION['correo' ]= $correo;
 $_SESSION['ciudad' ]= $ciudad;
 $_SESSION['codigo' ]= $codigo;
 $_SESSION['telefono' ]= $telefono;
 $_SESSION['t_usuario' ]= $t_usuario;
 $_SESSION['nombre' ]= $nombre;
 
?>
<!DOCTYPE HTML>
<head>
    <title>Tienda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script> 
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <script type="text/javascript">

        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '3', speed: 'fast', effect: 'fade'});
        });
    </script>



</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="header_top">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.jpg" alt="" /></a><div class="col_1_of_4 span_1_of_4"><h4>TIENDA</h4></div>
                </div>
                <div class="header_top_right">
                    <div class="search_box">
                        <form>
                            <input type="text" value="Buscar producto" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Buscar producto';
                                    }"><input type="submit" value="Buscar">
                        </form>
                    </div>
                    <div class="shopping_cart">
                        <div class="cart">
                            <a href="CarritoDeCompras.php" title="Ver mi Carrito de compras" rel="nofollow">
                                <strong class="opencart"> </strong>
                                <span class="cart_title">Carrito</span>
                                <span class="no_product">(Vacio)</span>
                            </a>
                        </div>
                    </div>

                    <div class="login">
                        <span><a href="login.php"><img src="images/login.png" alt="" title="login"/></a></span>
                    </div>
                    <div class="login">
                        <span><a href="logout.php"><img src="images/sesion.jpg" alt="" title="sesion"/></a></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="header_top">
                <div class="header_top_center">
                    <div id="navegador">
                        <div class="menu">
                            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="Categorias.php">Categorias</a></li>
                                <li>    <?php
                                    if (isset($_SESSION['loggedin'])) {
                                        echo 'Hola, ';
                                        echo '<b>' . $_SESSION['username'] . '</b>.';
                                    }
                                    ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div class="main">
                <div class="content">

                    <div class="login_panel" id="login_panel">
                        <h3>Cuenta existente</h3>                      
                        <form method="post" enctype="multipart/form-data" action="conexion.php">
                            <input name="correo" id="correo" type="text" value="Correo" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'correo';
                                    }" required>
                            <input name="cedula" id="cedula" type="text" value="Cedula" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'cedula';
                                    }" required>

                            <p class="note">Si olvido su contraseña haga click <a href="#">Aqui</a></p>

                            <div class="buttons"><div><button type="submit" class="grey" name="iniciarsesion" id="iniciarsesion">Iniciar sesion</button></div></div>                       
                        </form>
                    </div>

                    <div class="register_account" id="register_account">
                        <h3>Registrar nueva cuenta</h3>
                        <form method="post" enctype="multipart/form-data" action="Control.php">
                            <table>
                                <tbody><tr><td><div><input type="text" value="Nombre y apellido" name="nombre" id="nombre" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Nombre y apellido';
                                        }" required></div>
                                            <br><label form="T_usuario">Tipo Usuario:</label><br>
                                            <input type = "Radio" id="T_usuario" name="T_usuario" value="Administrador"><label for="T_usuario" required>Administrador</label>
                                            <input type = "Radio" id="T_usuario" name="T_usuario" value="Usuario"><label for="T_usuario">Usuario</label><br>
                                            <div><input type="email" value="Correo" class="email" name="correo" id="correo" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                        this.value = 'Correo';
                                                    }" required></div>
                                            <div><input type="text" value="Cedula" name="cedula" id="cedula" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                        this.value = 'Cedula';
                                                    }" required></div>
                                        </td>
                                        <td>
                                            <div><select id="pais" name="pais" onchange="change_country(this.value)" class="frm-field required" required>
                                                    <option value="null">Selecciona tu pais</option>         
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua And Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, Democractic Republic</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
                                                    <option value="HR">Croatia (Hrvatska)</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="TP">East Timor</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Islas Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji Islands</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="FX">France, Metropolitan</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia, The</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong S.A.R.</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KR">Korea</option>
                                                    <option value="KP">Korea, North</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macau S.A.R.</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua new Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn Island</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts And Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent And The Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                </select></div>		        
                                            <div><input type="text" value="Ciudad" name="ciudad" id="ciudad" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                        this.value = 'Ciudad';
                                                    }" required></div>
                                            <div>
                                                <input type="text" value="" id="codigo" name="codigo" class="code" required> - <input type="text" name="telefono" id="telefono" value="" class="number" required>
                                                <p>Codigo del Pais + Numero Telefonico</p>
                                            </div>                                        
                                        </td>
                                    </tr> 
                                </tbody></table> 
                            <div class="g-recaptcha" data-sitekey="6LeGwxsUAAAAAI6NX5QkV60oWm_5BGgvcWFO57Sf"></div>
                            <div class="search"><div><button type="submit" class="grey" name="enviarcliente" id="enviarcliente">Crear nueva cuenta</button></div></div>
                            <p class="terms">Al darle click en 'Crear nueva cuenta' tu aceptas los <a href="#">Termino y Condiciones</a>.</p>
                            <div class="clear"></div>
                        </form>
                    </div>    	
                    <div class="clear"></div>
                </div>
            </div>
            <div id="datos">
                <h1>Datos del Usuario:</h1><br><br>
                <label> Cedula: <?php echo $_SESSION['cedula'] ?></label><br><br>
                <label> Nombre: <?php echo $_SESSION['nombre'] ?></label><br><br>
                <label> Pais: <?php echo $_SESSION['pais'] ?></label><br><br>
                <label> Correo: <?php echo $_SESSION['correo'] ?></label><br><br>
                <label> Ciudad: <?php echo $_SESSION['ciudad'] ?></label><br><br>
                <label> Codigo de pais: <?php echo $_SESSION['codigo'] ?></label><br><br>
                <label> Telefono: <?php echo $_SESSION['telefono'] ?></label><br><br>
                <label> Tipo de usuario: <?php echo $_SESSION['t_usuario'] ?></label><br><br>
            </div>
            <br><br>
        </div>
    </div>

    <div class="footer">
        <div class="wrapper">	
            <div class="section group">

                <div class="col_1_of_4 span_1_of_4">
                    <h4>Contacto</h4>
                    <ul>
                        <li><span>+57 3204529649</span></li>
                    </ul>
                    <div class="social-icons">
                        <h4>Redes sociales</h4>
                        <ul>
                            <li class="facebook"><a href="#" target="_blank"> </a></li>
                            <li class="twitter"><a href="#" target="_blank"> </a></li>                                                
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="copy_right">
                <p>Compant Name © All rights Reseverd</p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin'])) {
        ?> 
        <script lenguage="JavaScript" type="text/javascript" src="js/Ocultar.js">formAdmin();</script>
        <?php
    }elseif (!isset($_SESSION['loggedin'])) {
        ?> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datos').hide();
            }
            );
        </script>
        <?php
    }
    ?>
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>

    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

