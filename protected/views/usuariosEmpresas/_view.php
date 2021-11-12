<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario),array('view','id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_name')); ?>:</b>
	<?php echo CHtml::encode($data->pw_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_passwd')); ?>:</b>
	<?php echo CHtml::encode($data->pw_passwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_uid')); ?>:</b>
	<?php echo CHtml::encode($data->pw_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_gid')); ?>:</b>
	<?php echo CHtml::encode($data->pw_gid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_gecos')); ?>:</b>
	<?php echo CHtml::encode($data->pw_gecos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_dir')); ?>:</b>
	<?php echo CHtml::encode($data->pw_dir); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_shell')); ?>:</b>
	<?php echo CHtml::encode($data->pw_shell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dominio')); ?>:</b>
	<?php echo CHtml::encode($data->dominio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_activo')); ?>:</b>
	<?php echo CHtml::encode($data->pw_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_codigo_tributario')); ?>:</b>
	<?php echo CHtml::encode($data->pw_codigo_tributario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_correo')); ?>:</b>
	<?php echo CHtml::encode($data->pw_correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_reg')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificado')); ?>:</b>
	<?php echo CHtml::encode($data->modificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locode')); ?>:</b>
	<?php echo CHtml::encode($data->locode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('planilla_numero')); ?>:</b>
	<?php echo CHtml::encode($data->planilla_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_ultimo_acceso')); ?>:</b>
	<?php echo CHtml::encode($data->pw_ultimo_acceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_passwd_dias')); ?>:</b>
	<?php echo CHtml::encode($data->pw_passwd_dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_passwd_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->pw_passwd_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_user_ip')); ?>:</b>
	<?php echo CHtml::encode($data->pw_user_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pw_sis_id')); ?>:</b>
	<?php echo CHtml::encode($data->pw_sis_id); ?>
	<br />

	*/ ?>

</div>