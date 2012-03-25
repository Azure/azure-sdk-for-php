<?php

namespace ext\microsoft\windowsazure\services\queue;

use PEAR2\WindowsAzure\Core\IServiceFilter;

class FiddlerFilter implements IServiceFilter {
    protected $site = '127.0.0.1';
    protected $port = 8888;
    protected $isFiddlerOn;
    
    public function __construct() {
        $fp = fsockopen($this->site, $this->port); 
        $this->isFiddlerOn = !(!$fp);
        if ($this->isFiddlerOn) {
            fclose($fp);
        }
    }
    
    public function handleRequest($request) {
        if ($this->isFiddlerOn) {
            $request->setConfig('proxy_host', $this->site);
            $request->setConfig('proxy_port', $this->port);
        }
        return $request;
    }

    public function handleResponse($request, $response) {
        return $response;
    }
}

?>
