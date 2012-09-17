<?php
require_once '../public/library/SplitDomain.php';
/**
 * Description of SplitDomainTest
 *
 * @author Elton
 */
class SplitDomainTest extends PHPUnit_Framework_TestCase
{
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function testVerificarAmbiente()
    {
        self::assertTrue(TRUE);
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
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
    
    public function providerProtocols()
    {
        return array(
            'Deve retornar http'  => array('http'),
            'Deve retornar ftp'   => array('ftp'),
            'Deve retornar https' => array('https'),
        );
    }
    
   /** -------------------------------------------------------------------------------------------------------------- */

    /**
     * 
     * @dataProvider providerDomains
     */
    public function testDeveRetornarDominio($domain)
    {
        $url            = 'http://' . $domain . '/esporte';
        $splitDomain    = new SplitDomain();
        self::assertEquals($domain, $splitDomain->getDomain($url));
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function providerDomains()
    {
        return array(
            'Deve retornar o domínio www.google.com.br' => array('www.google.com.br'),
            'Deve retornar o domínio www.terra.com.br'  => array('www.terra.com.br')
        );
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    
}
