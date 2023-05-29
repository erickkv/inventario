Proyecto final para el curso de desarrollo de aplicaciones web



La base de datos fue realizada utilizando migrations, puede utilizar el comando:
        php artisan migrate (usando una consola siempre dentro de la carpeta del proyecto)
        Antes de poder hacer esto, debe crear la base de datos (sin tablas)
        En el archivo .env del proyecto ingrese lo siguiente:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=inventario (u otro nombre que quiera)
        DB_USERNAME=(seleccione un usuario)
        DB_PASSWORD=(seleccione la contraseña del usuario que eligió)



    para crear las tablas de la base de datos.

Deberá crear la base de datos: "inventario"
se incluye la carpeta: "DDL y DML" con scripts para crear las tablas e insertar algunos datos en la base de datos.



Para ingresar debe registrarse, puede usar cualquier correo y cualquier nombre que no esté en uso

Al ingresar irá al Dashboard, para trabajar con el inventario presione el texto: "ir a inventario"

Se presenta el inventario (o un mensaje diciendo que no hay artículos si ninguno se ha creado)

Al lado tiene una barra de opciones para ver el inventario, las entradas y las salidas

Si desea ingresar un articulo debe ir a entradas -> botón de registrar nueva entrada. Se mostrará un formulario para registrar la entrada, solo se muestran artículos existentes.
Si desea agregar un artículo nuevo, deberá accionar el botón de Ingresar nuevo artículo, donde se mostrará un formulario para crear el nuevo artículo

Para registrar una salida debe ir a salidas -> botón de registrar nueva salida.

En las listas de entradas y salidas puede seleccionar el nombre del artículo del renglón que quiere consultar, esto lo direccionará a una página con los detalles del registro.
