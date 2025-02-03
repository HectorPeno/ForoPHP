# 📌 Foro en PHP

Este es un proyecto de foro desarrollado en **PHP** utilizando el patrón de arquitectura **MVC**. Ofrece una plataforma intuitiva para la gestión de usuarios, creación de temas, respuestas y administración eficiente del foro.

---

## 🚀 Características Principales

✔️ Registro e inicio de sesión con autenticación mediante sesiones y cookies.  
✔️ Creación, edición y eliminación de temas y respuestas.  
✔️ Contador de visitas en los temas.  
✔️ Soporte para subida de archivos en las publicaciones.  
✔️ Diseño **responsive** con CSS para adaptabilidad en distintos dispositivos.  
✔️ Registro de accesos en el archivo `accesos.txt` para auditoría.  

---

## 📁 Estructura del Proyecto

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

---

## ⚙️ Instalación y Configuración

Sigue estos pasos para desplegar el foro en tu entorno:

1️⃣ Clona este repositorio:
   ```sh
   git clone https://github.com/tuusuario/foro-php.git
   ```
2️⃣ Configura la base de datos en `config.php`.
3️⃣ Ejecuta `install.php` para generar las tablas necesarias.
4️⃣ Asegúrate de que la carpeta `images/` tenga permisos de escritura para la subida de archivos.
5️⃣ Accede al foro a través de `index.php` en tu navegador.

---

## 🤝 Contribuciones

¡Toda contribución es bienvenida! Si deseas colaborar:
- Haz un **fork** del repositorio.
- Crea una nueva rama con tus cambios.
- Envía un **pull request** con mejoras o correcciones.

---

## 📜 Licencia

Este proyecto está bajo la licencia **MIT**, lo que significa que puedes utilizarlo y modificarlo libremente. Revisa el archivo `LICENSE` para más detalles.

---

📧 ¿Dudas o sugerencias? Contáctanos o abre un issue en el repositorio. ¡Gracias por tu interés en este proyecto! 🚀

