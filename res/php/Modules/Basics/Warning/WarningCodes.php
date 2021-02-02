<?php

namespace SAO\Modules\Basics\Warning;

/**
 * @todo Documentacion
 */
abstract class WarningCodes {

    /**
     * @todo Doc
     */
    const UNKNOWN = 0;

    /**
     * 
     */
    const CANT_LOAD_PAGE_CONFIGURATION_FILE = 1;

    /**
     * 
     */
    const CANT_SAVE_PAGE_CONFIG_FILE = 2;

    /**
     * 
     */
    const PAGE_CONFIGURATION_INVALID_FORMAT = 3;

    /**
     * 
     */
    const DEFAULT_PAGE_CONFIGURATION = 4;

    /**
     * 
     */
    const DATABASE_CONFIGURATION_INVALID_FORMAT = 5;

    /**
     * 
     */
    const CANT_LOAD_DATABASE_CONFIGURATION_FILE = 6;

    /**
     * 
     */
    const NO_TABLES_INSTALLATION = 7;

    /**
     * 
     */
    const CANT_EXECUTE_INSTALLATION_TABLE_COMMAND = 8;

}
