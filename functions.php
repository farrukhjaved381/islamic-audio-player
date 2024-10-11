<?php
function insertData($conn, $table, $data) {
    // Prepare an SQL statement for insertion
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    // Execute the query and return the result
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
