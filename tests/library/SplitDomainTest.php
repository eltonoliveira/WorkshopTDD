<?php
require_once '../public/library/SplitDomain.php';
/**
 * Description of SplitDomainTest
 *
 * @author Elton
 */
class SplitDomainTest extends PHPUnit_Framework_TestCase
{
    
    public function providerProtocols()
    {
        return array(
            'Deve retornar http'  => array('http'),
            'Deve retornar ftp'   => array('ftp'),
            'Deve retornar https' => array('https'),
        );
    }
    
    /**
     * Esse método subsytitui a necessidade de se usar
     * os métodos:
     *  - testDeveRetornarHttp
     *  - testDeveRetornarFtp
     * 
     * @dataProvider providerProtocols
     */
    public function testGetProtocol($protocol)
    {
        $url = $protocol . '://www.terra.com.br/esporte';
        $splitDomain    = new SplitDomain();
        self::assertEquals($protocol, $splitDomain->getProcol($url));
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function testVerificarAmbiente()
    {
        self::assertTrue(TRUE);
    }
    
   /** -------------------------------------------------------------------------------------------------------------- */
    
    public function testDeveRetornarHttp()
    {
        $url            = 'http://www.terra.com.br/esporte';
        $splitDomain    = new SplitDomain();
        self::assertEquals('http', $splitDomain->getProcol($url));
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function testDeveRetornarFtp()
    {
        $url            = 'ftp://www.terra.com.br/esporte';
        $splitDomain    = new SplitDomain();
        self::assertEquals('ftp', $splitDomain->getProcol($url));
    }

    /** ------------------------------------------------------------------------------------------------------------- */

    public function testDeveRetornarDominio()
    {
        $url            = 'ftp://www.terra.com.br/esporte';
        $splitDomain    = new SplitDomain();
        self::assertEquals('www.terra.com.br', $splitDomain->getDomain($url));
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    
}
