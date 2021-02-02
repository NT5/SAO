<?php

namespace SAO\Application\Web\dispose;

use SAO\Modules\Extended;
use SAO\Modules\Util\Functions;

trait disposeExtended {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    private function disposeExtended() {
        $this->disposePageConfig();
        $this->disposeDatabase();
    }

    private function disposePageConfig() {
        $inifile = Functions::parseDir([__DIR__, str_repeat(".." . DIRECTORY_SEPARATOR, 5), "config.ini"]);

        $PageConfig = $this->getExtended()->PageConfig();

        $PageConfig->saveToIni($inifile);
    }

    private function disposeDatabase() {
        $inifile = Functions::parseDir([__DIR__, str_repeat(".." . DIRECTORY_SEPARATOR, 5), "config.ini"]);

        $Database = $this->getExtended()->Database();

        $Database
                ->getConnection()
                ->getConfig()
                ->saveToIni($inifile);

        $Database->close();
    }

}
