<?php

namespace App\Service;

class CurlParser
{
    /**
     * @param  string  $url
     *
     * @return string
     */
    public function parse(string $url): string
    {
        $_curl = curl_init();
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($_curl, CURLOPT_COOKIEFILE, './cookiePath.txt');
        curl_setopt($_curl, CURLOPT_COOKIEJAR, './cookiePath.txt');
        curl_setopt($_curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; InfoPath.1)');
        curl_setopt($_curl, CURLOPT_FOLLOWLOCATION, true); //new added
        curl_setopt($_curl, CURLOPT_URL, $url);
        $rtn = curl_exec( $_curl );

        return $rtn;
    }
}
