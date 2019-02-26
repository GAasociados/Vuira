<?php
include_once("guzzle/vendor/autoload.php");class Motorpago{ private $myconfig; public function __construct(){$this->myconfig=parse_ini_file("Motorpago.ini");}function procesa_pago($referencia,$url_response_ok,$url_response_ko,$prueba=0){$id=$referencia;$url_response_ok=$url_response_ok;$url_response_ko=$url_response_ko;$error=0;$service_url=$this->myconfig["ruta"]["motor"];if($error==0){$curl_post_data=array('Mp_id'=>$id,'Mp_url_ok'=>$url_response_ok,'Mp_url_ko'=>$url_response_ko,'Mp_user'=>$this->myconfig["auth"]["user"],'Mp_token'=>$this->myconfig["auth"]["token"],'Mp_prueba'=>$prueba);$params=array('http'=>array('method'=>'POST','content'=>http_build_query($curl_post_data)));$ctx=stream_context_create($params);$fp=@fopen($service_url,'rb',false,$ctx);if($fp){echo @stream_get_contents($fp);die();}else { throw new Exception("Error al llamar al motor de pago '$service_url'");}}}function get_referencia($dependencia_id,$persona_id=null,$empresa_id=null,$usuario_id,array$detalle,$fecha_limite=null,$custom_data=null){$url=$this->myconfig["ruta"]["insert"];$client=new GuzzleHttp\Client();$params=array();$params["dependencia_id"]=$dependencia_id;$params["usuario_id"]=$usuario_id;$params["persona_id"]=$persona_id;$params["empresa_id"]=$empresa_id;$params["detalle"]=$detalle;$params["fecha_limite"]=$fecha_limite;$params["custom_data"]=$custom_data;$request["form_params"]=$params;$response=$client->request('POST',$url,$request);$body=$response->getBody();return json_decode($body);}function get_total_clave_ingreso($id_orden,$cantidad){$service_url=$this->myconfig["ruta"]["clave"].$id_orden."/".$cantidad;$client=new GuzzleHttp\Client();$res=$client->request('GET',$service_url);return json_decode($res->getBody());}function get_detalles_referencia($referencia){$service_url=$this->myconfig["ruta"]["select"].$referencia;$client=new GuzzleHttp\Client();$res=$client->request('GET',$service_url);return json_decode($res->getBody());}function obten_movimientos_banco($referencia){$service_url=$this->myconfig["ruta"]["movimientos"];$client=new GuzzleHttp\Client();$params=array();$params['ref']=$referencia;$request["form_params"]=$params;$response=$client->request('POST',$service_url,$request);$body=$response->getBody();return json_decode($body);}}?>
