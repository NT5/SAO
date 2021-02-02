<?php

namespace SAO\Modules\Extended;

use SAO\Modules\Extended;
use SAO\Modules\Basics;
use SAO\Modules\Basics\BasicsExtend;

abstract class ExtendedExtended extends BasicsExtend {

    /**
     *
     * @var Extended
     */
    protected $Extended;

    /**
     * 
     * @return Extended
     */
    public function Extended() {
        return $this->Extended;
    }

    /**
     * 
     * @param Extended $Extended
     * @param Basics $Basics
     */
    public function __construct(Extended $Extended = NULL, Basics $Basics = NULL) {
        if ($Extended) {
            parent::__construct($Basics ?: $Extended->Basics());
        } else {
            parent::__construct($Basics);
        }

        $this->Extended = ($Extended) ?: new Extended($this->Basics());
    }

}
