<?php
namespace Fuel\Migrations;

class Comments
{

    function up()
    {
        \DBUtil::create_table('comments', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'title' => array('type' => 'varchar', 'constraint' => 100),
            'description' => array('type' => 'varchar', 'constraint' => 100),
            'date' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'id_event' => array('type' => 'int', 'constraint' => 5),
            'id_user' => array('type' => 'int', 'constraint' => 5)
        ), array('id'),
            true,
            'InnoDB',
            'utf8_unicode_ci',
            array(
                array(
                    'constraint' => 'claveAjenaCommentsAUsers',
                    'key' => 'id_user',
                    'reference' => array(
                        'table' => 'users',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                ),
                array(
                    'constraint' => 'claveAjenaCommentsAEvents',
                    'key' => 'id_event',
                    'reference' => array(
                        'table' => 'events',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                )
            ));
    }

    function down()
    {
       \DBUtil::drop_table('comments');
    }
}