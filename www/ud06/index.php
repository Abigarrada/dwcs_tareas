<?php
require 'flight/Flight.php';

Flight::route('/', function () {
    echo 'hello world!';
});

/*  Tabla Clientes
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/clientes```: 
- GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes. 
    Optativo. Mostrar la información de un único cliente a través del id.  
- POST: Se debe poder insertar un cliente en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un cliente.
- PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono. 
*/

//Defimimos la ruta que vamos a utilizar y la función que vamos a invocar 

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas', 'root', 'test'));

Flight::route('GET /clientes', function () {
    $query = Flight::db()->prepare("SELECT * from clientes");
    $query->execute();
    $data = $query->fetchAll();
    Flight::json($data);
});


Flight::route('POST /clientes', function () {
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;

    $sql = "INSERT INTO clientes (nombre, apellidos, email) VALUES (:nombre, :apellidos, :email)";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':email', $email);

    $query->execute();

    Flight::json(["O cliente foi agregado correctamente á base de datos."]);
});

Flight::route('DELETE /clientes', function () {
    $id = Flight::request()->data->id;

    $sql = "DELETE FROM clientes WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["O cliente foi eliminado correctamente da base de datos."]);
});

Flight::route('PUT /clientes', function () {
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $id = Flight::request()->data->id;

    $sql = "UPDATE clientes SET nombre=:nombre, appelidos=:appelidos, email=:email WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':email', $email);
    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["Os datos do cliente foron modificados correctamente na base de datos."]);
});

Flight::start();

/* Tabla Hoteles

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/hoteles```: 

- GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. 
    Optativo. Mostrar la información de un único hotel a través del id.  
- POST: Se debe poder insertar un hotel en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un hotel.
- PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
*/
/* Tabla Reserva

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/reservas```. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas. 

- GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
    Optativo. Mostrar la información de un única reserva a través del id.  
- POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
- DELETE: Dado un id se debe poder eliminar una reserva.
- PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
 */
