<?php

namespace SAO\Application\Web\init;

use SAO\Modules\Basics;

trait initBasics {

    /**
     *
     * @var Basics
     */
    private $Basics;

    /**
     * 
     * @return Basics
     */
    public abstract function getBasics();

    private function initBasics() {
        $Basics = new Basics();

        $this->Basics = $Basics;
    }

}
