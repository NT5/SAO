<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

/**
 * 
 */
class Home extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Home", "pages/home.twig");

        $this->initVars();
    }

    public function initVars() {
        $this->setVar('sao.page.title', 'Pagina de inicio');
    }

}
