Newton-Go ⚛️ — Plataforma educativa de Física

Sitio web tipo Duolingo para aprender física básica mediante cuestionarios interactivos y glosarios.

Logro: 3er lugar a nivel estatal en hackatón (equipo de 2 personas).

Tecnologías
- Frontend: HTML, CSS, JavaScript (vanilla)
- Backend: PHP
- Base de datos: MySQL
- Persistencia de progreso: localStorage

Funcionalidades
- Registro e inicio de sesión con contraseñas hasheadas (`password_hash` / `password_verify`)
- 7 módulos de física: Cinemática, Dinámica, Energía, Ondas, Electricidad, Termodinámica y Óptica
- Cuestionarios de 20 preguntas por módulo, con opciones mezcladas aleatoriamente
- Glosario de fórmulas por tema
- Dashboard con barras de progreso por módulo
- Subida de foto de perfil
- Progreso guardado y persistente por usuario

Mi aportación
Desarrollé el backend en PHP (login, registro, subida de imágenes), el diseño de la base de datos MySQL y los 7 cuestionarios interactivos con su sistema de progreso.

Cómo ejecutarlo
1. Instala XAMPP o Laragon (PHP + MySQL).
2. Copia los archivos del proyecto en la carpeta `htdocs/` (XAMPP) o `www/` (Laragon).
3. Abre phpMyAdmin e importa el archivo `estructura.sql` (crea la base de datos `newton_go`).
4. Crea una carpeta llamada `uploads/` en la raíz del proyecto (ahí se guardan las fotos de perfil).
5. Verifica las credenciales de conexión en `conexion.php` e `img.php` (por defecto: `localhost`, usuario `root`, sin contraseña).
6. Abre en el navegador: `http://localhost/inicio_sesion.html`

> Nota sobre la base de datos: el respaldo original de la BD no se conservó. El archivo `estructura.sql` fue reconstruido a partir del código PHP del proyecto (tablas `usuarios` e `imagenes`). El sistema funciona correctamente con esta estructura.

> Nota sobre `uploads/`: esta carpeta no se incluye en el repositorio porque almacena archivos subidos por los usuarios. Debe crearse manualmente al instalar el proyecto.

Estructura del proyecto
newton-go/
- conexion.php # Registro e inicio de sesión
- img.php # Subida de imagen de perfil
- newton go.php # Dashboard principal
- inicio_sesion.html # Pantalla de login/registro
- cuestionario cinematica.html
- cuestionarioDinamica.html
- cuestionarioEnergia.html
- cuestionarioOndas.html
- cuestionarioElectricidad.html
- cuestionarioTermodinamica.html
- cuestionarioOptica.html
- estructura.sql # Estructura de la base de datos (reconstruida)
- uploads/ # (crear manualmente) imágenes subidas por usuarios
- README.md

Mejoras pendientes (roadmap)
- Migrar las consultas a prepared statements para prevenir inyección SQL.
- Mover las credenciales de la base de datos a variables de entorno.
- Renombrar archivos con espacios (`newton go.php` → `dashboard.php`).
- Validar el tipo y tamaño de archivo en la subida de imágenes.
- Añadir la opción de recuperar contraseña.
