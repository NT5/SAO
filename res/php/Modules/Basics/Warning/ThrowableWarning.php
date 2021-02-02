<?php

namespace SAO\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
interface ThrowableWarning {

    /**
     * 
     * @param int $Warning
     * @return \SAO\Modules\Basics\Warnings
     * @throws \Exception
     */
    public function addWarning($Warning);

    /**
     * 
     * @param int $index
     * @return int|FALSE
     */
    public function getWarning($index);

    /**
     * 
     * @param int $Warning
     * @return bool
     */
    public function hasWarning($Warning);

    /**
     * 
     * @return array
     */
    public function getWarnings();
}
