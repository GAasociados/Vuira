<?php
 
if ( 0 < $_FILES['file']['error'] ) {
echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else
{
move_uploaded_file($_FILES['file']['tmp_name'], '../assets/tramites/clavescatastralesfraccionamiento/wordFiles/' . $_FILES['file']['name']);
//echo getcwd();
echo "Transferencia de archivo satisfactoria!!";
}
?>