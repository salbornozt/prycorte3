<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';
/**
 *Represents the DAO of the admin entity
 */
/**
 *Represents the DAO of the admin entity
 */ /**
 *Represents the DAO of the admin entity
 */
class AdministradorDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an administradorDAO object
     * @var administradorDAO
     */
    private static $administradorDAO;

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
     * Method to query an admin by his code type
     *
     * @param int $cod_administrador
     * @return Administrador
     */
    public function consult($cod_administrador)
    {
        
        $sql = "SELECT * FROM ADMINISTRADOR WHERE cod_administrador = " . $cod_administrador;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);

        $administrador = new Administrador();

        $administrador->setCod_administrador($row[0]);
        $administrador->setNom_administrador($row[1]);
        $administrador->setUsuario_administrador($row[2]);
        $administrador->setContraseña_administrador($row[3]);
        $administrador->setCod_usuario($row[4]);

        return $administrador;
    }


    public function verificarCuenta($correo, $pass)
    {

        $sql = "SELECT * from administrador WHERE usuario_administrador = '" . $correo . "' and contraseña_administrador = '" . $pass . "'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        if ($row[0] == null) {
            return null;
        }


        $administrador = new Administrador();

        $administrador->setCod_administrador($row[0]);
        $administrador->setNom_administrador($row[1]);
        $administrador->setUsuario_administrador($row[2]);
        $administrador->setContraseña_administrador($row[3]);
        $administrador->setCod_usuario($row[4]);

        return $administrador;
    }

    /**
     * Method to create a new admin
     *
     * @param Administrador $administrador
     * @return void
     */
    public function create($administrador)
    {
        $sql = "insert into ADMINISTRADOR values (" . $administrador->getCod_administrador() . ",
                                            '" . $administrador->getNom_administrador() . "',
                                            '" . $administrador->getUsuario_administrador() . "',
                                            '" . $administrador->getContraseña_administrador() . "',
                                            " . $administrador->getCod_usuario() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an admin entered by parameter
     *
     * @param Administrador $administrador
     * @return void
     */
    public function modify($administrador)
    {

        $sql = "UPDATE ADMINISTRADOR SET cod_administrador = " . $administrador->getCod_administrador() . ",
                                   nom_administrador = '" . $administrador->getNom_administrador() . "',
                                   usuario_administrador = '" . $administrador->getUsuario_administrador() . "',
                                   contraseña_administrador = '" . $administrador->getContraseña_administrador() . "',
                                   cod_usuario = " . $administrador->getCod_usuario() . ",
                                   where cod_administrador = " . $administrador->getCod_administrador() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new admin
     *
     * @param Administrador $administrador
     * @return void
     */

    public function delete($cod_administrador)
    {
        $sql = "DELETE FROM ADMINISTRADOR WHERE cod_administrador = " . $cod_administrador;

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to get an AdministradorDAO object
     *
     * @param Object $conexion
     * @return AdministradorDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM ADMINISTRADOR";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $administrador = array();

        while ($row = pg_fetch_array($resultado)) {
            $administrador->setCod_administrador($row[0]);
            $administrador->setNom_administrador($row[1]);
            $administrador->setUsuario_administrador($row[2]);
            $administrador->setContraseña_administrador($row[3]);
            $administrador->setCod_usuario($row[4]);


            $administradors[] = $administrador;
        }
        return $administradors;
    }


    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return AdministradorDAO
     */
    public static function getAdministradorDAO($conexion)
    {
        if (self::$administradorDAO == null) {
            self::$administradorDAO = new AdministradorDAO($conexion);
        }

        return self::$administradorDAO;
    }

    /**
     * Method that modifies an admin entered by parameter
     *
     * @param Administrador $administrador
     * @return void
     */
    public function modificarAd($administrador)
    {

        $sql = "UPDATE ADMINISTRADOR SET 
                                   nom_administrador = '" . $administrador->getNom_administrador() . "',
                                   usuario_administrador = '" . $administrador->getUsuario_administrador() . "',
                                   contraseña_administrador = '" . $administrador->getContraseña_administrador() . "'           
                                   WHERE cod_administrador = 1
                                ;";
        pg_query($this->conexion, $sql);
    }
}
?>