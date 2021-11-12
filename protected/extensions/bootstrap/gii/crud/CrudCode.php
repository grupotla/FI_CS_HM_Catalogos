<?php
/**
 * BootstrapCode class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('gii.generators.crud.CrudCode');

class BootstrapCode extends CrudCode
{
	public function generateActiveRow($modelClass, $column)
	{
		if($column->isForeignKey == 1) {			
			$rel = CrudCode::generateLinks();

			return "\$form->dropDownListRow(\$model,'{$column->name}',CHtml::listData({$rel[$column->name]['model']}::model()->findAll(array(\"condition\"=>\"\",\"order\"=>\"\")),'{$rel[$column->name]['key']}','{$rel[$column->name]['desc']}'), array('prompt' => '-- Seleccione --'))";	
			
		} else {
		
			if($column->type==='boolean' || $column->size == 1)
			//if ($column->type === 'boolean')
				return "\$form->checkBoxRow(\$model,'{$column->name}')";
				
			elseif($column->dbType==='date') {
				return "\$form->dateFieldRow(\$model,'{$column->name}',array('class'=>'span2'))";
			}	
			else if (stripos($column->dbType,'text') !== false)
				return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";

			elseif(stripos($column->dbType,'enum')!==false)
				//return "ZHtml::enumDropDownList(\$model,'{$column->name}')";			
				return "\$form->enumDropDownListRow(\$model,'{$column->name}')";			
			else
			{
				if (preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
					$inputField='passwordFieldRow';
				else
					$inputField='textFieldRow';

				if ($column->type!=='string' || $column->size===null)
					return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
				else
					return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
			}
			
		}	
		
	}
}
