<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Tipo_Tarjeta.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the article entity
 */
class TipoTarjetaDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an tipoTarjetaDAO object
     * @var tipoTarjetaDAO
     */
    private static $tipoTarjetaDAO;

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
     * Method to query an type of tarjet by his code type
     *
     * @param int $cod_tipo_tarjeta
     * @return Tipo_tarjeta
     */
    public function consult($cod_tipo_tarjeta)
    {

        $sql = "SELECT * FROM TIPO_TARJETA WHERE cod_tipo_tarjeta = " . $cod_tipo_tarjeta;
        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $tipoTarjeta = new Tipo_tarjeta();

        $tipoTarjeta->setCod_tipo_tarjeta($row[0]);
        $tipoTarjeta->setNombre_casa($row[1]);
        return $tipoTarjeta;
    }

    /**
     * Method to create a new website 
     *
     * @param Tipo_tarjeta $tipoTarjeta
     * @return void
     */
    public function create($tipoTarjeta)
    {

        $sql = "insert into SITIO_WEB values (" . $tipoTarjeta->getCod_tipo_tarjeta() . ",
                                            '" . $tipoTarjeta->getNombre_casa() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an type of tarjet entered by parameter
     *
     * @param Tipo_tarjeta $tipoTarjeta
     * @return void
     */
    public function modify($tipoTarjeta)
    {

        $sql = "UPDATE TIPO_TARJETA SET cod_tipo_tarjeta = " . $tipoTarjeta->getCod_tipo_tarjeta() . ",
                                   nombre_casa = '" . $tipoTarjeta->getNombre_casa() . "'
                                   where cod_tipo_tarjeta = " . $tipoTarjeta->getCod_tipo_tarjeta() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new type of tarjet status
     *
     * @param Tipo_tarjeta $tipoTarjeta
     * @return void
     */

    public function delete($tipoTarjeta)
    {
        $sql = "DELETE FROM TIPO_TARJETA WHERE cod_tipo_tarjeta = " . $tipoTarjeta;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an TipoTarjeta object
     *
     * @param Object $conexion
     * @return TipoTarjeta
     */
    public function getList()
    {

        $sql = "SELECT * FROM TIPO_TARJETA";

        $tipoTarjetas = array();
        if (!$resultado = pg_query($this->conexion, $sql)) die();

        while ($row = pg_fetch_array($resultado)) {

            $tipoTarjeta = new Tipo_tarjeta();
            $tipoTarjeta->setCod_tipo_tarjeta($row[0]);
            $tipoTarjeta->setNombre_casa($row[1]);

            array_push($tipoTarjetas, $tipoTarjeta);
        }
        return $tipoTarjetas;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return tipoTarjetaDAO
     */
    public static function getTipoTarjetaDAO($conexion)
    {
        if (self::$tipoTarjetaDAO == null) {
            self::$tipoTarjetaDAO = new TipoTarjetaDAO($conexion);
        }

        return self::$tipoTarjetaDAO;
    }
}
