# Angular-Wordpress-Theme
Plantilla Wordpress construida con AngularJS, Wp REst Api, ACF

###Después de habilitar el tema
- Instalar y habilitar los plugins
- Especificar la ruta base de la instalación. En header.php la etiqueta &lt;base href="/wordpress/"&gt;
- Importar los custom fields con el archivo "advanced-custom-field-export.xml"
- Editar el formulario de contacto que generar Contact Form 7 por defecto.
  - Al campo correo electrónico añadir la siquiente ID: id:checkvalid
  - Al campo submit añadir las siguientes clases: class:waves-effect class:waves-light class:btn class:cyan class:darken-3

###Crear contenido
- Crear una página y añadir los campos necesarios
- Hay dos tipo de entradas: ventas y alquileres. Crear contenido para ambos (para el tipo venta hay un campo llamado "Destacada venta", la entrada que la tenga marcada semostrara en la Home)
