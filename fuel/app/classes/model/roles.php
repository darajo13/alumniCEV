<?php

class Model_Roles extends Orm\Model
{

   	protected static $_table_name = 'roles'; 
	protected static $_properties = array('id','type');

	protected static $_belongs_to = array(
    'user' => array(
        'key_from' => 'id_rol',
        'model_to' => 'Model_User',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);

}