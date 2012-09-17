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

    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function getProcol($url)
    {
        $url = explode('://', $url);
        return $url[0];
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
    
    public function getDomain($url)
    {
        $result = NULL;
        preg_match("/(^.+)\:\/\/([a-zA-Z0-9\.]+)\/(.*)$/", $url, $result);
        
        if(count($result) == 4)
        {
            return $result[2];
        }
        else
        {
            return FALSE;
        }
    }
    
    /** ------------------------------------------------------------------------------------------------------------- */
}