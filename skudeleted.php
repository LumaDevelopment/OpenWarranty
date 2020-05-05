<!DOCTYPE html>
<html>	
    <head>
	  <meta charset='utf-8'>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,maximum-scale=2">
	  <title>OpenWarranty</title>
	  <link rel="icon" href="assets/favicon.ico" type="image/ico" sizes="16x16">
	  <link rel="stylesheet" href="assets/style.css" />
	  
	</head>
	
	<body>
	
	    <div id="header_wrap" class="outer">
		    <header class="inner">
			  <a id = "forkme_banner" href="https://lumadevelopment.net">By Luma Development</a>
			  
			  <a href="index.html"><h1 id="project_title">Loading</h1></a>
			  <h2 id="project_tagline">Page is loading, please wait!</h2>
			  
			</header>
			
			<script src="assets/public_variables.js">
				
			</script>
	    </div>
	
	<div id="main_content_wrap" class="outer">
	    <section id="main_content" class="inner">
		    <h2>SKU Deletion</h2>
			
			<?php
			
			include 'db_variables.php';
			
			function inputfilter($data){
			  $data = trim($data);
		 	  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}

			$sku = inputfilter($_POST["sku"]);

			$conn = new mysqli($sku_host, $sku_username, $sku_password, $sku_dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql_init = "CREATE TABLE IF NOT EXISTS sku_table (
			id INT NOT NULL AUTO_INCREMENT,
			sku LONGTEXT NOT NULL,
			skuname LONGTEXT NOT NULL,
			warranty_duration LONGTEXT NOT NULL,
			skuimglink LONGTEXT,
			PRIMARY KEY ( id ));";

			$sku = $conn->real_escape_string($sku);
			
			$sql = "DELETE FROM sku_table WHERE sku='" . $sku . "';";
			
			if ($conn->query($sql_init) === TRUE) {
				echo "SKU table exists.<br>";
			} else {
				echo "Error creating table: " . $conn->error . "<br>";
			}
			
			if ($conn->query($sql) == TRUE){
				echo "SKU data has been deleted.";
			} else {
				echo "Error inputting data: " . $conn->error . "<br>";
			}
			
			$conn->close();
			
			?>
			
		</section>
	</div>
	
	<div id="footer_wrap" class="outer">
	    <footer class="inner">
		    <p id="copyright" class="copyright">Page is still loading!</p>
			<p class="copyright">Theme "Slate" by GitHub Pages used under CC0 1.0 Universal</p>
			
			<script src="assets/public_variables.js">
			
		    </script>
		</footer>
    </div>		
	</body>
</html>
