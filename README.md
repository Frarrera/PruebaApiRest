# Prueba de habilidades creando APIs REST con Laravel

La siguiente prueba pretender evaluar las habilidades y conocimientos creando APIs REST con Laravel. Además de eso se busca conocer la capacidad del evaluado adaptándose a un proyecto existente, comprendiendo el código y creando soluciones a partir de el.

La prueba consiste en culminar diversas características de un sistema de compra y venta de productos con la base de la API previamente programada. Este sistema busca realizar las siguientes acciones:

- Restringir el acceso a los diversos endpoints para que solo usuarios autenticados puedan interactuar con ellos
- Crear y listar productos
- Listar únicamente los productos con stock disponible
- Comprar y vender productos a partir del usuario en sesión
- Listar los usuarios vendedores del sistema
- Listar los productos en venta pertenecientes a un usuario
## La base de la API comprende:

- Formato de las respuestas de la API (Errores, mensajes de éxito y devolución de contenido)
- Autenticación con Passport con los controladores y rutas para registrar un usuario, iniciar sesión y cerrar sesión
- Migraciones y modelos del sistema
- Modelo Buyer heredado de User con un globalScope que solo devuelve usuarios con transacciones
- Modelo Seller heredado de User con un globalScope que solo deuvelve usuarios con productos en venta

### Diagrama de modelos y relaciones

*Nota*: El modelo category no se implementó y algunos campos fueron removidos por simplicidad.

![Modelos y relaciones](https://i.ibb.co/LnP2jx2/Screenshot-2.png "Modelos y relaciones")

## Por hacer

### Endpoints

#### Endpoint para buyers

- [ ] GET /buyers
- [ ] GET /buyers/:id (Mostrar con sus transacciones)

#### Crear endpoints para sellers
- [ ] GET /sellers
- [ ] GET /sellers/:id (Mostrar con sus productos en venta)
- [ ] POST /sellers/product (Crear producto a partir del usuario en autenticado)

#### Crear endpoints para products
*Nota*: Los productos deben tener una propiedad computada `status` que contendrá el valor "In Stock" o "Sold Out" dependiendo del número en su propiedad `quantity`

- [ ] GET /products
    - Con parámetro `show_products_without_stock` para decidir si mostrar también los productos sin stock
- [ ] GET /products/:id
- [ ] POST /products/:id/buy (Vender un producto a partir del usuario autenticado )
    - Crear restricción que no permita crear una transacción si la cantidad productos a comprar supera el número de productos en stock

