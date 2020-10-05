<?php date_default_timezone_set('America/Bogota');
// Clase de Conexion
require_once "conect.php";
/*---------------------------------------------------------------------------------------------*/
#Titulo:	MODELO DE EVENTOS
/*---------------------------------------------------------------------------------------------*/
#►Descripcion: Realica las consultas a la bbdd segun peticion del control
#►Clase: Eventos Model
class LoginMDL
{
    #►Propiedades:-------------------------------------------------------
    // Propiedad par la conexion
    protected static $cnx_BDB;
    #►Metodo-1:Llamar una conexion con bd
    public static function getConection()
    {
        //llamado de una coexion
        self::$cnx_BDB = Conexion::ConectarBDB();
    }
    #►Metodo-2:Cerrar conexion con bd
    public static function cierraConexion()
    {
        //Vaciar la conexion
        self::$cnx_BDB = null;
    }
    #►Metodo-1:Historial acceso
    public static function historialAccesoMDL($usu, $tabla)
    {
        $response = "Error al crear taller";
        // Consulta sql
        $sqlQuery = "INSERT INTO `" . $tabla . "` (`usuario`, `fecha`) VALUES ( :usu ,'" . date('Y-m-d H:i:s') . "');";
        // Llamar conexion con db
        self::getConection();
        // Preparar consulta
        $stmt = self::$cnx_BDB->prepare($sqlQuery);
        // Paso de parametros
        $stmt->bindParam(":usu", $usu);

        //preguntamos si se inserto el registro
        $stmt->execute();

        self::cierraConexion();
    }

    #►Metodo-3:Login usuario
    public function LoginUserMDL($objUsuario, $tabla)
    {
        //Consulta SQL->

        $sqlQuery = "SELECT * from $tabla WHERE email = :usu and contra =:pss and estado=1";

        //Llamado de la conexion
        self::getConection();
        $response = [];
        //Preparacion de la consulta
        $stmt = self::$cnx_BDB->prepare($sqlQuery);
        //Paso de parametros
        $password = crypt($objUsuario[1], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $stmt->bindParam(":usu", $objUsuario[0], PDO::PARAM_STR);
        $stmt->bindParam(":pss", $password, PDO::PARAM_STR);
        //Ejecucion de la consulta

        //Retorno de de la fila encontrada
        $stmt->execute();
        if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($fila['estado'] == 0) {
                $response = "usuario Inactivo";
            } else {
                // Parametros de SESSION
                // Iniciar una SESSION
                session_start();
                // Variable de Sesion
                $_SESSION['dash'] = true;
                $_SESSION['user_code'] = $fila['cod'];
                $_SESSION['user_name'] = strtoupper($fila['nombre']);
                $_SESSION['user_rol'] = $fila['rol'];
                setcookie("dash", true, time() + 86400 * 1, "/");
                setcookie("user_code", $fila['cod'], time() + 86400 * 1, "/");
                setcookie("user_name", strtoupper($fila['nombre']), time() + 86400 * 1, "/");
                setcookie("user_rol", $fila['rol'], time() + 86400 * 1, "/");
                // Retorno Respuesta
                $response = ["acceso exitoso", $fila['cod'], $fila['nombre'], $_SESSION['dash']];
                self::historialAccesoMDL($fila['cod'], "historial_accesos");
            }
        } else {
            $response = "acceso denegado";
        }

        //Cierre de conexion
        return $response;
        self::cierraConexion();
    }
    public function ChangePass($email, $tabla)
    {
        //Consulta SQL->
        $retorno = false; //Dj98765Go
        $letras = ["Ar", "zB", "bH", "Dj", "Ex", "uF", "Go", "pH", "wI", "mJ", "Kq"];
        $newPass1 = $letras[rand(0, 10)] . rand(10000, 100000) . $letras[rand(0, 10)];
        $newPass = crypt($newPass1, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $sqlQuery = "update $tabla  set contra=:new_pass WHERE email = :usu";
        //Llamado de la conexion
        self::getConection();
        $response = [];
        //Preparacion de la consulta
        $stmt = self::$cnx_BDB->prepare($sqlQuery);
        //Paso de parametros
        $stmt->bindParam(":usu", $email, PDO::PARAM_STR);
        $stmt->bindParam(":new_pass", $newPass, PDO::PARAM_STR);
        //Ejecucion de la consulta

        //Retorno de de la fila encontrada al controller para validaciones
        $filas = $stmt->execute();

        if ($filas > 0) {
            require "class.phpmailer.php";
            require "class.smtp.php";

            // Datos de la cuenta de correo utilizada para enviar vía SMTP
            $smtpHost = "mail.cpcoriente.org"; // Dominio alternativo brindado en el email de alta
            $smtpUsuario = "gary.incode@cpcoriente.org"; // Mi cuenta de correo
            $smtpClave = "incode2020$$"; // Mi contraseña

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->CharSet = "utf-8";

            // VALORES A MODIFICAR //
            $mail->Host = $smtpHost;
            $mail->Username = $smtpUsuario;
            $mail->Password = $smtpClave;
            $mensaje = $newPass1;

            $mail->From = "evaluacion@neo.cpcoriente.org"; // Email desde donde envío el correo.
            $mail->FromName = "NEO SYSTEM";
            $mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

            $mail->Subject = "Restauración de contraseña"; // Este es el titulo del email.
            $mensajeHtml = nl2br($mensaje);
            $mail->Body = "<html><body > <h1>La contraseña ha sido restaurada satisfactoriamente</h1><p><b>La nueva contraseña es : </b> {$mensaje}</p></body> </html><br />"; // Texto del email en formato HTML
            $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
            // FIN - VALORES A MODIFICAR //

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $estadoEnvio = $mail->Send();
            if ($estadoEnvio) {
                echo "El correo fue enviado correctamente.";
                $retorno = true;
            }
        }
        return $retorno;
    }
    public function RestoreMDL($objUsuario, $tabla)
    {
        //Consulta SQL->

        $sqlQuery = "SELECT * FROM $tabla WHERE email = :usu  and estado=1";
        //Llamado de la conexion
        self::getConection();
        $response = "";
        //Preparacion de la consulta
        $stmt = self::$cnx_BDB->prepare($sqlQuery);
        //Paso de parametros
        $stmt->bindParam(":usu", $objUsuario[0], PDO::PARAM_STR);
        //Ejecucion de la consulta

        //Retorno de de la fila encontrada al controller para validaciones
        $stmt->execute();
        if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (self::ChangePass($objUsuario[0], "usuarios")) {
                $response = "La nueva contraseña fue enviada a $objUsuario[0]";
            } else {
                $response = "La contraseña no pudo ser restaurada";
            }
        } else {
            $response = "El correo $objUsuario[0] no existe o esta deshabilitado";
        }

        return $response;
    }
}
/*Fin------------------------------------------------------------------------------------------*/
