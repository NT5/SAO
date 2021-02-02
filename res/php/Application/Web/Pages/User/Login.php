<?php

namespace SAO\Application\Web\Pages\User;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

/**
 * 
 */
class Login extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Login", "pages/login.twig");

        $this->initVars();
    }

    public function initVars() {
        $this->setVars([
            'sao.page.title' => 'Iniciar sesion'
        ]);
    }

}
