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
		    <h2>List SKUs</h2>

		    <?php
			include 'db_variables.php';
			
			$conn = new mysqli($sku_host, $sku_username, $sku_password, $sku_dbname);
			
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT id, sku FROM sku_table";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<a href='displaysku.php?sku_id=" . $row["id"] . "'>SKU #" . $row["id"]. " - " . $row["sku"]. "</a><br>";
				}
			} else {
			    echo "<p>0 results</p>";
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
