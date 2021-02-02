<?php

namespace SAO\Modules\Basics\Error;

trait ErrorAdition {

    /**
     *
     * @var array
     */
    protected $Errors = [];

    /**
     * 
     * @param int $Error
     * @return \SAO\Modules\Basics\Errors
     * @throws \Exception
     */
    public function addError($Error) {
        if (is_int($Error)) {
            $this->Errors[] = $Error;
            return $this;
        }
        throw new \Exception("No valid value");
    }

}
