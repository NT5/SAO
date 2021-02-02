<?php

namespace SAO\Application;

use SAO\Application\Web\init;
use SAO\Application\Web\dispose;
use SAO\Application\Web\WebRoute;
use SAO\Modules\Basics;
use SAO\Modules\Extended;
use SAO\Modules\App\Users;

class Web {

    use init\initRoute,
        init\initDisplay,
        init\initBasics,
        init\initExtended,
        init\appInit,
        dispose\disposeExtended;

    /**
     * @var float Guarda el tiempo de ejecución en milisegundos
     */
    private $ExecutionTime = 0;

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

    /**
     *
     * @var WebRoute
     */
    private $Route;

    /**
     *
     * @var Users 
     */
    private $Users;

    /**
     * 
     * @return \SAO\Application\Web
     */
    public function app() {
        $this->ExecutionTime = microtime(true);

        $this->initBasics();
        $this->initExtended();
        $this->appInit();
        $this->initRoute();

        $this->disposeExtended();

        $this->initDisplay();
        return $this;
    }

    /**
     * 
     * @return WebRoute
     */
    public function getRoute() {
        return $this->Route;
    }

    /**
     * 
     * @return Users
     */
    public function getUsers() {
        return $this->Users;
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
