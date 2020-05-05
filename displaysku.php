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
	
	<style>

	.blueproductborder {
	  border: 3px solid #2196F3;
	  border-radius: 10px;
	  padding: 10px 10px 10px 10px;
	  overflow: auto;
	}

	.right {
	  float: left;
	}
	</style>

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
		    <h2>Display SKU</h2>

		    <?php
			include 'db_variables.php';
			
			function filtertext($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}

			$sku_id = $_GET["sku_id"];

			$conn = new mysqli($sku_host, $sku_username, $sku_password, $sku_dbname);
			
			if($conn->connect_error) {
				echo("Connection failed: " . $conn->connect_error);
			}

			$sku_id = $conn->real_escape_string($sku_id);
			
			$sql = "SELECT * FROM sku_table WHERE id='" . $sku_id . "'";

			$result = $conn->query($sql);

			if($result->num_rows < 1){
				echo "<p>No items found for this SKU</p>";
			} else if($result->num_rows > 1){
				echo "<p>Too many entries for one  SKU!</p>";
			} else {
				while($row = $result->fetch_assoc()){
					echo "<p class='blueproductborder'><img class='right' src='" . $row["skuimglink"] . "' style='margin-right:15px;'>Product Name: " . $row["skuname"] . "<br> SKU: " . $row["sku"] . "<br> Warranty Duration: " . $row["warranty_duration"] . "<br></p><br>";
				}
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
