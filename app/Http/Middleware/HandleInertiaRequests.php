<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    // GESTIONA LAS PETICIONES INERTIA
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        //LA FUNCION SHARE, GARANTIZA QUE COMPONENTE DE INERTIA MOSTRAR SEGUN EL ROL DEL USUARIO
        // SHARE, COMPORTE LOS COMPONENTES (INFORMACION / VISTAS)  POR PROPS A LOS USUARIOS SEGUN SU ROL
        return array_merge(parent::share($request), [
            //CREO LAS VARIABLES A LAS CUALES EL SHARE LES COMPARTE LOS COMPONENTES

            'user.roles'=>$request->user()?$request->user()->roles->pluck('name'):[],

            // $request->user()? , Contiene un Usuario
            // True: $request->user()->roles,  Le indicamos todos los roles
            // ->pluck('name') , obtenemos los nombres de todos los roles del tipo de usuario
            //ejemplo: User es usuario adm, por lo tanto el resultado es: user.roles => [ admin y editor ]
            //False:   'user.roles' le asignamos un arreglo vacio []

            'user.permissions'=>$request->user()? $request->user()->getPermissionsViaRoles()->pluck('name'):[],
            // $request->user()? , Contiene un Usuario
            // True: $request->user()->getPermissionsViaRoles , obtenemos los permisos de ese rol
            // ->pluck('name') , obtenemos todos los nombres de los persmisos ( o acciones)
            //False:
            /// 'user.permissions' no tiene permisos o acciones, le asigamos un []
            /// getPermissionsViaRoles metodo es SPATIE
        ]);
    }
}
