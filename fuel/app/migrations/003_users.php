<?php
namespace Fuel\Migrations;

class Users
{

    function up()
    {
        \DBUtil::create_table('users', array(
            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'email' => array('type' => 'varchar', 'constraint' => 100),
            'password' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'phone' => array('type' => 'int', 'constraint' => 9, 'null' => true),
            'username' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'birthday' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'is_registered' => array('type' => 'boolean', 'default' => 0),
            'id_rol' => array('type' => 'int', 'constraint' => 5, 'null' => true),
            'id_privacity' => array('type' => 'int', 'constraint' => 5, 'null' => true),
            'group' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'description' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'photo' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'name' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'lon' => array('type' => 'float', 'constraint' => 25, 'null' => true),
            'lat' => array('type' => 'float', 'constraint' => 25, 'null' => true),
        ), array('id'),
            true,
            'InnoDB',
            'utf8_unicode_ci',
            array(
                array(
                    'constraint' => 'claveAjenaUsersARoles',
                    'key' => 'id_rol',
                    'reference' => array(
                        'table' => 'roles',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'RESTRICT'
                ),
                array(
                    'constraint' => 'claveAjenaUsersAPrivacity',
                    'key' => 'id_privacity',
                    'reference' => array(
                        'table' => 'privacity',
                        'column' => 'id',
                    ),
                    'on_update' => 'CASCADE',
                    'on_delete' => 'CASCADE'
                )
            ));

        \DB::query("ALTER TABLE `users` ADD UNIQUE (`email`)")->execute();
        \DB::query("ALTER TABLE `users` ADD UNIQUE (`phone`)")->execute();
        \DB::query("ALTER TABLE `users` ADD UNIQUE (`username`)")->execute();
        \DB::query("INSERT INTO `users` (`id`, `email`, `password`, `phone`, `username`, `birthday`, `is_registered`, `id_rol`, `id_privacity`, `group`, `description`, `photo`, `name`, `lon`, `lat`) VALUES (NULL, 'admin@cev.com', 'admin', NULL, 'admin', NULL, '1', '1', NULL, NULL, NULL, NULL, 'admin', NULL, NULL);")->execute();

    }

    function down()
    {
       \DBUtil::drop_table('users');
    }
}