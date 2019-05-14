<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Tipo extends CFormModel
{
	public $tipo_hab;
	
    
    public function rules()
	{
		return array(
			// username and password are required
           array('tipo_hab', 'required','message'=>'Campo requerido'),
		   array('tipo_hab', 'numerical', 'integerOnly'=>true),
		   
			
		);
    }
   
}
?>