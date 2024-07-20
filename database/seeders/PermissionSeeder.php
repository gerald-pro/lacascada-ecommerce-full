<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear permisos
        $permissions = [
            'user.index',
            'user.edit',
            'category.index',
            'category.create',
            'category.edit',
            'category.delete',
            'product.index',
            'product.create',
            'product.edit',
            'product.delete',
            'promotion.index',
            'promotion.create',
            'promotion.edit',
            'promotion.delete',
            'order.index',
            'order.index.own',
            'order.edit',
            'payment.index',
            'payment.index.own',
            'statistic.index',
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'page.index',
            'sidebar.index',
            'sidebar.create',
            'sidebar.edit',
            'sidebar.delete',
            'contact.index',
            'searcher'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $rolesAndPermissions = [
            'gerente comercial' => [
                'user.index',
                'user.edit',
                'category.index',
                'category.create',
                'category.edit',
                'category.delete',
                'product.index',
                'product.create',
                'product.edit',
                'product.delete',
                'promotion.index',
                'promotion.create',
                'promotion.edit',
                'promotion.delete',
                'order.index',
                'order.edit',
                'payment.index',
                'statistic.index',
                'role.index',
                'role.create',
                'role.edit',
                'role.delete',
                'page.index',
                'sidebar.index',
                'sidebar.create',
                'sidebar.edit',
                'sidebar.delete',
                'contact.index',
                'searcher'
            ],
            'asistente de gerencia' => [
                'user.index',
                'category.index',
                'category.create',
                'category.edit',
                'category.delete',
                'product.create',
                'product.edit',
                'promotion.index',
                'page.index',
                'sidebar.index',
                'sidebar.create',
                'sidebar.edit',
                'sidebar.delete',
                'contact.index',
                'searcher'
            ],
            'jefe de despacho' => [
                'product.index',
                'order.index',
                'order.edit',
            ],
            'cliente' => [
                'order.index.own',
                'payment.index.own',
            ],
        ];

        foreach ($rolesAndPermissions as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($permissions);
        }
    }
}
