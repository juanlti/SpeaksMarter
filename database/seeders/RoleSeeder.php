<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos los roles que son necesarios para el inicio del sistema
        // importacion requerida => use Spatie\Permission\Models\Role;
            // admin rol padre
        $role_admin=Role::create(['name'=>'admin']);
            //  editor rol padre -1
        $role_editor=Role::create(['name'=>'editor']);

        // Creo los persmisos
        // los permisos son acciones que desarrollan las entiddades, estas entidades estan sujetas a los roles
        // en otras palabras, las entidades  manifiestan que acciones pueden o no realizar,  controlada por  Spatie

        // INICIO DE ROLES (CRUD)
        //  acciones de crear roles => adm
        //importacion requerida => use Spatie\Permission\Models\Permission;
        $permission_create_role=Permission::create(['name'=>'create roles']);
        // acciones de leer un rol => adm
        $permission_read_role=Permission::create(['name'=>'read roles']);
        // acciones de actualizar un rol => adm
        $permission_update_role=Permission::create(['name'=>'update roles']);
        // acciones de borrar un rol => adm
        $permission_delete_role=Permission::create(['name'=>'delete roles']);
        // fin Crud de roles

        // INICIO DE LESSON ROLES (CRUD)

        // acciones de crear roles
        $permission_create_lesson=Permission::create(['name'=>'create lessons']);
        // acciones de leer lesiones
        $permission_read_lesson=Permission::create(['name'=>'read lessons']);
        // acciones de actualizar
        $permission_update_lesson=Permission::create(['name'=>'update lessons']);
        // acciones de borrar
        $permission_update_lesson=Permission::create(['name'=>'delete lessons']);
        // fin de lessons

        // INICIO DE CATEGORY ROLES (CRUD)

        // accion de crear
        $permission_create_category=Permission::create(['name'=>'create categories']);
        // accion de  actualizar
        $permission_update_category=Permission::create(['name'=>'update categories']);
        // accion de leer
        $permission_read_category=Permission::create(['name'=>'read categories']);
        // accion de delete
        $permission_delete_category=Permission::create(['name'=>'delete categories']);
            // fin de

        //ASIGNO: ROLES A LOS PERMISOS ( ROLES => PERMISSION )

        //para cada role, creo un arreglo en el cual indico sus permisos ( acciones )

        $permissions_admin=[
            $permission_create_lesson,$permission_read_lesson,$permission_update_lesson,
            $permission_update_lesson,$permission_create_role,$permission_read_role,
            $permission_update_role,$permission_delete_role,$permission_create_category,
            $permission_update_category,$permission_delete_category,$permission_read_category
        ];

        $permission_editor=[
            $permission_create_lesson,$permission_read_lesson,
            $permission_update_lesson,$permission_create_category,
            $permission_update_category,$permission_delete_category,
            $permission_read_category
        ];


        //AL  OBJETO ROL LE ASIGNO EL CONJUNTO DE PERMISSION

        // Asigna todos los permisos que se encuentren el $permissions_admin, al rol Admin
        $role_admin->syncPermissions($permissions_admin);

            // Asigna todos los permisos que se encuentren el $permission_editor, al rol Editor
        $role_editor->syncPermissions($permission_editor);

        //OTRA FORMA  DE ASIGNAR LOS PERMISOS, ES DE  Un Role ---> un Permission (o  1  --> 1 )
        // si solo quiero asignar un permisso de manera individual
      //  $role_editor->givePermissionTo($permission_update_category);















    }
}
