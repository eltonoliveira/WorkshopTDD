<?php
require_once '../public/library/SplitDomain.php';
/**
 * Description of SplitDomainTest
 *
 * @author Elton
 * @name SplitDomainTest
 */
class SplitDomainTest extends PHPUnit_Framework_TestCase
{
    private $splitDomain;
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function setUp() 
    {
        $this->splitDomain = new SplitDomain();
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function tearDown()
    {
        unset($this->splitDomain);        
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function testVerificaAmbiente()
    {
        self::assertTrue(TRUE);
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    /**
     *
     * @dataProvider providerProtocols
     */
    public function testDeveRetornarProtocolo($protocol)
    {
        $url = $protocol . '://www.terra.com.br/esporte';
        self::assertEquals($protocol, $this->splitDomain->getProcol($url));
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
        self::assertEquals($domain, $this->splitDomain->getDomain($url));
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
    
    /**
     * 
     * @dataProvider providerPaths
     */
    public function testDeveRetornarPath($path)
    {
        $url         = 'http://www.google.com.br/' . $path;
        self::assertEquals($path, $this->splitDomain->getPath($url));        
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function providerPaths()
    {
        return array(
            'Deve retornar esportes' => array('esportes'),
            'Deve retornar politica' => array('politica')            
        );
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
}
