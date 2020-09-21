<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class AgenteModelo extends MainModel{
		
	protected function agregarAgenteModelo($datos){
		$sql=MainModel::conectar()->prepare("INSERT INTO agente(AgenteDpi, AgenteNombre, AgenteApellido, AgenteNacimiento, AgenteGrupo, AgenteFoto, AgenteGradoAcademico, AgenteSede, AgenteTurno, AgenteEstado, IdPuesto) VALUES(:Dpi, :Nombre, :Apellido, :Nacimiento, :Grupo, :Foto, :GradoAcademico, :Sede, :Turno, :Estado, :IdPuesto)");
		$sql->bindParam(":Dpi", $datos['Dpi']);
		$sql->bindParam(":Nombre", $datos['Nombre']);
		$sql->bindParam(":Apellido", $datos['Apellido']);
		$sql->bindParam(":Nacimiento", $datos['Nacimiento']);
		$sql->bindParam(":Grupo", $datos['Grupo']);
		$sql->bindParam(":Foto", $datos['Foto']);
		$sql->bindParam(":GradoAcademico", $datos['GradoAcademico']);
		$sql->bindParam(":Sede", $datos['Sede']);
		$sql->bindParam(":Turno", $datos['Turno']);
		$sql->bindParam(":Estado", $datos['Estado']);
		$sql->bindParam(":IdPuesto", $datos['IdPuesto']);
		$sql->execute();

		return $sql;
	}
	protected function agregarAntecedenteMedicosModelo($datosMedicos){
		$sql = MainModel::conectar()->prepare("INSERT INTO antecedentes_medicos(IdAgente, AntecedentesPeso, AntecedentesEstatura, AntecedentesPesoIdeal, AntecedentesProblemasMedicos, AntecedentesAlergias, AntecedentesFichaMedica) VALUES(:IdAgente, :Peso, :Estatura, :PesoIdeal, :ProblemasMedicos,  :Alergias, :FichaMedica) ");
		$sql->bindParam(":IdAgente", $datosMedicos['IdAgente']);
		$sql->bindParam(":Peso", $datosMedicos['Peso']);
		$sql->bindParam(":Estatura", $datosMedicos['Estatura']);
		$sql->bindParam(":PesoIdeal", $datosMedicos['PesoIdeal']);
		$sql->bindParam(":ProblemasMedicos", $datosMedicos['ProblemasMedicos']);
		$sql->bindParam(":Alergias", $datosMedicos['Alergias']);
		$sql->bindParam(":FichaMedica", $datosMedicos['FichaMedica']);
		$sql->execute();

		return $sql;

	}
	protected function actualizarAgenteModelo($datos){
		$sql=MainModel::conectar()->prepare("UPDATE agente SET AgenteDpi = :Dpi, AgenteNombre = :Nombre, AgenteApellido = :Apellido, AgenteNacimiento = :Nacimiento, AgenteGrupo = :Grupo, AgenteFoto, = :Foto, AgenteGradoAcademico = :GradoAcademico, AgenteSede = :Sede, AgenteTurno = :Turno, AgenteEstado = :Estado, IdPuesto : IdPuesto");
		$sql->bindParam(":Dpi", $datos['Dpi']);
		$sql->bindParam(":Nombre", $datos['Nombre']);
		$sql->bindParam(":Apellido", $datos['Apellido']);
		$sql->bindParam(":Nacimiento", $datos['Nacimiento']);
		$sql->bindParam(":Grupo", $datos['Grupo']);
		$sql->bindParam(":Foto", $datos['Foto']);
		$sql->bindParam(":GradoAcademico", $datos['GradoAcademico']);
		$sql->bindParam(":Sede", $datos['Sede']);
		$sql->bindParam(":Turno", $datos['Turno']);
		$sql->bindParam(":Estado", $datos['Estado']);
		$sql->bindParam(":IdPuesto", $datos['IdPuesto']);
		$sql->execute();

		return $sql;
	}
	protected function eliminarAgenteModelo($idAgente){
		$sql = MainModel::conectar()->prepare("DELETE FROM agente WHERE IdAgente = :IdAgente");
		$sql->bindParam(":IdAgente", $idAgente);
		$sql->execute();

		return $sql;
	}
	protected function eliminarAntecedentesMedicos($idAgente){
		$sql = MainModel::conectar()->prepare("DELETE FROM antecedentes_medicos WHERE IdAgente = :IdAgente");
		$sql->bindParam(":IdAgente", $idAgente);
		$sql->execute();

		return $sql;
	}
	protected function agregarBitacoraAgenteModelo($datosBitacora){
		
	}

	protected function seleccionarInformacionAgenteModelo($idAgente){
		$sql=MainModel::conectar()->prepare("SELECT A.IdAgente, A.AgenteDpi, A.AgenteNombre, A.AgenteApellido, A.AgenteNacimiento, A.AgenteGrupo, A.AgenteFoto, A.AgenteGradoAcademico, A.AgenteTurno, B.AntecedentesPeso, B.AntecedentesEstatura, B.AntecedentesPesoIdeal, B.AntecedentesProblemasMedicos, B.AntecedentesAlergias, B.AntecedentesFichaMedica, C.IdPuesto, C.PuestoNombre, D.IdEstado, D.EstadoNombre,E.IdSede, E.SedeNombre FROM agente A JOIN antecedentes_medicos B ON A.IdAgente = B.idAgente JOIN puesto C ON A.IdPuesto = C.IdPuesto JOIN estado D ON A.AgenteEstado = D.IdEstado JOIN sede E ON A.AgenteSede = E.IdSede WHERE A.IdAgente = :IdAgente");
		$sql->bindParam(":IdAgente", $idAgente);
		$sql->execute();
		$sql=$sql->fetch(PDO::FETCH_ASSOC);
		return $sql;
		
	}
	

}