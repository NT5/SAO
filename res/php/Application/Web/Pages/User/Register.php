<?php

namespace SAO\Application\Web\Pages\User;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;
use SAO\Modules\Util\Functions;
use SAO\Modules\Util\ImgPicker;

/**
 * 
 */
class Register extends Page {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "Register", "pages/register.twig");

        $this->initVars();
    }

    public function initVars() {
        $dir = Functions::parseDir([__DIR__, "..", "..", "..", "..", "..", 'gfx', 'img', 'blurshapes']);
        $img = ImgPicker::getRandImg("$dir/");

        $this->setVars([
            'sao.page.image' => $img,
            'sao.page.title' => 'Registro'
        ]);
    }

}
