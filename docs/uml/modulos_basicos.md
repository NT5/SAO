```plantuml
package "Basics component" as BC {
 [Logger] as L #Aqua
 [Warning] as W #Yellow
 [Error] as E #Red
 interface Adition
 interface Delete
 interface Getter
 L ..> Adition
 L ..> Delete
 L ..> Getter
 W ..> Adition
 W ..> Delete
 W ..> Getter
 E ..> Adition
 E ..> Delete
 E ..> Getter

note top of L
Añade seguimiento
en el runtime del
framework
end note

note top of W
Registra las advertencias
que afecten el software.
end note

note top of E
Guarda la lista de errores
que compromenten el firmware.
end note


}

note top of BC
Set de componentes
con clases basicas
para el funcionamiento
del framework.
end note
```