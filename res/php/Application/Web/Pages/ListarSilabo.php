<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;

class ListarSilabo extends Page {

    private $SilaboEntradas;

    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Agregar datos", "pages/silabos/listar_silabos.twig");
        $this->SilaboEntradas = new \SAO\Modules\App\SilaboEntradas($Extended);
        $this->initVars();
    }

    public function CheckPost() {

    }

    public function initVars() {
        $listaSilabos = $this->SilaboEntradas->obtenerListaDeSilabos();
        $this->setVar('silabos', $listaSilabos);
    }

}
