<?php

namespace SAO\Application\Web\check;

use SAO\Modules\Extended;
use SAO\Modules\Extended\Database\DatabaseInstaller;

trait checkDatabase {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function checkisDatabaseInstall() {
        $ex = $this->getExtended();

        $dbi = new DatabaseInstaller($ex);
        $install = $dbi->isInstalled();
        return $install;
    }

}
