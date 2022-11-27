<?php
$servername = "db";
$username = "root";
$password = "test";

try {
    //1. Conexión a base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=donacion", $username, $password);
    //2. Forzar excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexión correcta";

    //3. Crear base de datos
    $sql = "CREATE DATABASE donacion IF NOT EXISTS;";
    // Crear tabla donantes
    $sql = "CREATE TABLE donantes IF NOT EXISTS(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        grupoSanguineo ENUM('O-','O+','A-','A+','B-','B+','AB-','AB+') NOT NULL, 
        codigoPostal INT(5) NOT NULL,
        telefonoMovil INT(9) NOT NULL
        );";
    // Crear tabla histórico
    $sql = "CREATE TABLE historico IF NOT EXISTS(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        fechaDonacion DATETIME NOT NULL,
        fechaProximaDonacion DATETIME NOT NULL,
        idDonante INT FOREIGN KEY REFERENCES donacion(id)
        );";
    // Crear tabla administradores 
    $sql = "CREATE TABLE administradores IF NOT EXISTS(
        nombreUsuario VARCHAR(50) NOT NULL PRIMARY KEY,
        contraseña VARCHAR(200) NOT NULL
        );";
    $conPDO->exec($sql);
    echo "La tabla fue creada correctamente";
} catch (PDOException $e) {
    //$conPDO->rollback();
    echo "Fallo en conexión: " . $e->getMessage();
}

//4. Cierre de conexión
$conPDO = null;
