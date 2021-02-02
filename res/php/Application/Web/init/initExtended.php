<?php

namespace SAO\Application\Web\init;

use SAO\Modules\Util\Functions;
use SAO\Modules\Extended;
use SAO\Modules\Extended\Database;
use SAO\Modules\Extended\Cookies;
use SAO\Modules\Extended\PageConfig;

trait initExtended {

    /**
     *
     * @var Extended
     */
    private $Extended;

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    private function initExtended() {
        $Basics = $this->getBasics();
        $Cookies = $this->initCookies();
        $PageConfig = $this->initPageConfig();
        $Database = $this->initDatabase();

        $Extented = new Extended($Basics, $Cookies, $PageConfig, $Database);

        $this->Extended = $Extented;
    }

    private function initCookies() {
        $Cookies = new Cookies('SAO', $this->getBasics());

        return $Cookies;
    }

    private function initPageConfig() {
        $inifile = Functions::parseDir([__DIR__, str_repeat(".." . DIRECTORY_SEPARATOR, 5), "config.ini"]);
        $PageConfig = PageConfig::fromIniFile($this->getBasics(), $inifile);
        return $PageConfig;
    }

    private function initDatabase() {
        $Basics = $this->getBasics();
        $inifile = Functions::parseDir([__DIR__, str_repeat(".." . DIRECTORY_SEPARATOR, 5), "config.ini"]);

        $DatabaseConf = Database\DatabaseConfig::fromIniFile($Basics, $inifile);
        $DatabaseConn = new Database\DatabaseConnection($DatabaseConf, TRUE, $Basics);
        $Database = new Database($DatabaseConn, $Basics);

        return $Database;
    }

}
