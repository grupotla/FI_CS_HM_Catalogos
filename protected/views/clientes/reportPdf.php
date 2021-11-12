<?php $columns = array(
		'id_cliente',
		'codigo_tributario',
		'nombre_cliente',
		'email',
		'codigo_tributario',
		'id_tipo_identificacion_tributaria',
		array('name'=>'id_cliente','value'=>'$data->ClienteTIT->tipo','header'=>'Tipo Ide'),
		array('name'=>'id_cliente','value'=>'$data->contactos2->nombres','header'=>'Contacto'),
		array('name'=>'id_cliente','value'=>'$data->contactos2->telefono','header'=>'Telefono'),
);

include_once("CleanGrid.php");

?>
