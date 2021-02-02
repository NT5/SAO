<?php

namespace SAO\Application\Api\Areas;

use SAO\Modules\Extended;
use SAO\Application\Api\Area;

/**
 * 
 */
class Info extends Area {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

    public function initVars() {
        $this->setVars([
            'api.version' => '0.0.1b'
        ]);
    }

    public function CheckPost() {
        
    }

    public function setUp() {
        
    }

}
