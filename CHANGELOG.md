# Changelog
Descubre las nuevas novedades de daamper!

## [0.3.5 Dev] - 22/08/2026

- Configuraciones (en proceso)
- Cambie todo el funcionamiento de como se cargan y actualizan los anuncios

## [0.3.3b Stable] - 22/03/2025

### 🔧 Modularización del panel administrativo y mejoras de seguridad

Versión estable enfocada en reorganizar y modularizar el panel administrativo para mejor mantenibilidad y seguridad. Se separan procesos en carpetas dedicadas, se mejora la gestión de imágenes y borradores, y se implementa versionado dinámico.

- **Explorador de archivos**: Interfaz sencilla para navegar, crear, renombrar y eliminar archivos y carpetas desde el panel.
- **Editor de archivos**: Editor básico integrado para ver y editar contenido de archivos directamente en el panel.
- **Modularización de procesos**: Cada módulo (archivos, imágenes, configuraciones, displadi, creador) con carpeta `procesa.php` independiente para mejor separación de responsabilidades.
- **Sistema de borradores mejorado**: Cambio de numérico (1-10) a naming convencional (`bo_nombre.php`) para mayor flexibilidad y control.
- **Gestión de imágenes reforzada**: Validación de tamaño (máx 1MB), tipos específicos (.jpg, .jpeg, .png, .gif), renombrado automático y prevención de duplicados con sufijo.
- **Versionado dinámico**: Versiones leídas desde archivos `.x` en lugar de hardcodeadas (`archivos.x`, `imagen.x`, `displadi.x`, `configuraciones.x`).
- **UX mejorada**: Placeholders informativos en formularios, instrucciones de optimización de imágenes (TinyPNG), validación de cliente mejorada.
- **Seguridad**: Sanitización de nombres de archivo, validación strict de tipos, prevención de sobrescrituras.
- **CSS actualizado**: Cambio de etiqueta `<aside>` a `<main>` (semántica HTML5), nuevas clases para checkboxes estilizados (`.boton-check`, `.check-*`).

## [0.3.4 Beta] - 11/02/2024

### 🔎 Nuevo buscador y mejoras varias

⚠️ No habran mas versiones de esta rama

Versión que introduce un buscador integrado y mejoras en administración, usabilidad y estilos.

- Buscador integrado: nueva funcionalidad de búsqueda (`buscar.php`) para localizar contenidos en Blog, ForoLink y secciones de videos/proyectos. Incluye formulario de búsqueda y resultados centralizados.
- Integración UI: añadidos scripts y componentes en `Cabeza`, `Menu` y `PiedePagina` para mostrar el formulario de búsqueda y opciones de usuario.
- Publicaciones y formularios: mejoras en carga y procesamiento de datos (`cargar.php`, `procesar.php`, `form/iobi/*`) y aumento del límite de comentarios/textarea.
- Temas y estilos: ajustes en `css/` (`estilo.css`, `temaDark.php`, `temaDark2.php`) para compatibilidad visual con el buscador y nuevas opciones de personalización.
- Panel administrativo: refactor y mejoras en las páginas del panel relacionadas con contenido y scripts del panel.
- Recursos y activos: nuevos assets de imagen y refinamientos en presentación de entradas.
- Correcciones menores: rutas, includes/requires y actualizaciones de `version.txt` a `v0.3.4 Beta`.


## [0.3.3 Beta] - 01/09/2023

### ⚙️ Mejoras, correcciones y nuevas funciones

Versión enfocada en robustecer el panel administrativo, mejorar la gestión de archivos y corregir rutas y permisos.

- Actualización de versión a `v0.3.3 Beta Estable` y ajustes en `version.txt`.
- Panel administrativo: nueva funcionalidad de gestión de directorios (`directorio.php`), manejo de imágenes y archivos (`archivos.php`, `imagen.php`), y opciones de renombrado desde el panel.
- Refactor y limpieza de scripts del panel para mayor consistencia y mejor organización de `Cabeza`, `Menu` y `PiedePagina`.
- Seguridad: actualización de `.htaccess` para bloquear tipos de archivo sensibles y mejorar la seguridad del servidor.
- Publicaciones y formularios: correcciones en rutas de carga y procesamiento (`cargar.php`, `procesar.php`, `form/iobi/*`) y aumento de la longitud máxima de comentarios para mejorar la experiencia de usuario.
- Anuncios y entradas: mejoras en el manejo de anuncios (`anuncios.php`, `actualizar_acc.php`) y organización de entradas del blog.
- Correcciones menores: arreglos en construcción de rutas, includes/requires y mejoras en presentación y SEO.


## [0.3.2 Beta] - 25/08/2023

### 🚀 Novedades y mejoras

Versión menor enfocada en mejoras del panel de administración, publicación y personalización de temas, junto a correcciones de estabilidad y experiencia de usuario.

- Actualización de versión a `v0.3.2 Beta` y ajustes de metadatos.
- Panel de administración: mejoras en navegación y edición, nueva gestión de imágenes y archivos (`imagen.php`, `archivos.php`, `actualizar_acc.php`), y refactor de scripts del panel para mayor consistencia.
- Publicaciones y Forolink: mejor manejo de carga en `cargar.php` y aumento del límite de comentarios en `procesar.php` para permitir entradas más largas.
- Formularios y procesadores: nuevos campos y validación mejorada en formularios (`form/iobi/*`, `formulario.php`, `procesar.php`).
- Temas y personalización: nuevos perfiles de tema y ajustes en CSS (soporte dark/light, variables de color y opciones de tema).
- Perfil y seguridad: mejoras en edición y gestión de contraseñas, eliminación de perfiles y manejo de sesiones.
- Anuncios, mensajes y utilidades: mejoras en `anuncio.php`, `mensajes.php` y en la presentación de avisos y errores durante uploads.
- Activos y recursos: nuevos assets de imagen y logo, y actualizaciones en contenido multimedia y tutoriales.
- Correcciones menores: ajustes en rutas, includes/requires, meta tags para SEO y mejoras de accesibilidad.


## [0.3.1 Beta] - 31/07/2023

### ✨ Mejoras y correcciones principales

Lanzamiento menor con ajustes de estabilidad, mejoras en la administración y nuevas opciones de personalización.

- Actualización de versión a `v0.3.1 Beta` y ajustes de metadatos.
- Mejoras en el panel de administración: controles de acceso más robustos, refactor de edición y gestión de entradas.
- Sistema de plantillas y temas: nuevos estilos y soporte mejorado para temas oscuro/Claro, con opciones de carga y configuración.
- Publicaciones y Forolink: mejor carga y presentación de publicaciones y comentarios, soporte para imágenes y reacciones.
- Formularios y procesamiento: validación reforzada y mejor manejo de archivos en formularios y procesadores.
- Anuncios dinámicos y mensajes mejorados para notificaciones y avisos en el sitio.
- Componentes de `Cabeza`, `Menu` y `PiedePagina` para personalización del encabezado, menús laterales y pie de página.
- Correcciones menores: rutas, includes/requires, manejo de errores y ajustes en páginas públicas.


## [0.3.0 Beta] - 26/07/2023

### 🎨 Mejoras principales de personalización y gestión de contenido

- Gestión de plantillas y temas: nuevos archivos de tema y opciones de configuración (`tema.php`, `temafinal.php`, `nuevotema.php`, `tmmod.php`).
- Editor y modificador: sección mejorada para editar entradas y archivos desde el panel (`editor.php`, `editorModificable.php`, `modificador`).
- Creación y manejo de contenido: nuevas pantallas y procesos para crear y publicar contenido (`creador.php`, `creador2.php`, `crear_acc.php`, `crear2.php`, `formblog.php`).
- Carga y presentación de contenido: refactor en la lógica de carga y visualización de publicaciones y comentarios para mejorar compatibilidad y rendimiento (`cargar.php`, `displa.php`, `extenciones.php`, `pubdatos.php`).
- Personalización de encabezado/menú/pie: añadidos scripts y componentes para configurar `Cabeza`, menús y `PiedePagina` desde el panel.
- Panel administrativo y extensiones: mejoras en navegación, manejo de extensiones y verificaciones adicionales (`panel_acc.php`, `extencionesPanel.php`, `verificar.php`).
- Formularios y flujo de publicación: correcciones y mejoras en formularios y procesamiento de entradas para mayor robustez y manejo de archivos.
- Correcciones y ajustes menores: imágenes, reportes, contadores, metadatos de versión y mejoras en el sistema de reportes.
- Documentación actualizada: `README.md` y `ATENCION.txt` con instrucciones y datos relevantes.


## [0.2.0 Beta] - 20/07/2023

### 🎨 Mejoras del ForoLink, nuevas secciones y funciones

- Ahora se pueden agregar imagenes en los forolink
- Ahora se muestran los mensajes de alerta!
- Nueva sección para crear cuenta!
- Nueva sección de reporte de comentarios
- Nueva sección de blog