<?php

namespace SAO\Application\Api\init;

use SAO\Application\Api\ApiRoute;
use SAO\Modules\Basics;
use SAO\Modules\Extended;

trait initDisplay {

    /**
     * 
     * @return ApiRoute
     */
    public abstract function getRoute();

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     */
    private function initDisplay() {
        header('Content-Type: application/json');

        $Area = $this->getRoute()->getArea();

        if ($Area) {
            echo $Area->display();
        } else {
            echo "No areaclass found.";
        }
    }

}
