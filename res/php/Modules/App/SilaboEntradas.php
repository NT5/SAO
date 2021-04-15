<?php

namespace SAO\Modules\App;

use SAO\Modules\Extended\ExtendedExtended;

class SilaboEntradas extends ExtendedExtended {

    public function agregarEntrada(
            $IdPed,
            $IdCarrera,
            $IdAsignatura,
            $CodGrupo,
            $CodAsignatura,
            $AnioCarrera,
            $HorasCalse,
            $HorasPrecenciales,
            $HorasIndependientes,
            $Modalidad,
            $Trimestre,
            $TipoEvaluacion,
            $AnioLectivo,
            $Facilitador
    ) {
        // Aqui se guardaa la conexion de la base de datos
        $db = $this->Extended()->Database();
        $sql = "INSERT INTO silabo_entradas
	(Id_Ped, Id_Carrera, Id_Asignatura, CodigoGrupo, CodAsignatura, AnioCarrera, HorasClase, HorasPrecenciales, HorasIndependientes, Modalidad, Trimestre, TipoEvaluacion, AnioLectivo, Facilitador)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $prodecimento = $db->prepare($sql);
        $prodecimento->bind_param("iiissiiiisisss",
                $IdPed,
                $IdCarrera,
                $IdAsignatura,
                $CodGrupo,
                $CodAsignatura,
                $AnioCarrera,
                $HorasCalse,
                $HorasPrecenciales,
                $HorasIndependientes,
                $Modalidad,
                $Trimestre,
                $TipoEvaluacion,
                $AnioLectivo,
                $Facilitador
        );
        $prodecimento->execute();
        if ($prodecimento->errno) {
            var_dump($prodecimento);
            return false;
        } else {
            return true;
        }
    }

}
