<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;
use SAO\Modules\App\Carreras;

class Maria extends Page {

    private $Carreras;
    
    /**
     * Es el constructor de la pagina
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Maria", "pages/Maria.twig");
        
        $this->Carreras = new Carreras($this->Extended());
        $this->initVars();
    }
    
    public function initVars() {
        parent::initVars();
        
        $listaCarreras = $this->Carreras->getListaCarreras();
        $this->setVar('listaCarreras', $listaCarreras);
    }
    
    public function CheckPost() {
        parent::CheckPost();
        $post = $this->getPost();
        print_r($post);
    }

}
