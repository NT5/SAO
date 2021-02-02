
# SAO (Silabo de asignatura online)

Sistema online y framework extensible que permite la adición, edición y muestra de los formatos de silabo de asignatura.

[![coverage report](https://hendell.pw:8000/UML/SAO/badges/master/coverage.svg)](https://hendell.pw:8000/UML/SAO/commits/master)
[![pipeline status](https://hendell.pw:8000/UML/SAO/badges/master/pipeline.svg)](https://hendell.pw:8000/UML/SAO/commits/master)


## Iniciando con el proyecto

Este sistema puede ser ejecutado bajo cualquier ambiente de pagina web con o sin acceso a Internet (*es necesario únicamente en la instalación)

### Pre-requisitos

Tenga en cuenta lo siguiente antes de empezar con la instalación del proyecto.

 - [x] Conocimientos básicos de manejo de servidores web (LAMP/WAMP)
 - [x] Apache2.
 - [x] MySQL.
 - [x] PHP 7 o posterior.
 - [x] Disponer de una copia de composer.phar en el sistema.
 - [x] phpDocumentor
 - [x] phpmetrics
 - [x] NodeJS inslatado en su ambiente de trabajo.
 - [x] Bower.
 - [x] Activar el modulo mod_rewrite en su instalacion de apache.
 - [x] Habilitar los archivos .htaccess.

### Instalación

Descarga composer en el directorio donde se encuentra tu repositorio.

```
wget -q https://getcomposer.org/composer.phar
```

Ejecuta el comando de instalación desde la linea de comandos:

```
php composer.phar install
```
