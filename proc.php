<html>
  <head>
    
    <title>Einsturzende Neubauten Album Search</title>
    <style type="text/css">
			body {
					background-color: black; 
					color: white; 
					text-align: center;
					font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; 
					font-size: 18px;
			}
			table, th {
					margin-top: 25px;
					margin-bottom: 25px;
					text-align: left;
					padding: 15px;
			}
			td {
					padding: 15px;
			}
			#buttonpad {
					margin: 40px;
			}
			th {
					text-align: left;
			}
    </style>
    
    <link rel="stylesheet" type="text/css" href="mystyle.css">

		<script type = "text/javascript">

		    // function from https://www.w3schools.com/howto/howto_js_sort_table.asp

		    function sortTable(n) {
					var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
					table = document.getElementById("myTable");
					switching = true;
					dir = "asc"; 
					
					while (switching) {
						switching = false;
						rows = table.rows;
						
						for (i = 1; i < (rows.length - 1); i++) {
							shouldSwitch = false;
							
							x = rows[i].getElementsByTagName("TD")[n];
							y = rows[i + 1].getElementsByTagName("TD")[n];
							
							if (dir == "asc") {
								if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
									shouldSwitch = true;
									break;
								} // end if
							} else if (dir == "desc") {
								if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
									shouldSwitch = true;
									break;
								} // end else if
							} // end for
						} // end while
						if (shouldSwitch) {
							
							rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
							switching = true;
							switchcount ++; 
						} else {
							
							if (switchcount == 0 && dir == "asc") {
								dir = "desc";
								switching = true;
							} // end if
						} // end else
					} // end while
				} // end function 

		</script>
  </head>



	<body>

	  <?php

	  	if(isset($_POST['searchName'])) {
	  	$name = $_POST['searchName'];
	  	}
	  	
	  	if(isset($_POST['searchYear'])) {
	  	$year = $_POST['searchYear'];
	  	}
	  	
	  	if(isset($_POST['searchLabel'])) {
	  	$label = $_POST['searchLabel'];
	  	}
	  	$searchAll = false;
	  	if(isset($_POST['searchAll'])) {
	  	$searchAll = true;
	  	}
	  	$showAll = false;
	  	if(isset($_POST['showAll'])) {
	  	$showAll = true;
	  	}
	  	
			$connect = mysqli_connect('cs1.ucc.ie','jl25','eedah','mscim2019_jl25');

		  if ($connect) {
	
	      if ($searchAll) {


		      if ($name && $year && $label) { 
					$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE name LIKE '%$name%' or year LIKE '%$year%' or label LIKE '%$label%' ");

						if ($result) {
						print ('<table align="center" id="myTable">
										<tr>
										<th>Number</th>
										<th>Name</th>
										<th>Year</th>
										<th>Time</th>
										<th>Label</th>
										</tr>');
					
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');	
							}	// end while							  
						} // end if result
						print ('</table>');					
			  	} //end if name year label 
		    
		 

					else if ($name && $year) { 
					$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE name LIKE '%$name%' or year LIKE '%$year%'");

						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<th>Number</th>
											<th>Name</th>
											<th>Year</th>
											<th>Time</th>
											<th>Label</th>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
							print ('</table>');					
						} // end if result 
					} // end else if name year
			
		    
				
					else if ($name && $label) { 
					$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE name LIKE '%$name%' or label LIKE '%$label%'");


						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<th>Number</th>
											<th>Name</th>
											<th>Year</th>
											<th>Time</th>
											<th>Label</th>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
							print ('</table>');					
						} // end if result  		
					} // end if name label
									

			
					else if ($year && $label) { 
						$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE name LIKE '%$year%' or label LIKE '%$label%'");


						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<td>Number</td>
											<td>Name</td>
											<td>Year</td>
											<td>Time</td>
											<td>Label</td>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
						print ('</table>');					
						} // end if result   
					} // end if year label
									

			
					else if ($year) { 
						$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE year LIKE '%$year%'");

						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<th>Number</th>
											<th>Name</th>
											<th>Year</th>
											<th>Time</th>
											<th>Label</th>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
							print ('</table>');					
						} // end if result 
					} // end else if year
								


					else if ($name) { 
						$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE name LIKE '%$name%'");


						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<th>Number</th>
											<th>Name</th>
											<th>Year</th>
											<th>Time</th>
											<th>Label</th>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
							print ('</table>');					
						} // end if result
					} // end else if name



					else if ($label) { 
						$result = mysqli_query($connect, "SELECT * FROM en_albums WHERE label LIKE '%$label%'");

						if ($result) {
							print ('<table align="center" id="myTable">
											<tr>
											<th>Number</th>
											<th>Name</th>
											<th>Year</th>
											<th>Time</th>
											<th>Label</th>
											</tr>');
				
							while ($result_row = mysqli_fetch_row($result)) {
								print ('<tr>
												<td>'    . $result_row[0] . '</td>
												<td>'    . $result_row[1] . '</td>
												<td>'    . $result_row[2] . '</td>
												<td>'    . $result_row[3] . '</td>
												<td>'    . $result_row[4] . '</td>
												</tr>');					  
							} // end while
							print ('</table>');					
						} // end if result   
					} // end else if label


				} // end if search all
			
				
				
				else {
					$result = mysqli_query($connect, "SELECT * FROM en_albums");

					if ($result) {
						print ('<table align="center" id="myTable">
										<tr>
										<th>Number</th>
										<th>Name</th>
										<th>Year</th>
										<th>Time</th>
										<th>Label</th>
										</tr>');

						while ($result_row = mysqli_fetch_row($result)) {
							print ('<tr>
											<td>'    . $result_row[0] . '</td>
											<td>'    . $result_row[1] . '</td>
											<td>'    . $result_row[2] . '</td>
											<td>'    . $result_row[3] . '</td>
											<td>'    . $result_row[4] . '</td>
											</tr>');					  
						} // end while
						print ('</table>');					
					} // end if result
				} // end else result


			} // end if connect

			else {
			  print ("<p>Could not connect to mysql</p>");
			} // end else no connect

    ?>
  
    <button onclick="sortTable(1)">Order By Name</button>
    <button onclick="sortTable(2)">Order By Year</button>
    <button onclick="sortTable(4)">Order By Label</button>    
    

    <br>
    <button id="buttonPad" onclick="location.href='index.html'" type="button">Return To Search</button>
    
    
  </body>
</html>





