<?php

namespace SAO\Application\Web\init;

use SAO\Application\Web\WebRoute;
use SAO\Modules\Util\Functions;
use SAO\Modules\Basics;
use SAO\Modules\Extended;

trait initDisplay {

    /**
     * 
     * @return WebRoute
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

    private function initDisplay() {
        $Page = $this->getRoute()->getPage();
        $b = $this->getBasics();
        $e = $this->getExtended();

        if ($Page) {
            $Twig = $Page->getTwig();
            $PageConfig = $e->PageConfig();

            $Twig->setVars([
                'sao.page.title' => Functions::strFormat("%config_title | %config_var", array(
                    'config_title' => $PageConfig->getPageTitle(),
                    'config_var' => $Twig->getVar('sao.page.title')
                )),
                'sao.debug.logs' => $b->getLogs(),
                'sao.debug.executiontime' => ( microtime(true) - $this->ExecutionTime ),
                'sao.state.errors' => $b->getErrors(),
                'sao.state.warnings' => $b->getWarnings(),
                'sao.page.config' => $PageConfig
            ]);
            echo $Page->display();
        } else {
            echo "No pageclass found.";
        }
    }

}
