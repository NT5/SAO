<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

class AgregarSilaboDatos extends Page {

    private $SilaboEntradas;

    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Agregar datos", "pages/silabos/agregar_silabo_datos.twig");
        $this->SilaboEntradas = new \SAO\Modules\App\SilaboEntradas($Extended);
        $this->initVars();
    }

    public function CheckPost() {
        
    }

    public function initVars() {
        $silabo_id = $_GET['id'];
        $silabo = $this->SilaboEntradas->obtenerSilabo($silabo_id);
        $this->setVar('silabo', $silabo);
    }

}
