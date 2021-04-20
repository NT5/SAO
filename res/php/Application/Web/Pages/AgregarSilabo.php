<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;
use SAO\Modules\App\Carreras;
use SAO\Modules\App\Asignaturas;
use SAO\Modules\App\Municipios;
use SAO\Modules\App\SilaboEntradas;

class AgregarSilabo extends Page {

    private $Carreras;
    private $Asignaturas;
    private $Municipios;
    private $SilaboEntradas;

    /**
     * Es el constructor de la pagina
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        $this->SilaboEntradas = new SilaboEntradas($Extended);
        parent::__construct($Extended, "Maria", "pages/silabos/agregar_silabo.twig");

        $this->Carreras = new Carreras($this->Extended());
        $this->Asignaturas = new Asignaturas($this->Extended());
        $this->Municipios = new Municipios($this->Extended());

        $this->initVars();
    }

    public function initVars() {
        parent::initVars();

        $listaCarreras = $this->Carreras->getListaCarreras();
        $this->setVar('listaCarreras', $listaCarreras);

        $listaAsignaturas = $this->Asignaturas->getListaAsignaturas();
        $this->setVar('listaAsignaturas', $listaAsignaturas);

        $listaMunicipios = $this->Municipios->getListaMunicipios();
        $this->setVar('listaMunicipios', $listaMunicipios);
    }

    public function CheckPost() {
        $IdPed = $this->getPost('Municipios');
        $IdCarrera = $this->getPost('carrera');
        $IdAsignatura = $this->getPost('Asignaturas');
        $CodGrupo = $this->getPost('codigo_grupo');
        $CodAsignatura = $this->getPost('codigo_signatura');
        $AnioCarrera = $this->getPost('Anio_Carrera');
        $HorasCalse = $this->getPost('no_total_horas');
        $HorasPrecenciales = $this->getPost('horas_presenciales');
        $HorasIndependientes = $this->getPost('horas_est_independ');
        $Modalidad = $this->getPost('modalidad');
        $Trimestre = $this->getPost('Trimestre');
        $TipoEvaluacion = $this->getPost('evaluacion');
        $AnioLectivo = $this->getPost('anio_lectivo');
        $Facilitador = $this->getPost('facilitador');

        $agregar = $this->SilaboEntradas->agregarEntrada($IdPed, $IdCarrera, $IdAsignatura, $CodGrupo, $CodAsignatura, $AnioCarrera, $HorasCalse, $HorasPrecenciales, $HorasIndependientes, $Modalidad, $Trimestre, $TipoEvaluacion, $AnioLectivo, $Facilitador);
        if ($agregar === true) {
            $this->setVar('nueva_entrada', true);
        }
    }

}
