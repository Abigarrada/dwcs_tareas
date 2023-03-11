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
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO clientes (nombre, apellidos, edad, email, telefono) VALUES (:nombre, :apellidos, :edad, :email, :telefono)";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':edad', $edad);
    $query->bindParam(':email', $email);
    $query->bindParam(':telefono', $telefono);

    $query->execute();

    Flight::json(["O cliente foi engadido correctamente á base de datos."]);
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
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    $id = Flight::request()->data->id;

    $sql = "UPDATE clientes SET appelidos=:appelidos, edad=:edad, email=:email, telefono=:telefono WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':edad', $edad);
    $query->bindParam(':email', $email);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["Os datos do cliente foron modificados correctamente na base de datos."]);
});

/* Tabla Hoteles

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/hoteles```: 

- GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles. 
    Optativo. Mostrar la información de un único hotel a través del id.  
- POST: Se debe poder insertar un hotel en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un hotel.
- PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
*/

Flight::route('GET /hoteles', function () {
    $query = Flight::db()->prepare("SELECT * from hoteles");
    $query->execute();
    $data = $query->fetchAll();
    Flight::json($data);
});


Flight::route('POST /hoteles', function () {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;


    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email) VALUES (:hotel, :direccion, :telefono, :email)";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':hotel', $hotel);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':email', $email);

    $query->execute();

    Flight::json(["O hotel foi engadido correctamente á base de datos."]);
});

Flight::route('DELETE /hoteles', function () {
    $id = Flight::request()->data->id;

    $sql = "DELETE FROM hoteles WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["O hotel foi eliminado correctamente da base de datos."]);
});

Flight::route('PUT /hoteles', function () {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;
    $id = Flight::request()->data->id;

    $sql = "UPDATE hoteles SET hotel=:hotel, direccion=:direccion, telefono=:telefono, email=:email WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':hotel', $hotel);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':email', $email);
    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["Os datos do hotel foron modificados correctamente na base de datos."]);
});

/* Tabla Reserva

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/reservas```. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas. 

- GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
    Optativo. Mostrar la información de un única reserva a través del id.  
- POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
- DELETE: Dado un id se debe poder eliminar una reserva.
- PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
 */

Flight::route('GET /reservas', function () {
    $query = Flight::db()->prepare("SELECT * from reservas");
    $query->execute();
    $data = $query->fetchAll();
    Flight::json($data);
});


Flight::route('POST /reservas', function () {
    $fecha_reserva = Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;


    $sql = "INSERT INTO reservas (fecha_reserva, fecha_entrada, fecha_salida) VALUES (:fecha_reserva, :fecha_entrada, :fecha_salida)";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':fecha_reserva', $fecha_reserva);
    $query->bindParam(':fecha_entrada', $fecha_entrada);
    $query->bindParam(':fecha_salida', $fecha_salida);

    $query->execute();

    Flight::json(["A reserva foi engadida correctamente á base de datos."]);
});

Flight::route('DELETE /reservas', function () {
    $id = Flight::request()->data->id;

    $sql = "DELETE FROM reservas WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["A reserva foi eliminada correctamente da base de datos."]);
});

Flight::route('PUT /reservas', function () {
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;
    $id = Flight::request()->data->id;

    $sql = "UPDATE reservas SET fecha_entrada=:fecha_entrada, fecha_salida=:fecha_salida WHERE id=:id";
    $query = Flight::db()->prepare($sql);

    $query->bindParam(':fecha_entrada', $fecha_entrada);
    $query->bindParam(':fecha_salida', $fecha_salida);
    $query->bindParam(':id', $id);

    $query->execute();

    Flight::json(["As datas da reserva foron modificados correctamente na base de datos."]);
});

Flight::start();
