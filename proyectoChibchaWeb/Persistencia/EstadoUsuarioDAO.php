<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/EstadoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the article entity
 */
class EstadoUsuarioDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an estadoUsuarioDAO object
     * @var estadoUsuarioDAO
     */
    private static $estadoUsuarioDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion = $conexion;
    }

    /**
     * Method to query an user by his code type
     *
     * @param int $cod_peticion
     * @return EstadoUsuario
     */
    public function consult($cod_peticion)
    {

        $sql = "SELECT * FROM ESTADO_USUARIO WHERE cod_peticion = " . $cod_peticion;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $estadoUsuario = new EstadoUsuario();

        $estadoUsuario->setCod_peticion($row[0]);
        $estadoUsuario->setFecha_peticion($row[1]);
        $estadoUsuario->setEstado_peticion($row[2]);
        $estadoUsuario->setFecha_actualizacion($row[3]);

        return $estadoUsuario;
    }

    /**
     * Method to create a new user state
     *
     * @param EstadoUsuario $est_usuario
     * @return void
     */
    public function create($est_usuario)
    {

        $sql = "insert into ESTADO_USUARIO values (" . $est_usuario->getCod_peticion() . ",
                                            '" . $est_usuario->getFecha_peticion() . "',
                                            " . $est_usuario->getEstado_peticion() . ",
                                            '" . $est_usuario->getFecha_actualizacion() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an user entered by parameter
     *
     * @param EstadoUsuario $est_usuario
     * @return void
     */
    public function modify($est_usuario)
    {

        $sql = "UPDATE ESTADO_USUARIO SET cod_peticion = " . $est_usuario->getCod_peticion() . ",
                                   fecha_peticion = '" . $est_usuario->getFecha_peticion() . "',
                                   estado_peticion = " . $est_usuario->getEstado_peticion() . ",
                                   fecha_actualizacion = '" . $est_usuario->getFecha_actualizacion() . "'           
                                   where cod_peticion = " . $est_usuario->getCod_peticion() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new user status
     *
     * @param EstadoUsuario $est_usuario
     * @return void
     */

    public function delete($cod_peticion)
    {
        $sql = "DELETE FROM ESTADO_USUARIO WHERE cod_peticion = " . $cod_peticion;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an EstadoUsuarioDAO object
     *
     * @param Object $conexion
     * @return EstadoUsuarioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM ESTADO_USUARIO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $est_usuario = array();

        while ($row = pg_fetch_array($resultado)) {
            $est_usuario->setCod_peticion($row[0]);
            $est_usuario->setFecha_peticion($row[1]);
            $est_usuario->setEstado_peticion($row[2]);
            $est_usuario->setFecha_actualizacion($row[3]);

            $est_usuarios[] = $est_usuario;
        }
        return $est_usuarios;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return EstadoUsuarioDAO
     */
    public static function getEstadoUsuarioDAO($conexion)
    {
        if (self::$estadoUsuarioDAO == null) {
            self::$estadoUsuarioDAO = new EstadoUsuarioDAO($conexion);
        }

        return self::$estadoUsuarioDAO;
    }
}
