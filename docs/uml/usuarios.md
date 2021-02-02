```plantuml
skinparam rectangle {
	roundCorner<<Concept>> 25
}

rectangle "Usuarios en SAO" <<Concept>> {

actor :Administrador: as actor1
actor :Profesor: as actor2
actor :Academica: as actor3
actor :Invitados: as actor4


note bottom of actor1
Tiene acceso a
todo el sistema SAO.
end note

note bottom of actor2
Puede agregar
nuevos silabos
al sistema.
end note

note bottom of actor3
Valida los silabos
de los Profesores.
end note

note bottom of actor4
Usuario sin ningun
acceso a la pagina.
end note
}
```