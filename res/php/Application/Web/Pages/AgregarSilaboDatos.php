<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

class AgregarSilaboDatos extends Page {

    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Agregar datos", "pages/silabos/agregar_silabo_datos.twig");
    }

    public function CheckPost() {
        
    }
    
}
