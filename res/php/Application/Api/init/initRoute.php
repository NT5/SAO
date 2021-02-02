<?php

namespace SAO\Application\Api\init;

use SAO\Application\Api\ApiRoute;
use SAO\Modules\Extended;
use SAO\Application\Api\Areas;

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
        $Route = new ApiRoute('p', Areas\Invalid::class, $this->getExtended());
        $Ex = $Route->Extended();

        $UserArea = new ApiRoute('user', Areas\User::class, $Ex);

        $Route
                ->addRoute(new ApiRoute('invalid', Areas\Invalid::class, $Ex))
                ->addRoute(new ApiRoute('info', Areas\Info::class, $Ex))
                ->addRoute($UserArea);

        $UserArea
                ->addRoute(new ApiRoute('getUserByName', Areas\User\getUserByName::class, $Ex))
                ->addRoute(new ApiRoute('checkUser', Areas\User\checkUser::class, $Ex))
                ->addRoute(new ApiRoute('registerUser', Areas\User\registerUser::class, $Ex));

        $this->Route = $Route->init();
    }

}
