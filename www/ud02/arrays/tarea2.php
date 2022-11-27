<?php

/*
John
email: john@demo.com
website: www.john.com
age: 22
password: pass
Anna
email: anna@demo.com
website: www.anna.com
age: 24
password: pass
Peter
email: peter@mail.com
website: www.peter.com
age: 42
password: pass
Max
email: max@mail.com
website: www.max.com
age: 33
password: pass
*/

$datos = [
    "John" => array(
        "email" => "john@demo.com",
        "website" => "www.john.com",
        "age" => 22,
        "password" => "pass"
    ),
    "Anna" => array(
        "email" => "anna@demo.com",
        "website" => "www.anna.com",
        "age" => 24,
        "password" => "pass"
    ),
    "Peter" => array(
        "email" => "peter@mail.com",
        "website" => "www.peter.com",
        "age" => 42,
        "password" => "pass"
    ),
    "Max" => array(
        "email" => "max@mail.com",
        "website" => "www.max.com",
        "age" => 33,
        "password" => "pass"
    )
];

foreach ($datos as $key => $value) {
    echo $key . " => " . $value;
    foreach ($variable as $key => $value) {
        echo $key . " => " . $value;
    }
}
