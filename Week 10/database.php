<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $port = 3306;
    $dbName = "myDB";

    // Create connection
    $conn = mysqli_connect("$servername", $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error());
    }
    echo "<p>Connected successfully</p>";

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
    if (mysqli_query($conn, $sql)) {
    echo "<p>Database created successfully</p>";
    } else {
    echo "Error creating database: " . mysqli_error($conn);
    }

    // $sql = "DROP TABLE IF EXISTS student";
    // if ($conn->query($sql) === TRUE) {
    //     echo "<p>Table student dropped successfully</p>";
    // }

    $sql = "CREATE TABLE student(
                firstName VARCHAR(100),
                lastName VARCHAR(100),
                studentID VARCHAR(10),
                school VARCHAR(100),
                enrolled YEAR
            )";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Table student created successfully</p>";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // $sql = "INSERT INTO student VALUES('Robert', 'Bloggs', 's3457535', 'CSIT', 2015);";
    // $sql .= "INSERT INTO student VALUES('Jane', 'Doe', 's8645753', 'Physics', 2013);";
    // $sql .= "INSERT INTO student VALUES('Fred', 'Simms', 's3543574', 'CSIT', 2014);";

    // if (mysqli_multi_query($conn, $sql)) {
    //     echo "<p>New record created successfully</p>";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    // sql to delete a record
    $sql = "DELETE FROM student WHERE firstName='Fred'";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Record deleted successfully</p>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $sql = "UPDATE student SET lastname='Joe' WHERE firstName ='Jane' ";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Record updated successfully</p>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo $row["firstName"]. " | " . $row["lastName"]. 
          " | " . $row["studentID"]. " | " . $row["school"]. 
          " | " .  $row["enrolled"]. " | " . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
?>