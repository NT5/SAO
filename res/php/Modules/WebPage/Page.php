<?php

namespace SAO\Modules\WebPage;

use SAO\Modules\Util\Functions;
use SAO\Modules\Extended;
use SAO\Modules\Extended\ExtendedExtended;
use SAO\Modules\WebPage\Twig;

/**
 * @todo Documentar
 */
class Page extends ExtendedExtended {

    /**
     *
     * @var string 
     */
    private $Page_Title;

    /**
     *
     * @var string 
     */
    private $Page_Template;

    /**
     *
     * @var Twig 
     */
    private $Twig;

    /**
     * 
     * @param Extended $Extended
     * @param sring $Page_Title
     * @param string $Page_Template
     * @param Twig $Twig_Class
     */
    public function __construct(Extended $Extended = NULL, $Page_Title = NULL, $Page_Template = NULL, Twig $Twig_Class = NULL) {
        parent::__construct($Extended);

        $this->Page_Title = ($Page_Title) ?: "Default";
        $this->Page_Template = ($Page_Template) ?: "base.twig";

        $this->Twig = ($Twig_Class) ?: new Twig();

        $this->setFilters();

        $this->setTemplate($this->getPageTemplate());
    }

    public function CheckPost() {
        
    }

    public function initVars() {
        
    }

    public function initTwigTemplate() {
        
    }

    /**
     * 
     */
    private function setFilters() {
        $Twig = $this->getTwig();

        $Twig->addFilter('integerToRoman', function ($number) {
            return Functions::integerToRoman($number);
        });
        $Twig->addFilter('PageDomain', function($url) {
            $PageConfig = $this->Extended()->PageConfig();
            return $PageConfig->getPageDomain() . $url;
        });
    }

    /**
     * 
     * @param string $vars
     */
    public function setVars($vars) {
        $this->getTwig()->setVars($vars);
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function setVar($name, $value) {
        $this->getTwig()->setVar($name, $value);
    }

    /**
     * 
     * @param string $template
     */
    public function setTemplate($template) {
        $this->getTwig()->setTemplate($template);
    }

    /**
     * 
     * @return string
     */
    public function display() {
        return $this->getTwig()->getRender();
    }

    /**
     * 
     * @return Twig
     */
    public function getTwig() {
        return $this->Twig;
    }

    /**
     * 
     * @return array
     */
    public function getPost() {
        $POST = filter_input_array(INPUT_POST);
        return $POST;
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle() {
        return $this->Page_Title;
    }

    /**
     * 
     * @return string
     */
    public function getPageTemplate() {
        return $this->Page_Template;
    }

    /**
     * 
     * @param string $Page_title
     */
    public function setPageTitle($Page_title) {
        $this->Page_Title = $Page_title;
    }

    /**
     * 
     * @param string $Page_template
     */
    public function setPageTemplate($Page_template) {
        $this->Page_Template = $Page_template;
    }

}
