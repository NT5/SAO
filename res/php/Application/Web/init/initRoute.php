<?php

namespace SAO\Application\Web\init;

use SAO\Application\Web\WebRoute;
use SAO\Modules\Extended;
use SAO\Application\Web\Pages;

trait initRoute {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function initRoute() {
        $Route = new WebRoute('p', Pages\Home::class, $this->getExtended());
        $Ex = $Route->Extended();

        $User = new WebRoute('user', Pages\Login::class, $Ex);

        $Route
                ->addRoute(new WebRoute('home', Pages\Home::class, $Ex))
                ->addRoute(new WebRoute('usertest', Pages\UserTest::class, $Ex))
                ->addRoute($User);

        $User
                ->addRoute(new WebRoute('login', Pages\User\Login::class, $Ex))
                ->addRoute(new WebRoute('register', Pages\User\Register::class, $Ex));

        $this->Route = $Route->init();
    }

}
