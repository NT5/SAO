<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

class Maria extends Page {

    /**
     * Es el constructor de la pagina
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Maria", "pages/Maria.twig");
    }
    
    public function CheckPost() {
        parent::CheckPost();
        $post = $this->getPost();
        print_r($post);
    }

}
