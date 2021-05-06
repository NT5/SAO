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

    public function obtenerSilabo(int $id) {
        $db = $this->Extended()->Database();
        $sql = "SELECT 
se.*, 
car.Nombre AS nombreCarrera,
asi.Nombre AS nombreAsignatura,
pd.Nombre AS nombrePed
FROM silabo_entradas AS se 
INNER JOIN carreras AS car ON se.Id_Carrera = car.Id_Carrera
INNER JOIN asignaturas AS asi ON se.Id_Asignatura = asi.Id_Asignatura 
INNER JOIN peds AS pd ON se.Id_Ped = pd.Id_Ped
where se.Id_Silabo = $id";

        $prodecimento = $db->query($sql);
        $datos = $prodecimento->fetch_assoc();
        return $datos;
    }

}
