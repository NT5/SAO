<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;
use SAO\Modules\App\Carreras;
use SAO\Modules\App\Asignaturas;

class Maria extends Page {

    private $Carreras;
    private $Asignaturas;
    
    /**
     * Es el constructor de la pagina
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Maria", "pages/Maria.twig");
        
        $this->Carreras = new Carreras($this->Extended());
        $this->Asignaturas = new Asignaturas($this->Extended());
        $this->initVars();
    }
    
    public function initVars() {
        parent::initVars();
        
        $listaCarreras = $this->Carreras->getListaCarreras();
        $this->setVar('listaCarreras', $listaCarreras);
        
        $listaAsignaturas= $this->Asignaturas->getListaAsignaturas();
        $this->setVar('listaAsignaturas', $listaAsignaturas);
    }
    
    public function CheckPost() {
        parent::CheckPost();
        $post = $this->getPost();
        print_r($post);
    }

}
