<?php
/**
 * Description of SplitDomain
 * Pegar o protocolo - OK
 * Pegar o site/domínio
 * Pegar o path
 * 
 * @author Elton
 */
class SplitDomain 
{

    /** ------------------------------------------------------------------------------------------------------------ */
    
    public function getProcol($url)
    {
        $url = explode('://', $url);
        return $url[0];
    }
    
    /** ------------------------------------------------------------------------------------------------------------ */
    
    public function getDomain($url)
    {
        return 'www.terra.com.br';
    }
    
}