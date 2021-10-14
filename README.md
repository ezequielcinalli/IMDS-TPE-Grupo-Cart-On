# IMDS-TPE-Grupo-Cart-On

Repositorio del trabajo practico imds - equipo cart-on

Miembros del equipo:

- Aldaya, Benjamin
- Ballone, Gabriel
- Binetti, Facundo
- Cinalli, Ezequiel
- Guerrero, Lucas
- Fernández, Manuela

## Descripcion del proyecto

El proyecto trata de una cooperativa de reciclaje que desea crear un sitio web para automatizar y modernizar sus actividades.

## Tecnologias utilizadas

Se utilizara un backend php, con un motor de plantillas smarty para las vistas.

## Instrucciones setup servidor

- Instalar [xampp](https://www.apachefriends.org/es/download.html)
- Clonar el repositorio dentro del directorio htdocs ubicado en la carpeta de xampp
  - Path htdocs en linux: /opt/lampp/htdocs/
  - Path htdocs en windows:
- Dar permisos de escritura como administrador a la carpeta(para permitir a smarty crear archivos de compilacion)
  - En linux parado en la raiz del proyecto: sudo chmod 777 templates_c/
- Con el servicio apache iniciado dentro de xampp, en el entorno local correra en [localhost](http://localhost/IMDS-TPE-Grupo-Cart-On/)
