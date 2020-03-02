<?php

	// Database information
	$user = "catalystuser";
	$password = "Catalyst2020%";
	$server = "localhost";
	$database = "catalyst";

	// create the connection with mysql_connect()
	$connect = mysqli_connect( $server, $user, $password ) or die ("Error. No connection to the database server");

	// select the database
	$db = mysqli_select_db( $connect, $database ) or die ( "Error. Database connection." );


	// establecer y realizar consulta. guardamos en variable.
		$querty = "SELECT * FROM users";
		$result = mysqli_query( $connect, $querty ) or die ( "Error. Query error.");

		// Show users
			echo "<table borde='2'>";
			echo "<tr>";
			echo "<th>name</th>";
			echo "<th>surname</th>";
			echo "<th>email</th>";
			echo "</tr>";

			// while there are records in the users table
			while ($colum = mysqli_fetch_array( $result ))
			{
				echo "<tr>";
				echo "<td>" . $colum['name'] . "</td><td>" . $colum['surname'] . "</td><td>" . $colum['email'] . "</td>";
				echo "</tr>";
			}

			echo "</table>"; // Fin de la tabla

  // cerrar conexión de base de datos
  mysqli_close( $connect );
?>
