# Prueba de habilidades creando API's con Laravel

La siguiente prueba pretender evaluar las habilidades y conocimientos creando API's con Laravel. Además de eso se busca conocer la capacidad del evaluado adaptándose a un proyecto avanzado, comprendiendo el código y creando soluciones a partir de el.

La prueba consiste en culminar diversas características de un sistema de compra y venta de productos con la base de la API previamente programada. Este sistema busca realizar las siguientes acciones:

- Registrar usuarios nuevos mediante la API
- Restringir el acceso a los diversos endpoints para que solo usuarios autenticados puedan interactuar con ellos
- Crear y listar productos
- Listar únicamente los productos con stock disponible
- Comprar y vender productos a partir del usuario en sesión
- Listar los usuarios vendedores del sistema
- Listar los usuarios compradores del sistema
- Listar las transacciones de un producto perteneciente a un usuario
- Listar los productos en venta pertenecientes a un usuario
## La base de la API comprende:

- Formato de las respuestas de la API (Errores, mensajes de éxito y devolución de contenido)
- Autenticación con Passport con los controladores y rutas para registrar un usuario, iniciar sesión y cerrar sesión
- Migraciones y modelos del sistema
- Modelo Buyer heredado de User con un globalScope que solo devuelve usuarios con transacciones
- Modelo Seller heredado de User con un globalScope que solo deuvelve usuarios con productos en venta

### Diagrama de modelos y relaciones
![Modelos y relaciones](https://i.ibb.co/4tDq4xV/photo-2020-11-27-18-10-47.jpg "Modelos y relaciones")

