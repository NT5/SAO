<?php

namespace SAO\Modules\Extended\Database;

use SAO\Modules\Extended;
use SAO\Modules\Extended\Database;
use SAO\Modules\Basics\Warning;
use SAO\Modules\Basics\Error;

/**
 * 
 */
class DatabaseInstaller extends Extended\ExtendedExtended {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
        $Extended->Basics()->setLog("Nueva instancia de instalacion creada");
    }

    /**
     * Regresa un valor TRUE si la tabla Install_Data se encuentra en la base de datos configurada, FALSE si no existe
     * @return boolean
     */
    public function isInstalled() {
        $Database = $this->Extended()->Database();

        $is_installed = $Database->query("SHOW TABLES LIKE 'Install_Data'");
        return ($is_installed && $is_installed->num_rows > 0 ? TRUE : FALSE);
    }

    /**
     * Lanza secuencia de comandos que comprueba y realiza la instalación de las tablas SQL
     */
    public function Install() {
        $this->Basics()->setLog("Comprobando si las tablas SQL están instaladas...");

        if ($this->isInstalled() === FALSE) {
            $this->makeInstall();
            return;
        }
        $this->Basics()->setLog("Las tablas están instaladas, no es necesario realizar instalación");
    }

    /**
     * Realiza secuencia de comandos para la instalación de tablas SQL.
     */
    private function makeInstall() {
        $this->Basics()->setLog("No se encontró una instalación valida, procediendo a crear una...");
        $this->Basics()->addWarning(Warning\WarningCodes::NO_TABLES_INSTALLATION);

        $Database = $this->Extended()->Database();

        $Database->disableForeignKeyChecks();

        foreach (Database\DatabaseInstaller\InstallFiles::getFileArray() as $area_key => $area_value) {
            $this->Basics()->setLog("Cargando archivos del area %s...", $area_key);

            $this->installArea($area_value);

            $this->Basics()->setLog("Archivos del area %s instalados correctamente", $area_key);
        }

        $Database->query("INSERT INTO Install_Data VALUES(NOW());");
        $Database->enableForeignKeyChecks();

        $this->Basics()->setLog("Instalación de todos los archivos completada correctamente");
    }

    /**
     * 
     * @param array $area
     */
    private function installArea($area) {
        foreach ($area as $file_key => $file_value) {
            $this->Basics()->setLog("Cargando archivo %s...", $file_key);

            $file_commands = Database\DatabaseUtil::sqlFromFile($file_value);

            if ($file_commands) {
                $this->Basics()->setLog("Archivo SQL cargado desde %s", $file_value);
                $this->installFile($file_commands);
            } else {
                $this->Basics()->addError(Error\ErrorCodes::INSTALLATION_TABLE_FILE_NOT_FOUND);
                $this->Basics()->setLog("El archivo SQL %s no pudo ser encontrado; instalación fallida", $file_value);
            }

            $this->Basics()->setLog("Fin de la carga del archivo %s.", $file_key);
        }
    }

    /**
     * 
     * @param array $file_commands
     */
    private function installFile($file_commands) {
        $Database = $this->Extended()->Database();

        $total_commands = count($file_commands);
        for ($i = 0; $total_commands > $i; $i++) {
            $this->Basics()->setLog("Ejecutando comando %s de %s...", ($i + 1), $total_commands);
            $query = $Database->query($file_commands[$i]);
            if ($query) {
                $this->Basics()->setLog("Comando %s ejecutado correctamente", ($i + 1));
            } else {
                $this->Basics()->addWarning(Warning\WarningCodes::CANT_EXECUTE_INSTALLATION_TABLE_COMMAND);
                $this->Basics()->setLog("El comando %s no se ejecuto correctamente Error: %s", ($i + 1), $Database->getError());
            }
        }
    }

}
