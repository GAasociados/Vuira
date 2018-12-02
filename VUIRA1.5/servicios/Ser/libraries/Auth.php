<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{
    public $ci;
    public $id;
    public $suuId;
    public $usuarioId;
    public $personaId;
    public $curriculumVitae;
    public $token;
    public $username;
    public $perfilId;
    public $password;
    public $correoElectronico;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $vista;
    public $errorCode;

    public function getCurriculumVitae()
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae($curriculumVitae)
    {
        $this->curriculumVitae = $curriculumVitae;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setToken($value)
    {
        $this->token = $value;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setUsername($value)
    {
        $this->username = $value;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setVista($value)
    {
        $this->vista = $value;
    }

    public function getVista()
    {
        return $this->vista;
    }

    public function getPerfilId()
    {
        return $this->perfilId;
    }

    public function setPerfilId($perfilId)
    {
        $this->perfilId = $perfilId;
    }

    public function getSuuId()
    {
        return $this->suuId;
    }

    public function setSuuId($suuId)
    {
        $this->suuId = $suuId;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function getPersonaId()
    {
        return $this->personaId;
    }

    public function setPersonaId($personaId)
    {
        $this->personaId = $personaId;
    }

    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }

    public function getInfo()
    {
        $respuesta = new stdClass();
        $respuesta->username = $this->ci->session->userdata("username");
        $respuesta->suuId = $this->ci->session->userdata("suu_id");
        return $respuesta;
    }

    public function signIn()
    {
        try {
            //crear sesiones
            $datosSesion = array(
                'token' => $this->token,
                'logged_in' => true,
            );
            $this->ci->session->set_userdata($datosSesion);
            //datos desde el WS
            //$_POST['token'] = $this->token;
            $url = $this->ci->config->item('url_webservice') . "api/usuario/";
            $parametros = "";
            //die(json_encode($_POST));
            foreach ($_POST as $key => $value) {
                $parametros .= $key . '=' . $value . '&';
            }
            //rtrim($parametros, '&');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
            // Recibir respuesta
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuestaServidor = curl_exec($ch);
            curl_close($ch);
            if ($respuestaServidor != null) {
                $respuestaServidor = json_decode($respuestaServidor);
                //crear sesion
                $sesionDatos = array(
                    $this->ci->config->item('username_session') => $respuestaServidor->username,
                    "suuId" => (int)$respuestaServidor->id,
                    "personaId" => (int)$respuestaServidor->personaId,
                    "username" => $respuestaServidor->username,
                    "perfilId" => (int)$respuestaServidor->perfilId,
                    "curriculumVitae" => $respuestaServidor->curriculumVitae,
                    "correoElectronico" => $respuestaServidor->correoElectronico,
                    "nombre" => $respuestaServidor->nombre,
                    "primerApellido" => $respuestaServidor->primerApellido,
                    "segundoApellido" => $respuestaServidor->segundoApellido,
                    "respuesta" => json_encode($respuestaServidor),
                    'logged_in' => true
                );
                $this->correoElectronico=$respuestaServidor->correoElectronico;
                //extraer datos de usuario local
                //$this->ci->load->model("Login_model");
                //$this->ci->load->model("Usuario_model", "usuario");
                //$this->ci->usuario->setSuuId((int)$respuestaServidor->id);
                //$this->ci->usuario->get();
                $sesionDatos['usuarioId'] = null;
                //if ($this->ci->usuario->get()) {
                //    $sesionDatos['usuarioId'] = (int)$this->ci->usuario->getId();
                //}
                $this->ci->session->set_userdata($sesionDatos);
                //die(json_encode($_SESSION));
                return true;
            }
            try {
            } catch (Exception $ex) {
                return false;
            }
        } catch (Exception $e) {
            return true;
        }
    }

    public function signOut()
    {
        try {
//eliminar sesiones
            $this->ci->session->sess_destroy();
            return true;
        } catch (Exception $e) {
            return true;
        }
    }

    public function isSigned()
    {
        try {
//die(json_encode($this->ci->session));
            if ($this->ci->session->userdata('logged_in')) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function checkAccess()
    {
        try {
//datos desde el WS
            $_POST['token'] = $this->ci->session->token;
            $_POST['vista'] = $this->vista;
            $_POST['option'] = 'checkAccess';
// die(json_encode($_POST));
            $url = $this->ci->config->item('url_webservice') . "api/usuario/";
            $parametros = "";
            foreach ($_POST as $key => $value) {
                $parametros .= $key . '=' . $value . '&';
            }
//die(json_encode($parametros));
            rtrim($parametros, '&');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
// Recibir respuesta
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuestaServidor = curl_exec($ch);
            curl_close($ch);
            $respuestaServidor = json_decode($respuestaServidor);
            if (isset($respuestaServidor->id)) {
                if (is_numeric($respuestaServidor->id)) {
                    return true;
                }
            } else {
                return false;
            }
            try {
            } catch (Exception $ex) {
                return false;
            }
        } catch (Exception $e) {
            return true;
        }
    }

    public function insertarPersona()
    {
        try {
            $url = $this->ci->config->item('url_webservice') . "api/Persona/";
            if (isset($_POST["token"])) {
                $this->token = $_POST["token"];
            }
            $_POST["action"] = "insert";
            $campos = http_build_query($_POST);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $campos);
// Recibir respuesta
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuestaServidor = curl_exec($ch);
            curl_close($ch);
            $respuestaServidor = json_decode($respuestaServidor);
            if ($respuestaServidor->success) {
//Crear sesion insertedId de persona
                $personaId = $respuestaServidor->insertedId;
                $documentoId = 1; // Hardcode que indica el id de doc para CV
                $sesionDatos = array("personaId" => $respuestaServidor->insertedId);
                $this->ci->session->set_userdata($sesionDatos);
                $this->ci->load->library('ftp');
                $this->ci->load->helper('string');
//subir archivo
                $origen = $_FILES['cv']['tmp_name'];
                $archivoDestino = random_string('alnum', 16) . '.pdf';
                $destino = "10.16.42.32";
                $folderDestino = '/auth2/files/' . $respuestaServidor->insertedId . '/';
                $destino = $folderDestino . $archivoDestino;
                if ($this->ci->ftp->connect()) {
                    $list = $this->ci->ftp->list_files($folderDestino);
                    $conteoArchivos = count($list);
//crear folder si no existe
                    $folderOk = false;
                    if ($conteoArchivos == 0) {
                        if ($this->ci->ftp->mkdir($folderDestino, 0755)) {
                            $folderOk = true;
                        } else {
//de mkdir
                        }
                    } else {
                        $folderOk = true;
                    }
                    if ($folderOk) {
                        if ($this->ci->ftp->upload($origen, $destino, 'binary', 0775)) {
//Insertar documentoPersona mediante el WS
                            $url = $this->ci->config->item('url_webservice') . "api/personaDocumento/";
                            $_POST["action"] = "insert";
                            $_POST["personaId"] = $personaId;
                            $_POST["documentoId"] = $documentoId;
                            $_POST["url"] = $destino;
                            $campos = http_build_query($_POST);
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $campos);
// Recibir respuesta
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $respuestaServidor = curl_exec($ch);
                            curl_close($ch);
                            $respuestaServidor = json_decode($respuestaServidor);
                            if ($respuestaServidor->success) {
                                $serverHost = "http://10.16.42.32";
                                $sesionDatos = array("curriculumVitae" => $serverHost . $destino);
                                $sesionDatos = array("personaId" => $personaId);
                                $this->ci->session->set_userdata($sesionDatos);
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                if (isset($respuestaServidor->code)) {
                    $this->errorCode = $respuestaServidor->code;
                }
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->config->load('auth');
        $this->ci->load->library('session');
//verificar sesiones
        if ($this->ci->session->token) {
            $this->token = $this->ci->session->token;
        }
        if ($this->ci->session->suuId) {
            $this->suuId = $this->ci->session->suuId;
        }
        if ($this->ci->session->usuarioId) {
            $this->usuarioId = $this->ci->session->usuarioId;
        }
        if ($this->ci->session->username) {
            $this->username = $this->ci->session->username;
        }
        if ($this->ci->session->perfilId) {
            $this->perfilId = $this->ci->session->perfilId;
        }
        if ($this->ci->session->personaId) {
            $this->personaId = $this->ci->session->personaId;
        }
        if ($this->ci->session->curriculumVitae) {
            $this->curriculumVitae = $this->ci->session->curriculumVitae;
        }
        if ($this->ci->session->correoElectronico) {
            $this->correoElectronico = $this->ci->session->correoElectronico;
        }
        if ($this->ci->session->nombre) {
            $this->nombre = $this->ci->session->nombre;
        }
        if ($this->ci->session->primerApellido) {
            $this->primerApellido = $this->ci->session->primerApellido;
        }
        if ($this->ci->session->segundoApellido) {
            $this->segundoApellido = $this->ci->session->segundoApellido;
        }
        if (isset($this->personaId)) {
            $this->ci->load->model("Persona_model", "Persona");
            $this->ci->Persona->setId($this->personaId);
            if ($this->ci->Persona->get()) {
                $this->username = $this->ci->Persona->getUsername();
                $this->curp = $this->ci->Persona->getCurp();
                $this->rfc = $this->ci->Persona->getRfc();
                $this->curriculumVitae = $this->ci->Persona->getCurriculumVitae();
                $this->correoElectronico = $this->ci->Persona->getCorreoElectronico();
                $this->nombre = $this->ci->Persona->getNombre();
                $this->primerApellido = $this->ci->Persona->getPrimerApellido();
                $this->segundoApellido = $this->ci->Persona->getSegundoApellido();
            }
        }
    }
}

?>