<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$options =  array('upload_dir'=>$_SERVER['DOCUMENT_ROOT'].'/facturacion/uploads/', 'upload_url'=>$_SERVER['SERVER_NAME'].'/facturacion/uploads/');
$upload_handler = new UploadHandler($options);
