<?php

namespace Kiwari;

class Kiwari
{
    private $accessToken;

    public function __construct(string $accessToken = null) 
    {
        if ($accessToken == null) {
            // todo
        }

        $this->accessToken = $accessToken;
    }
    
}
