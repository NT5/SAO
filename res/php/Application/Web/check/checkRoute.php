<?php

namespace SAO\Application\Web\check;

use SAO\Application\Web\WebRoute;

trait checkRoute {

    use checkDatabase;

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function checkRoute() {
        $Route = $this->getRoute();

        if (!$this->checkisDatabaseInstall()) {
            $Route
                    ->getRoute('install')
                    ->init(FALSE);
        } else {
            $Route->init();
        }
    }

}
