<?php

namespace SAO\Application;

use SAO\Application\Web\init;
use SAO\Application\Web\dispose;
use SAO\Modules\Basics;
use SAO\Modules\Extended;
use SAO\Application\Api\ApiRoute;

/**
 * 
 */
class Api {

    /**
     *
     * @var ApiRoute
     */
    private $Route;

    /**
     *
     * @var Basics
     */
    private $Basics;

    /**
     *
     * @var Extended
     */
    private $Extended;

    use init\initBasics,
        init\initExtended,
        dispose\disposeExtended,
        \SAO\Application\Api\init\initRoute,
        \SAO\Application\Api\init\initDisplay;

    /**
     * 
     * @return $this
     */
    public function api() {
        $this->initBasics();
        $this->initExtended();
        $this->initRoute();
        $this->disposeExtended();
        $this->initDisplay();
        // print_r($this->getBasics()->getLogs());
        return $this;
    }

    /**
     * 
     * @return ApiRoute
     */
    public function getRoute() {
        return $this->Route;
    }

    /**
     * 
     * @return Basics
     */
    public function getBasics() {
        return $this->Basics;
    }

    /**
     * 
     * @return Extended
     */
    public function getExtended() {
        return $this->Extended;
    }

}
