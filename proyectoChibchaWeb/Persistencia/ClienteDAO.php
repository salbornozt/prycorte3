<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';
/**
 *Represents the DAO of the client entity
 */
class ClienteDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an clienteDAO object
     * @var clienteDAO
     */
    private static $clienteDAO;

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
     * Method to query an cliente by his code type
     *
     * @param int $cod_cliente
     * @return Cliente
     */
    public function consult($cod_cliente)
    {

        $sql = "SELECT * FROM CLIENTE WHERE cod_cliente = " . $cod_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $cliente = new Cliente();

        $cliente->setCod_cliente($row[0]);
        $cliente->setNom_cliente($row[1]);
        $cliente->setTelefono_cliente($row[2]);
        $cliente->setCedula_cliente($row[3]);
        $cliente->setContraseña_cliente($row[4]);
        $cliente->setCorreo_cliente($row[5]);
        $cliente->setCod_peticion($row[6]);
        $cliente->setCod_usuario($row[7]);

        return $cliente;
    }


    public function verificarCuenta($correo, $pass)
    {

        $sql =  "SELECT * from cliente WHERE correo_cliente = '" . $correo . "' and contraseña_cliente = '" . $pass . "'and cod_peticion=1";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        if ($row[0] == null) {
            return null;
        }


        $cliente = new Cliente();

        $cliente->setCod_cliente($row[0]);
        $cliente->setNom_cliente($row[1]);
        $cliente->setTelefono_cliente($row[2]);
        $cliente->setCedula_cliente($row[3]);
        $cliente->setContraseña_cliente($row[4]);
        $cliente->setCorreo_cliente($row[5]);
        $cliente->setCod_peticion($row[6]);
        $cliente->setCod_usuario($row[7]);

        return $cliente;
    }

    /**
     * Method to create a new client
     *
     * @param Cliente $correo_cliente
     * @return void
     */

    public function consultEmail($correo_cliente)
    {

        $sql = "SELECT * FROM CLIENTE WHERE correo_cliente = " . $correo_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $cliente = new Cliente();

        $cliente->setCod_cliente($row[0]);
        $cliente->setNom_cliente($row[1]);
        $cliente->setTelefono_cliente($row[2]);
        $cliente->setCedula_cliente($row[3]);
        $cliente->setContraseña_cliente($row[4]);
        $cliente->setCorreo_cliente($row[5]);
        $cliente->setCod_peticion($row[6]);
        $cliente->setCod_usuario($row[7]);

        return $cliente;
    }

    /**
     * Method to create a new client
     *
     * @param Cliente $cliente
     * @return void
     */
    public function create($cliente)
    {
        $sql = "insert into CLIENTE(nom_cliente,telefono_cliente,cedula_cliente,contraseña_cliente,correo_cliente,cod_peticion,cod_usuario)
                                     values ('" . $cliente->getNom_cliente() . "',
                                            " . $cliente->getTelefono_cliente() . ",
                                            " . $cliente->getCedula_cliente() . ",
                                            '" . $cliente->getContraseña_cliente() . "',
                                            '" . $cliente->getCorreo_cliente() . "',
                                            " . $cliente->getCod_peticion() . ",
                                            " . $cliente->getCod_usuario() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an client entered by parameter
     *
     * @param Cliente $cliente
     * @return void
     */
    public function modify($cliente)
    {

        $sql = "UPDATE CLIENTE SET cod_cliente = " . $cliente->getCod_cliente() . ",
                                   nom_cliente = '" . $cliente->getNom_cliente() . "',
                                   telefono_cliente = " . $cliente->getTelefono_cliente() . ",                                  
                                   cedula_cliente = " . $cliente->getCedula_cliente() . ",                                  
                                   contraseña_cliente = '" . $cliente->getContraseña_cliente() . "',
                                   correo_cliente = '" . $cliente->getCorreo_cliente() . "',
                                   cod_peticion = " . $cliente->getCod_peticion() . ",
                                   cod_usuario = " . $cliente->getCod_usuario() . ",
                                   where cod_cliente = " . $cliente->getCod_cliente() . "
                                ;";
        pg_query($this->conexion, $sql);
    }
    /**
     * Method that modifies an client entered by parameter
     *
     * @param Cliente $cliente
     * @return void
     */

    public function modifyPerfil($cliente)
    {

        $sql = "UPDATE CLIENTE SET cod_cliente = " . $cliente->getCod_cliente() . ",
                                   nom_cliente = '" . $cliente->getNom_cliente() . "',
                                   telefono_cliente = " . $cliente->getTelefono_cliente() . ",                                  
                                   cedula_cliente = " . $cliente->getCedula_cliente() . ",                                  
                                   contraseña_cliente = '" . $cliente->getContraseña_cliente() . "',
                                   correo_cliente = '" . $cliente->getCorreo_cliente() . "'
                                   where cod_cliente = " . $cliente->getCod_cliente() . "
                                ;";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new client
     *
     * @param Cliente $cliente
     * @return void
     */

    public function delete($cod_cliente)
    {
        $sql = "DELETE FROM CLIENTE WHERE cod_cliente = " . $cod_cliente;

        pg_query($this->conexion, $sql);
    }


    /**
     * Method to delete a new client
     *
     * @param Cliente $cliente
     * @return void
     */

    public function deleteCedula($cedula_cliente)
    {
        $sql = "DELETE FROM CLIENTE WHERE cedula_cliente = " . $cedula_cliente;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an ClienteDAO object
     *
     * @param Object $conexion
     * @return ClienteDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM CLIENTE";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $clientes = array();

        while ($row = pg_fetch_array($resultado)) {
            $cliente = new Cliente();
            $cliente->setCod_cliente($row[0]);
            $cliente->setNom_cliente($row[1]);
            $cliente->setTelefono_cliente($row[2]);
            $cliente->setCedula_cliente($row[3]);
            $cliente->setContraseña_cliente($row[4]);
            $cliente->setCorreo_cliente($row[5]);
            $cliente->setCod_peticion($row[6]);
            $cliente->setCod_usuario($row[7]);
            array_push($clientes, $cliente);
        }
        return $clientes;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return ClienteDAO
     */
    public static function getClienteDAO($conexion)
    {
        if (self::$clienteDAO == null) {
            self::$clienteDAO = new ClienteDAO($conexion);
        }

        return self::$clienteDAO;
    }

    /**
     * Method to get an DistribuidorDAO object
     *
     * @param Object $conexion
     * @return DistribuidorDAO
     */
    public function getListActivar()
    {

        $sql = "SELECT cedula_cliente
        FROM cliente
        WHERE cliente.cod_peticion = 2
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Cliente();
            $item->setCedula_cliente($row[0]);

            array_push($list, $item);
        }
        return $list;
    }

    public function getListDesactivar()
    {

        $sql = "SELECT cedula_cliente
        FROM cliente
        WHERE cliente.cod_peticion = 1
        ";
        $list = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        while ($row = pg_fetch_array($resultado)) {
            $item = new Cliente();
            $item->setCedula_cliente($row[0]);

            array_push($list, $item);
        }
        return $list;
    }

    public function cambiarEstadoActivado($cedula_cliente)

    {
        $sql = "UPDATE  CLIENTE SET COD_PETICION=1 WHERE cedula_cliente = " . $cedula_cliente;

        pg_query($this->conexion, $sql);
    }

    public function cambiarEstadoDesactivado($cedula_cliente)

    {
        $sql = "UPDATE  CLIENTE SET COD_PETICION=2 WHERE cedula_cliente = " . $cedula_cliente;

        pg_query($this->conexion, $sql);
    }
}
