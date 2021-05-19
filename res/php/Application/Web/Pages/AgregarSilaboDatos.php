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
        $this->SilaboEntradas = new \SAO\Modules\App\SilaboEntradas($this->Extended);

        $silabo_id = (int) $_GET['id'];
        $n_encuentro = (int) $this->getPost('n_encuentros');
        $fecha_encuentro = $this->getPost('fecha_encuentro');
        $unidad = $this->getPost('unidad');
        $objetivos_unidad = $this->getPost('objetivos');
        $contenidos_tematicos = $this->getPost('contenidos_tematicos');
        $formas_ensenanzas = $this->getPost('forma_ensenanzas');
        $metodologias = $this->getPost('metodologias');
        $h_precenciales = (int) $this->getPost('h_presenciales');
        $h_estudio_independiente = (int) $this->getPost('h_estudio_independiente');
        $evaluacion = $this->getPost('evaluacion');
        $observaciones = $this->getPost('observaciones');

        $this->SilaboEntradas->agregarDatosSilabo(
                $silabo_id,
                $n_encuentro,
                $fecha_encuentro,
                $unidad,
                $objetivos_unidad,
                $contenidos_tematicos,
                $formas_ensenanzas,
                $metodologias,
                $h_precenciales,
                $h_estudio_independiente,
                $evaluacion,
                $observaciones
        );
    }

    public function initVars() {
        $silabo_id = $_GET['id'];
        $silabo = $this->SilaboEntradas->obtenerSilabo($silabo_id);
        $entradas = $this->SilaboEntradas->obtenerDatosSilabo($silabo_id);
        $this->setVar('silabo', $silabo);
        $this->setVar('silabo_datos', $entradas);
    }

}
