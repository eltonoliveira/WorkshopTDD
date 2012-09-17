<?php
/**
 * Description of SplitDomain
 * Pegar o protocolo - OK
 * Pegar o site/domínio
 * Pegar o path
 * 
 * @author Elton
 * @name SplitDomain
 */
class SplitDomain 
{
    const PROTOCOL = 1;
    const DOMAIN   = 2;
    const PATH     = 3;
    private $pattern;
    
    public function __construct() 
    {
        $this->pattern = "/(^.+)\:\/\/([a-zA-Z0-9\.]+)\/(.*)$/";
    }
    
    public function __destruct() 
    {
        $this->pattern = NULL;
        echo 'Objeto SplitDomain destruido';
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function getProcol($url)
    {
        return self::getPosicaoDaUrl($url, self::PROTOCOL);
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function getDomain($url)
    {
        return self::getPosicaoDaUrl($url, self::DOMAIN);
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function getPath($url)
    {
        return self::getPosicaoDaUrl($url, self::PATH);
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    private function getPosicaoDaUrl($url, $posicao)
    {
        preg_match($this->pattern, $url, $result);
        
        if(count($result) == 4)
        {
            return $result[$posicao];
        }
        else
        {
            return FALSE;
        }
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
}