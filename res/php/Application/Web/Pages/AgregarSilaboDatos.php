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
        $n_encuentro = $this->getPost('No_de_encuentros');
        $fecha_encuentro = $this->getPost('Fecha');
        $unidad = $this->getPost('Unidad');
        $objetivos_unidad = $this->getPost('Objetivos_de_la_unidad');
        $contenidos_tematicos = $this->getPost('Contenidos_tem');
        $formas_ensenanzas = $this->getPost('Formas_organizativas_de_la_enseñanza');
        $metodologias = $this->getPost('metodologias_estrategias_ejes_transversales');
        $h_precenciales = $this->getPost('horas_presenciales');
        $h_estudio_independiente = $this->getPost('horas_estudio_independiente');
        $evaluacion = $this->getPost('evaluaciones');
        $observaciones = $this->getPost('observaciones');
        
    }

    public function initVars() {
        $silabo_id = $_GET['id'];
        $silabo = $this->SilaboEntradas->obtenerSilabo($silabo_id);
        $this->setVar('silabo', $silabo);
    }

}
