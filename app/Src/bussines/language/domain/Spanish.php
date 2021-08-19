<?php namespace App\Src\bussines\language\domain;

class Spanish 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            'active' => 'Activo',
            'activo' => 'Activo',
            'actions' => 'Acciones',
            'administrator' => 'Administrador',
            'address' => 'Dirección',
            'bienvenido' => 'Bienvendio a EnPro',
            'buscar' => 'Buscar',
            'caso' => 'Caso de Uso',
            'casos' => 'Casos de Uso',
            'calendar' => 'Calendario',
            'created_at' => 'Creado',
            'enpro' => 'EnPro',
            'email' => 'e-mail',
            'filter' => 'Filtrar',
            'forget_pass' => 'Si te has olvidado la contraseña, por favor contacta con el administrador del sistema',
            'groups' => 'Grupos',
            'grupo' => 'Grupo',
            'home' => 'Home',
            'id' => 'Id',
            'language' => 'Idioma',
            'list' => 'Lista',
            'lista' => 'Lista',
            'login' => 'login',
            'login_do' => 'Haz login para ver la accion',
            'managments' => 'Gestiones',
            'menufrontend' => 'Menu Usuario',
            'menubackend' => 'Menu Adminstrador',
            'messageSuccesSave' => 'Registro guardado',
            'messageFailSave' => 'No se ha podido guardar, revise los datos',
            'name' => 'Nombre',
            'no' => 'No',
            'nuevo'=> 'Nuevo',
            'of' => 'de',
            'options' => 'Opciones',
            'password' => 'Contraseña',
            'phone' => 'Teléfono',
            'position' => 'Cargo',
            'records' => 'Registros',
            'rol' => 'Rol',
            'salir' => 'Salir',  
            'seleccionacaso' => 'Caso de uso para el grupo',
            'show' => 'Mostrar',
            'showing' => 'Mostrando',
            'slogan' => 'Bienvenido a EnPro un CRM amigable',
            'standard' => 'Standard',
            'table'=> 'Tabla',
            'timezone' => 'Zona Horaria',
            'to' => 'a',
            'user' => 'Usuario',
            'users' => 'Usuarios',
            'usersAdmin' => 'Administrar Usuarios',
            'uses case' => 'Casos de Uso',
            'usuarios' => 'Usuarios',
            'usuariosdisp' => 'Usuarios disponibles',
            'usuariossel' => 'Usuarios seleccionados',
            'uuid' => 'Uuid',
            'viewAdmin' => 'Ver Admin',
            'yes' => 'Si',
            'welcome' => 'Bienvenido a EnPro',
            '1000' => 'Usuario o contraseña invalidos', 
            '1001' => 'El usuario no existe'
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

