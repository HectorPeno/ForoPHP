# Foro en PHP

Este es un proyecto de foro desarrollado en PHP utilizando el patrón de arquitectura MVC. Permite la gestión de usuarios, creación de temas, respuestas y administración básica del foro.

## Características

- Registro e inicio de sesión de usuarios con autenticación mediante sesiones y cookies.
- Creación, edición y eliminación de temas y respuestas.
- Contador de visitas en los temas.
- Subida de archivos en las publicaciones.
- Diseño adaptativo (responsive) con CSS.
- Registro de accesos en un archivo `accesos.txt`.

## Estructura del Proyecto

```
SARAFORO/
│── images/                 # Carpeta para imágenes subidas por los usuarios
│── cierre.php              # Cierre de sesión
│── config.php              # Configuración del proyecto
│── crearusuario.php        # Registro de usuarios
│── editartema.css          # Estilos para la edición de temas
│── editartema.php          # Edición de temas
│── eliminar_respuesta.php  # Eliminación de respuestas
│── eliminartema.php        # Eliminación de temas
│── index.php               # Página principal del foro
│── insertar.css            # Estilos para inserciones
│── insertartema.php        # Creación de nuevos temas
│── install.php             # Instalación y configuración inicial
│── login.php               # Página de inicio de sesión
│── perfil.css              # Estilos para la página de perfil
│── perfil.php              # Página de perfil del usuario
│── procesar_respuesta.php  # Procesamiento de respuestas
│── registro.php            # Página de registro
│── respuesta.php           # Página para responder a un tema
│── style.css               # Estilos generales
│── tema.css                # Estilos para los temas
│── tema.php                # Página de visualización de un tema
```

## Instalación

1. Clona este repositorio:
   ```sh
   git clone https://github.com/tuusuario/foro-php.git
   ```
2. Configura la base de datos en `config.php`.
3. Ejecuta `install.php` para generar las tablas necesarias.
4. Asegúrate de que la carpeta `images/` tenga permisos de escritura para la subida de archivos.
5. Accede al foro a través de `index.php`.

## Contribución

Si deseas contribuir a este proyecto, puedes hacer un fork del repositorio y enviar pull requests con mejoras o correcciones.

## Licencia

Este proyecto está bajo la licencia MIT.

