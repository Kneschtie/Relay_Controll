<!doctype html>
<html>
<head>
	<style>
	@import url("style.css");
	</style>
<meta charset="utf-8">
	

<title>Relaycontroll</title>
</head>

<body>
	
	<main>
	<h1><strong><em>Welcome to the comandcenter</em></strong></h1>
	<div class="container">
		<article>
		
			<section>
		<p class="bu">
			<p>Power strip back</p>
			
			<?php
				
				exec('gpio -1 mode 12 out  ');
				if (isset ($_POST['newstate1'])){
						$new = $_POST['newstate1'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 12 $new");

						}

					}
					$current = exec('gpio -1 read 12');
					if($current=='0'){
						echo "<p> Power Strip isn't turned on";
						  echo "<p><form action='Hauptseite.php' method = 'post'>
                    <input type='hidden' name = 'newstate1' value='1'>
                    <input type='submit' value='stop led'>
         
                </form>";    

					}
				else{
					echo "<p> The Power Strip is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate1' value='0'>
					<input type='submit' value='stop'>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	
	</article>
	<article>
		
			<section>
		<p class="bu">
			<p>Main Light</p>
			<?php
				exec('gpio -1 mode 16 out  ');
				if (isset ($_POST['newstate2'])){
						$new = $_POST['newstate2'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 16 $new");

						}

					}
					$current = exec('gpio -1 read 16');
					if($current=='0'){
						echo "<p> The main Light isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate2' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> The main Light is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate2' value='0'>
					<input type='submit' value='stop'>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	
	</article>
	<article>
		
			<section>
		<p class="bu">
			<p>RGB LED</p>
			<?php
				exec('gpio -1 mode 18 out  ');
				if (isset ($_POST['newstate3'])){
						$new = $_POST['newstate3'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 18 $new");

						}

					}
					$current = exec('gpio -1 read 18');
					if($current=='0'){
						echo "<p> The RGB Led isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate3' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> The RGB Led is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate3' value='0'>
					<input type='submit' value='stop'>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>
	<article>
		
			<section>
		<p class="bu">
			<p>Power Strip 1&nbsp;</p>
			<?php
				exec('gpio -1 mode 22 out  ');
				if (isset ($_POST['newstate4'])){
						$new = $_POST['newstate4'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 22 $new");

						}

					}
					$current = exec('gpio -1 read 22');
					if($current=='0'){
						echo "<p> The Power Strip 1 isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate4' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> The Power Strip 1 is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate4' value='0'>
					<input type='submit' value='stop'>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>
	<article>
		
		
			<section>
		<p class="bu">
			<p>Power Strip 2</p>
			<?php
				exec('gpio -1 mode 32 out  ');
				if (isset ($_POST['newstate5'])){
						$new = $_POST['newstate5'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 32 $new");

						}

					}
					$current = exec('gpio -1 read 32');
					if($current=='0'){
						echo "<p> The Power Strip 2 isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate5' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> The Power Strip 2 is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate5' value='0'>
					<input type='submit' value='stop'>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>
	<article>
		
		
			<section>
		<p class="bu">
			<p>Relay 6</p>
			<?php
				exec('gpio -1 mode 36 out  ');
				if (isset ($_POST['newstate6'])){
						$new = $_POST['newstate6'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 36 $new");

						}

					}
					$current = exec('gpio -1 read 36');
					if($current=='0'){
						echo "<p> Relay 6 isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate6' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> Relay 6 is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate6' value='0'>
					<input type='submit' value='stop '>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>
<article>
		
		
			<section>
		<p class="bu">
			<p>Relay 7</p>
			<?php
				exec('gpio -1 mode 38 out  ');
				if (isset ($_POST['newstate7'])){
						$new = $_POST['newstate7'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 38 $new");

						}

					}
					$current = exec('gpio -1 read 38');
					if($current=='0'){
						echo "<p> Relay 7 isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate7' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> Relay 7 is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate7' value='0'>
					<input type='submit' value='stop '>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>
<article>
		
		
			<section>
		<p class="bu">
			<p>Relay 8</p>
			<?php
				exec('gpio -1 mode 40 out  ');
				if (isset ($_POST['newstate8'])){
						$new = $_POST['newstate8'];
						if($new == '0' || $new=='1'){
							exec("gpio -1 write 40 $new");

						}

					}
					$current = exec('gpio -1 read 40');
					if($current=='0'){
						echo "<p> Relay 8 isn't turned on";
						echo"<p><form action='Hauptseite.php' method='post'>
						<input type='hidden' name='newstate8' value = '1'>
					<input type='submit' value ='start'>        
					</form>";       

					}
				else{
					echo "<p> Relay 8 is turned on";
					echo "<p><form action='Hauptseite.php' method = 'post'>
					<input type='hidden' name = 'newstate8' value='0'>
					<input type='submit' value='stop '>
         
                </form>";

				}
			?>
		
		</p>
	</section>
	</article>

</div>
	</main>
		
	
	</p>
	
	
<!-- <img src="../../../../Noice👌.png" width="1600" height="1200" alt=""/> -->
</body>
</html>