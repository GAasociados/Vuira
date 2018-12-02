<?php  
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once( "../DataConexion.php");


$obj = new generalFracc();

print_r($obj->getReasignar(10));

if(isset($_GET['service_name']))
{
	switch ($_GET['service_name']) 
	{
		case 'asignacion':
			print_r(json_encode($obj->getAsignacion(isset($_GET['idaux']) ? $_GET['idaux'] : -1), JSON_UNESCAPED_SLASHES));
			break;
		
		case 'clave':
			print_r(json_encode($obj->getClave(isset($_GET['idusr']) ? $_GET['idusr'] : -1), JSON_UNESCAPED_SLASHES));
			break;


		default:
			echo "El servicio no existe. / Service doesn't exist.";
			break;
	}
}

class generalFracc
{
	public function generalFracc()
	{
		$this->con = new conection();
	}

    //OBTIENE TODOS LOS REGISTROS DE FRACC
	public function getMaxItemById()
	{
		return $this->con->executeQuerry("SELECT MAX(ID) AS maximo FROM claves_catastrales_fraccionamiento");
	}

	//ASIGNACIÓN POR AUXILIAR
	public function getAsignacion($id)
	{
		return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status >= 3 AND validacion  = 0 AND auxiliar = '" . $id . "'");
	}

	//POR SOLICITUD
	public function getAllReg($id)
	{
		return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE id_solicitud = '" . $id . "'");	
	}

	//OBTENER TODOS LOS TRÁMITES CON ESTATUS 2
	public function getTramites()
	{
        return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status = 2");
	}

	//CONTEO
	public function totalRowsC($clave = NULL)
	{
		return count($this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE clave " . (($clave == NULL) ? " IS NULL" : "= '$clave'")));
	}

	//OBTENER NOMBRE PROPIETARIO POR CLAVE
	public function getDataByClave($clave = NULL) 
	{
		return $this->con->executeQuerry("SELECT nombrepropietariodp FROM claves_catastrales_fraccionamiento WHERE clave LIKE '%" . (($clave == NULL) ? "" : $clave) . "%'");
    }

    //OBTIENE TODOS LOS TRÁMITES CON ESTATUS 4 O MAYOR
    public function getValidaciones($limit, $start = 0, $numerocontrol = NULL) 
    {
    	return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status >= 4 AND numerocontrol LIKE " . (($numerocontrol == NULL) ? "'%'" : "'$numerocontrol'") . " AND validacion = 0 LIMIT $limit OFFSET $start");
    }

    //OBTIENE TODOS LOS REGISTROS DE LA TABLA FRACC ORDENADOS DEL ÚLTIMO AL MÁS VIEJO
    public function getAll() 
    {
    	return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento ORDER BY ID DESC");
    }

    //OBTIENE UN REGISTRO QUE TENGA PERMITIDO UN USUARIO ESPECÍFICO
    public function getById($id, $session) 
    {
    	return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE ID = '$id' AND usuarioID = '$session'");
    }

    //OBTIENE CUALQUIER REGISTRO SOLO CON EL ID
    public function getByIdAdmin($id) 
    {
    	return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE ID = '$id'");
    }

    //OBTIENE EL TOTAL DE FILAS CON NÚMERO DE CONTROL QUE CONTENGAN NÚMEROS PARECIDOS
    public function totalRows($q = NULL) 
    {
        return count($this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE numerocontrol LIKE " . (($q == NULL) ? "'%'" : $q)));
    }

    //OBTIENE TODAS LAS AUTORIZACIONES
    public function getAutorizaciones($limit, $start = 0, $numerocontrol = NULL) 
    {
        return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status = 4 AND numerocontrol LIKE " . (($numerocontrol == NULL) ? "'%'" : "'$numerocontrol'") . " AND validacion = 1 AND autorizacion = 0 LIMIT $limit OFFSET $start");
    }

    //CUENTA LAS VALIDACIONES
    public function totalRowsValidaciones($numerocontrol = NULL) 
    {
        return count($this->getValidaciones($numerocontrol));
    }

    //CUENTA LAS AUTORIZACIONES
    public function totalRowsAutorizaciones($numerocontrol = NULL) 
    {
        return count($this->getAutorizaciones($numerocontrol));
    }

    public function getReasignar($limit, $start = 0, $numerocontrol = NULL) 
    {
        return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status >= 2 AND auxiliar <> '' AND numerocontrol LIKE " . (($numerocontrol == NULL) ? "'%'" : "'$numerocontrol'") . " LIMIT $limit OFFSET $start");
    }
}

/*
    function get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave) {
        $SQL = "SELECT * FROM " . $this->table . " WHERE ";

        $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
        $nombrepropietario = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $nombrepropietario);

        if (!empty($nombrepropietario)) {
            $SQL .= " nombrepropietariodp LIKE '%" . $nombrepropietario . "%' AND ";
        }

        $clave = $this->db->escape_like_str($clave);
        $clave = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $clave);

        if (!empty($clave)) {
            $SQL .= " clave LIKE '%" . $clave . "%' AND ";
        }
        if (!empty($nos)) {
            $SQL .= " numerocontrol LIKE '%" . $nos . "%' AND ";
        }

        $status = $this->db->escape_like_str($status);
        $status = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $status);

        if (!empty($status)) {
            $SQL .= "status = '" . $status . "' AND ";
        }

        //$fechainicio = $this->db->escape_like_str($fechainicio);
        //$fechainicio = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechainicio);

        if (!empty($fechainicio)) {
            $SQL .= "fechainicio >= '" . $fechainicio . "' AND ";
        }

        //$fechafinal = $this->db->escape_like_str($fechafinal);
        //$fechafinal = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechafinal);

        if (!empty($fechafinal)) {
            $SQL .= "fechafinal <= '" . $fechafinal . "' AND ";
        }

        $SQL .= "1 = 1";

        $consulta = $this->db->query($SQL);

        //$consulta = $this->db->query("SELECT * FROM contratacion_y_servicios_de_agua_y_drenaje_domestico WHERE fechainicio >= '".$fechainicio."' AND fechafinal <= '".$fechafinal."'");

        return $consulta->result();
        //echo $SQL;
    }
    // get data by id
    

    // get total rows
    

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', 'DESC');
//        $this->db->like('ID', $q);
//        $this->db->or_like('calleui', $q);
//        $this->db->or_like('noloteui', $q);
//        $this->db->or_like('nomanzanaui', $q);
//        $this->db->or_like('nooficialui', $q);
//        $this->db->or_like('cbocoloniaui', $q);
//        $this->db->or_like('predialui', $q);
//        $this->db->or_like('mapa', $q);
//        $this->db->or_like('nombrepropietariodp', $q);
//        $this->db->or_like('razonsocial', $q);
//        $this->db->or_like('representantelegal', $q);
//        $this->db->or_like('calledp', $q);
//        $this->db->or_like('numerodp', $q);
//        $this->db->or_like('coloniadp', $q);
//        $this->db->or_like('correodp', $q);
//        $this->db->or_like('telefonodp', $q);
//        $this->db->or_like('tipotramitedp', $q);
//        $this->db->or_like('doctoine', $q);
//        $this->db->or_like('doctopodersimple', $q);
//        $this->db->or_like('doctoplanodigital', $q);
//        $this->db->or_like('doctolegal', $q);
//        $this->db->or_like('doctooficio', $q);
//        $this->db->or_like('doctoplanofisico', $q);
//        $this->db->or_like('doctopredial', $q);
//        $this->db->or_like('status', $q);
//        $this->db->or_like('mensaje', $q);
        $this->db->or_like('numerocontrol', $q);

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
        $this->db->where('validacion', 1);
        $this->db->where('autorizacion', 1);
        $this->db->where('valido_pago', 0);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_limit_data_ventana($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', 'DESC');

        $this->db->like('numerocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
//         die(print_r( $this->db->like('numerocontrol', $q),true));s
        $this->db->limit($limit, $start);
//      die(print_r( $this->db->get($this->table)->result(),true));
        return $this->db->get($this->table)->result();
    }

    function total_rows_ventana($q = NULL) {
        $this->db->order_by('notificacion', 'asc');
        $this->db->like('numerocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    function total_rows_reasignar($q = NULL) {
        $id = 2;
        $this->db->like('numerocontrol', $q);
        $this->db->where('status >=', $id);
        $this->db->where('auxiliar !=', "");
        $this->db->from($this->table);



        return $this->db->count_all_results();
    }

*/
?>


