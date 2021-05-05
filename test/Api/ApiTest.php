<?php

namespace FintechScore\Simulacion\MX\Client;

use \GuzzleHttp\Client;
use \FintechScore\Simulacion\MX\Client\Configuration;
use \FintechScore\Simulacion\MX\Client\ApiException;
use \FintechScore\Simulacion\MX\Client\ObjectSerializer;

use \FintechScore\Simulacion\MX\Client\Api\FintechScoreSimulacionApi as Instance;
use \FintechScore\Simulacion\MX\Client\Model\Persona;
use \FintechScore\Simulacion\MX\Client\Model\Domicilio;
use \FintechScore\Simulacion\MX\Client\Model\Peticion;
use \FintechScore\Simulacion\MX\Client\Model\CatalogoEstados;
use \FintechScore\Simulacion\MX\Client\Model\CatalogoPais;


class ApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_x_api_key";
        $client = new Client();
        $this->apiInstance = new Instance($client,$config);
    }
    
    public function testGetReporte()
    {
        try {

            $body = new Peticion();
            $persona = new Persona();
            $domicilio = new Domicilio(); 
            $catalogoEstados = new CatalogoEstados(); 
            $catalogoPais = new CatalogoPais();

            $domicilio->setDireccion("AV 535 84");
            $domicilio->setCiudad( "CIUDAD DE MEXICO");
            $domicilio->setColoniaPoblacion("SAN JUAN DE ARAGON 1RA SECC");
            $domicilio->setDelegacionMunicipio("GUSTAVO A MADERO");
            $domicilio->setCP("07969");
            $domicilio->setEstado($catalogoEstados::CDMX);
            $domicilio->setPais($catalogoPais::MX);
            
            $persona->setPrimerNombre("PABLO");
            $persona->setSegundoNombre("ANTONIO");
            $persona->setApellidoPaterno("PRUEBA");
            $persona->setApellidoMaterno("ALVAREZ");
            $persona->setFechaNacimiento("1985-03-16");
            $persona->setRFC("PUAP850316MI1");
            $persona->setDomicilio($domicilio);

            $body->setFolioOtorgante("20210307");
            $body->setPersona($persona);

            $result = $this->apiInstance->getReporte($this->x_api_key, $body);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling ApiTest->testGetReporte: ', $e->getMessage(), PHP_EOL;
        }        
    }

}
