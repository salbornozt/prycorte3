<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the article entity
 */
class UsuarioDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an usuarioDAO object
     * @var usuarioDAO
     */
    private static $usuarioDAO;

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
     * @param int $cod_usuario
     * @return Article
     */
    public function consult($cod_usuario)
    {

        $sql = "SELECT * FROM USUARIO WHERE cod_usuario = " . $cod_usuario;

        if (!$resultado = mysqli_query($this->conexion, $sql)) die();
        $row = mysqli_fetch_array($resultado);

        $usuario = new Usuario();

        $usuario->setCod_usuario($row[0]);
        $usuario->setTipo_usuario($row[1]);


        return $usuario;
    }

    /**
     * Method to create a new user
     *
     * @param Usuario $usuario
     * @return void
     */
    public function create($usuario)
    {

        $sql = "insert into USUARIO values (" . $usuario->getCod_usuario() . ",
                                            '" . $usuario->getTipo_usuario() . "'
                                        );";

        mysqli_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an user entered by parameter
     *
     * @param Usuario $usuario
     * @return void
     */
    public function modify($usuario)
    {

        $sql = "UPDATE USUARIO SET cod_usuario = " . $usuario->getCod_usuario() . ",
                                   tipo_usuario = '" . $usuario->getTipo_usuario() . "'           
                                   where cod_usuario = " . $usuario->getCod_usuario() . "
                                ;";
        mysqli_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new user
     *
     * @param Usuario $usuario
     * @return void
     */

    public function delete($cod_usuario)
    {
        $sql = "DELETE FROM USUARIO WHERE cod_usuario = " . $cod_usuario;

        mysqli_query($this->conexion, $sql);
    }
    /**
     * Method to get an UsuarioDAO object
     *
     * @param Object $conexion
     * @return UsuarioDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM USUARIO";

        if (!$resultado = mysqli_query($this->conexion, $sql)) die();

        $usuario = array();

        while ($row = mysqli_fetch_array($resultado)) {
            $usuario->setCod_usuario($row[0]);
            $usuario->setTipo_usuario($row[1]);

            $usuarios[] = $usuario;
        }
        return $usuarios;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return UsuarioDAO
     */
    public static function getUsuarioDAO($conexion)
    {
        if (self::$usuarioDAO == null) {
            self::$usuarioDAO = new UsuarioDAO($conexion);
        }

        return self::$usuarioDAO;
    }
}
