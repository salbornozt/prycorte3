<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/TarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';
/**
 *Represents the DAO of the employeer entity
 */
class TarjetaCreditoDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an empleadoDAO object
     * @var tarjetaCreditoDAO
     */
    private static $tarjetaCreditoDAO;

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
     * Method to query an credit tarjet by his code type
     *
     * @param int $cod_tarjeta_credito
     * @return TarjetaCredito
     */
    public function consult($cod_tarjeta_credito)
    {

        $sql = "SELECT * FROM TARJETA_CREDITO WHERE cod_tarjeta_credito = " . $cod_tarjeta_credito;
        //echo $sql;
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $tarjetaCredito = new TarjetaCredito();

        $tarjetaCredito->setCod_tarjeta_credito($row[0]);
        $tarjetaCredito->setNumero_tarjeta($row[1]);
        $tarjetaCredito->setCodigo_seguridad($row[2]);
        $tarjetaCredito->setDireccion($row[3]);
        $tarjetaCredito->setFecha_expiracion($row[4]);
        $tarjetaCredito->setCod_tipo_tarjeta($row[5]);
        $tarjetaCredito->setCod_cliente($row[6]);


        return $tarjetaCredito;
    }

    /**
     * Method to query an credit tarjet by his code type
     *
     * @param int $cod_tarjeta_credito
     * @return TarjetaCredito
     */
    public function consultPorCliente($cod_cliente)
    {

        $sql = "SELECT * FROM TARJETA_CREDITO WHERE cod_cliente = " . $cod_cliente;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $tarjetaCredito = new TarjetaCredito();

        $tarjetaCredito->setCod_tarjeta_credito($row[0]);
        $tarjetaCredito->setNumero_tarjeta($row[1]);
        $tarjetaCredito->setCodigo_seguridad($row[2]);
        $tarjetaCredito->setDireccion($row[3]);
        $tarjetaCredito->setFecha_expiracion($row[4]);
        $tarjetaCredito->setCod_tipo_tarjeta($row[5]);
        $tarjetaCredito->setCod_cliente($row[6]);


        return $tarjetaCredito;
    }

    /**
     * Method to create a new employeer
     *
     * @param TarjetaCredito $tarjetaCredito
     * @return void
     */
    public function create($tarjetaCredito)
    {
        $sql = "insert into TARJETA_CREDITO values (" . $tarjetaCredito->getCod_tarjeta_credito() . ",
                                            '" . $tarjetaCredito->getNumero_tarjeta() . "',
                                            " . $tarjetaCredito->getCodigo_seguridad() . ",
                                            '" . $tarjetaCredito->getDireccion() . "',
                                            '" . $tarjetaCredito->getFecha_expiracion() . "',
                                            '" . $tarjetaCredito->getCod_tipo_tarjeta() . "',
                                            " . $tarjetaCredito->getCod_cliente() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    public function createPorCliente($tarjetaCredito)
    {
        $sql = "insert into TARJETA_CREDITO (numero_tarjeta,codigo_seguridad,direccion,fecha_expiracion,cod_tipo_tarjeta,cod_cliente) 
                                            values (" . $tarjetaCredito->getNumero_tarjeta() . ",
                                            " . $tarjetaCredito->getCodigo_seguridad() . ",
                                            '" . $tarjetaCredito->getDireccion() . "',
                                            '" . $tarjetaCredito->getFecha_expiracion() . "',
                                            " . $tarjetaCredito->getCod_tipo_tarjeta() . ",
                                            " . $tarjetaCredito->getCod_cliente() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an employeer entered by parameter
     *
     * @param TarjetaCredito $tarjetaCredito
     * @return void
     */
    public function modify($tarjetaCredito)
    {

        $sql = "UPDATE TARJETA_CREDITO SET cod_tarjeta_credito = " . $tarjetaCredito->getCod_tarjeta_credito() . ",
                                   numero_tarjeta = '" . $tarjetaCredito->getNumero_tarjeta() . "',
                                   codigo_seguridad = " . $tarjetaCredito->getCodigo_seguridad() . ",
                                   direccion = '" . $tarjetaCredito->getDireccion() . "',
                                   fecha_expiracion = '" . $tarjetaCredito->getFecha_expiracion() . "',
                                   cod_tipo_tarjeta = '" . $tarjetaCredito->getCod_tipo_tarjeta() . "'
                           where cod_tarjeta_credito = " . $tarjetaCredito->getCod_tarjeta_credito() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new employeer
     *
     * @param TarjetaCredito $cod_tarjeta_credito
     * @return void
     */

    public function delete($cod_tarjeta_credito)
    {
        $sql = "DELETE FROM TARJETA_CREDITO WHERE cod_tarjeta_credito = " . $cod_tarjeta_credito;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an TarjetaCredito object
     *
     * @param Object $conexion
     * @return TarjetaCreditoDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM TARJETA_CREDITO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $tarjetaCreditos = array();

        while ($row = pg_fetch_array($resultado)) {
            $tarjetaCredito = new TarjetaCredito();
            $tarjetaCredito->setCod_tarjeta_credito($row[0]);
            $tarjetaCredito->setNumero_tarjeta($row[1]);
            $tarjetaCredito->setCodigo_seguridad($row[2]);
            $tarjetaCredito->setDireccion($row[3]);
            $tarjetaCredito->setFecha_expiracion($row[4]);
            $tarjetaCredito->setCod_tipo_tarjeta($row[5]);
            $tarjetaCredito->setCod_cliente($row[6]);



            array_push($tarjetaCreditos, $tarjetaCredito);
        }
        return $tarjetaCreditos;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return TarjetaCreditoDAO
     */
    public static function getTarjetaCreditoDAO($conexion)
    {
        if (self::$tarjetaCreditoDAO == null) {
            self::$tarjetaCreditoDAO = new TarjetaCreditoDAO($conexion);
        }

        return self::$tarjetaCreditoDAO;
    }
}
