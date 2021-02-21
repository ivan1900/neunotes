<?php namespace App\Src\bussines\language\domain;

class Spanish 
{
    public $langMap = [];

    public function __construct()
    {
        $this->langMap = [
            'enpro' => 'EnPro',
            'welcome' => 'Bienvenido a EnPro',
            'login_do' => 'Haz login para ver la accion',
            'login' => 'login',
            'forget_pass' => 'Si te has olvidado la contraseña, por favor contacta con el administrador del sistema',
            'slogan' => 'Bienvenido a EnPro un CRM amigable',
            'usuarios' => 'Usuarios',
            'usersAdmin' => 'Administrar Usuarios',
            'buscar' => 'Buscar',
            'bienvenido' => 'Bienvendio a EnPro',
            'salir' => 'Salir',  
            'lista' => 'Lista',
            'id' => 'Id',
            'name' => 'Nombre',
            'user' => 'Usuario',
            'lista' => 'Lista',
            'email' => 'e-mail',
            'rol' => 'Rol',
            'activo' => 'Activo',
            'options' => 'Opciones',
            'menufrontend' => 'Menu Usuario',
            'menubackend' => 'Menu Adminstrador',
            'caso' => 'Caso de Uso',
            'casos' => 'Casos de Uso',
            'seleccionacaso' => 'Caso de uso para el grupo',
            'standard' => 'Standard',
            'grupos' => 'Grupos',
            'grupo' => 'Grupo',
            'usuariosdisp' => 'Usuarios disponibles',
            'usuariossel' => 'Usuarios seleccionados',
            'tabla'=> 'Tabla',
            'nuevo'=> 'Nuevo',
            'viewAdmin' => 'Ver Admin',
            'filter' => 'Filtrar',
            'records' => 'Registros',
            'show' => 'Mostrar',
            'showing' => 'Mostrando',
            'to' => 'a',
            'of' => 'de',
            'position' => 'cargo',
            'administrator' => 'Administrador',
            '1000' => 'Usuario o contraseña invalidos', 
            '1001' => 'El usuario no existe'
        ];
    }

    public function getMap()
    {
        return $this->langMap;
    }
}

