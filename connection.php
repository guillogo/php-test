<?php

	// Database information
	$dbuser = "root";
	$dbpassword = "";
	$server = "localhost";
	$user = "catalystuserv9";
	$password = "Catalyst2020%";
	$database = "catalystv9";

  // Creating a connection
  $conn = new mysqli($server, $dbuser, $dbpassword);
  // Check connection
  if ($conn->connect_error) {
      die("Error. Connection failed: " . $conn->connect_error);
  }
  // Creating a database named catalystv4
  $sql = "CREATE DATABASE ".$database." DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
  if ($conn->query($sql) === TRUE) {
      echo "Database created successfully with the name catalistv4 <br>";
  } else {
      echo "Error. Error creating database: " . $conn->error;
  }



  // Creating a user named catalystuserv4
  $sql = "create user '".$user."'@'localhost' IDENTIFIED BY '".$password."';";
  if ($conn->query($sql) === TRUE) {
      echo "Database user created successfully with the name catalystuserv4 <br>";
  } else {
      echo "Error. Error creating database user: " . $conn->error;
  }

  // Grant access to user
  $sql = "GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,CREATE TEMPORARY TABLES,DROP,INDEX,ALTER ON ".$database.".* TO ".$user."@localhost IDENTIFIED BY '".$password."';";
  if ($conn->query($sql) === TRUE) {
      echo "Grant successfully with the name catalystuserv4 <br>";
  } else {
      echo "Error. Error grant user: " . $conn->error;
  }

  // Use database catalystuserv4
  $sql = "use ".$database.";";
  if ($conn->query($sql) === TRUE) {
      echo "Using database catalystuserv4 <br>";
  } else {
      echo "Error. Error using database: " . $conn->error;
  }

  // Create table users
  $sql = "CREATE TABLE if not exists users (
  name VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL PRIMARY KEY
  )";

  if ($conn->query($sql) === TRUE) {
      echo "Table users created successfully<br>";
  } else {
      echo "Error creating table: " . $conn->error;
  }
  // insert users (testing)
  $sql = "insert into users values ('Naty','Mena','nmena06@gmail.com');";

  if ($conn->query($sql) === TRUE) {
      echo "Test user inserted successfully<br>";
  } else {
      echo "Error inserting user: " . $conn->error;
  }

  // select users
  $sql = "SELECT name, surname, email FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "Name: " . $row["name"]. " - Surname: " . $row["surname"]. " - Email: " . $row["email"]. "<br>";
      }
  } else {
      echo "0 results";
  }


  // Close connection
  $conn->close();
?>
