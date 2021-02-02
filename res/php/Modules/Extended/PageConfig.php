<?php

namespace SAO\Modules\Extended;

use SAO\Modules\Basics;
use SAO\Modules\Extended\PageConfig;

/**
 * @todo Documentar
 * Clase que contiene metodos y variables de configuracion de la pagina
 */
class PageConfig extends Basics\BasicsExtend implements PageConfig\PageConfigInterface {

    use PageConfig\saveToIni,
        PageConfig\fromIniFile;

    /**
     * @var string Cadena de texto con el titulo de la pagina
     */
    private $page_title;

    /**
     * @var boolean Variable que comprueba el estado de la instalación
     */
    private $first_run;

    /**
     *
     * @var string 
     */
    private $page_domain;

    /**
     *
     * @var bool 
     */
    private $enable_debug;

    /**
     * Regresa instancia de configuración de la pagina web
     * @param Basics $Basics
     * @param string $page_title cadena de texto que se usa en los tags <b>title</b>
     * @param boolean $first_run Es la primera ejecucion de la pagina
     * @param string $page_domain
     * @param bool $enable_debug
     */
    public function __construct(Basics $Basics = NULL, $page_title = NULL, $first_run = TRUE, $page_domain = NULL, $enable_debug = TRUE) {
        parent::__construct($Basics);

        $this->page_title = ($page_title) ?: "Default";
        $this->first_run = ($first_run == TRUE ? TRUE : FALSE);
        $this->page_domain = ($page_domain) ?: FALSE;
        $this->enable_debug = ($enable_debug == TRUE ? TRUE : FALSE);

        $this->Basics()->setLog("Nueva instancia de configuración de pagina creada");
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->page_title;
    }

    /**
     * 
     * @return boolean
     */
    public function getFirstRun() {
        return $this->first_run;
    }

    /**
     * 
     * @return string
     */
    public function getPageDomain() {
        return $this->page_domain;
    }

    /**
     * 
     * @return boolean
     */
    public function getEnableDebug() {
        return $this->enable_debug;
    }

    /**
     * 
     * @param string $title
     * @return string
     */
    public function setPageTitle($title) {
        $this->page_title = $title;
        return $title;
    }

    /**
     * 
     * @param boolean $first_run
     * @return boolean
     */
    public function setFirstRun($first_run) {
        $this->first_run = $first_run;
        return $first_run;
    }

    /**
     * 
     * @param string $page_domain
     * @return string
     */
    public function setPageDomain($page_domain) {
        $this->page_domain = $page_domain;
        return $page_domain;
    }

    /**
     * 
     * @param boolean $enable_debug
     * @return boolean
     */
    public function setEnableDebug($enable_debug) {
        $this->enable_debug = $enable_debug;
        return $enable_debug;
    }

}
