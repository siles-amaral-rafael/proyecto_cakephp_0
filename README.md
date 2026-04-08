MediaVault — Audiovisual Asset Management System

MediaVault es una plataforma de gestión y resguardo de activos multimedia desarrollada originalmente como proyecto académico para la asignatura Tecnología Web II. El sistema ha evolucionado hacia una solución personal diseñada para la organización, catalogación y distribución de contenido audiovisual en entornos de red doméstica.
1. Arquitectura y Tecnologías (Stack)

El proyecto se basa en una arquitectura robusta de código abierto, priorizando la modularidad y el rendimiento:

    Framework: CakePHP 5.3 (Service Provider, ORM, Middleware).

    Base de Datos: MariaDB (Gestionada mediante phpMyAdmin).

    Contenedores: Entorno de despliegue basado en Podman para garantizar el aislamiento de servicios.

    Interfaz: Bootstrap 5.3 con tipografía Outfit y Bootstrap Icons para una experiencia de usuario moderna y fluida.

2. Funcionalidades Implementadas

    Sistema de Autenticación y Autorización (RBAC): Gestión de roles diferenciados para Administradores y Usuarios finales.

    Gestión de Metadatos: Registro detallado de activos incluyendo título, autor, año de producción y álbum.

    Referenciación de Archivos: Sistema de enlazado manual de rutas de almacenamiento local y enlaces externos.

    Arquitectura de Datos: Persistencia automatizada mediante Timestamp Behaviors para trazabilidad de registros (created y modified).

    Seguridad: Encriptación de credenciales mediante DefaultPasswordHasher.

3. Roadmap de Desarrollo

Actualmente, el proyecto se encuentra en una fase activa de expansión, con las siguientes metas a corto y mediano plazo:

    Módulo de Carga Directa: Implementación de un servidor de archivos para la subida y almacenamiento físico de recursos multimedia.

    Interacción Social: Sistema de reacciones ("Me gusta" / "No me gusta") para el contenido.

    Categorización Avanzada: Clasificación taxonómica por género y tipo de archivo.

4. Instalación y Despliegue
Requisitos previos

    Podman / Podman-compose.

    Imagen local del entorno PHP configurada para CakePHP 5.x.

Procedimiento de levantamiento

El sistema utiliza una infraestructura de contenedores para simplificar la configuración del entorno. Para iniciar los servicios de MariaDB y el servidor de aplicaciones, ejecute:
Bash

podman-compose up -d

Configuración de Datos

Actualmente, el esquema de la base de datos se gestiona directamente a través de MariaDB. Para asegurar la conectividad, verifique las credenciales en el archivo config/app_local.php.
5. Licencia y Créditos

Proyecto desarrollado por rafael siles a como parte del programa de Tecnología Web II. Todos los derechos reservados para uso personal y académico.