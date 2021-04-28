# Relay_Controll

This repisitory will support Raspberry Pi 3B+ and Raspberry Pi 4B The other Pi's i didn't tested, they probably also work. I also a windows pc, so it can diver 


## Setting up your Raspberry Pi:

### Installing the raspberry pi image

![Raspberry Pi Imager](https://www.raspberrypi.org/homepage-9df4b/static/md-82e922d180736055661b2b9df176700c.png)

If you know how to install a raspberry pi image you can skip this step.
At first go to the Raspberry Pi Website and download the Raspberry Pi Imager: https://www.raspberrypi.org/software/ 
Now start the raspberry Pi Imager and select the Operating System you want to have for your Raspberry Pi. In our case we will use _Raspberry Pi OS (32Bit)_. After you have selected the right Operating System you have to select the boot device, the raspberry pi should boot of. In most cases you normally just use a standart micro sd card that has at least 8GB of storage. Then you have to click onto write and wait a little while

#### Setting up SSH
To connect to the raspberry Pi without using a screen we have to set up SSH. This step is pretty easy. You just have to create a file with the name _ssh_ without a ending and drag it into the sd card.

![image](https://user-images.githubusercontent.com/72698237/114294381-8ca3fe00-9a9e-11eb-86fd-7b99838075cc.png)

If the Sd card doesn't show in your Explorer, eject it and put it back in.

After adding the file SSH to the micro sd card you can insert the sd card into the Raspberry Pi connect a LAN cabel and boot it up.

#### Connect to the raspberry Pi using the IP address

start cmd and type in _ssh pi@(Ip Address of your pi)_ press enter

      ssh pi@(Ip Address of your pi)      
when you connect first to the Raspberry Pi you have to agree that you want to connect to the Pi. Write yes and then press enter.
then you have to type in the password, the standart password is _raspberry_ press enter.
At first i recommend changing the password

#### Changing the password
write _passwd_ to change the password. At first you have to write the old password and after pressing enter you can Type in the password you like. 

      passwd
      
It doesn't show you the letters or little stars of your password.

Nice now we have setted up the raspberry Pi successfully. Congratulations!!



### Installing apache2
You can copy paste the code down below. To insert it into CMD you have to press the right Mouse Button.

      sudo apt-get update           
      sudo apt-get upgrade
      sudo apt install apache2
      
Now you have successfully installed the apache Server.

#### The following comands will start or stop the webserver

      sudo systemctl start apache2
      
or 

      sudo systemctl stop apache2
            
##### normally the webserver starts after every reboot. You can disable and enable it 

disable:

      sudo systemctl disable apache2
      
enable:

      sudo systemvtl enable apache2
      
#### when you change something you have to reload apache 2

      sudo systemctl reload apache2
      
#### Testing if the webserver works
use your favourite web Browser and type the ip address of your raspberry pi into the addressline

you can also type in _http://localhost_

      
## Now it's time to configure the webserver

### Setting up a password for your local Website


      sudo mkdir /var/www-private
      sudo chgrp pi.www-data /var/www-private/
      sudo chmode 2750 /var/www-private/
     
setting up the password

      cd /var/www-private
      htpasswd passwords.pwd "The name of the user you want to add"
 

now it asks you to write the password for the new user. 
you can add as much users as you want, the only thing is of course to use another username, otherwise it wouldn't work

### Adding Code
#### Adding a folder for the code
We will add a folder named mycode which will be the folder for the webpages.

      sudo mkdir /var/www/mycode
      sudo chown pi.www-data /var/www/mycode
      sudo chmod 2750 /var/www/mycode
      cd /var/www/mycode/
      
#### Adding the scripts into the folder

      cd /var/www/mycode/
      sudo nano Hauptseite.php
      
copy and paste the code down below

```php

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
	
	
     
      </body>
      </html>
     
     
 ```
         
 then after you have insertet it press _ctrl + x_ and Before exiting, nano will ask you if you wish to save the file press _y_ to safe it and then press enter
 
 now we have to add the stylesheet
 	      
	cd /var/www/mycode/
 	sudo nano style.css
  
```css
@charset "utf-8";

/* CSS Document */

p.bu{color: red;
		text-align: center;
			
}
main {
	text-align: center;
}
h1{
	
	text-align: center;
	font-family: "alfa-slab-one , bold";
	color: #F72585;
	margin-top: 40px;
	
}
body {
	background-color:#4361EE;
	clear: both;
	
	align-self: center;
	margin: auto;
	border: 10px;
}
input{
	text-decoration-color: aqua;
}

article{
	
	border: solid thick #560BAD;
	float: left;
	height: auto;
	width: inherit;
	padding: 40px;
	margin: 30px;
	background: #4895EF;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
	
	
	
	
}
form{
	margin: auto;
	
}
/* Add this as a property for a selector to which the effect has to be applied*/

```
 then after you have insertet it press _ctrl + x_ and Before exiting, nano will ask you if you wish to save the file press _y_ to safe it and then press enter
 
#### Now we change the config file
	
	cd /etc/apache2/sites-available(
	sudo nano 000-default.conf
	
there you have to insert the following, but first delete everything in this file. (You just need to press _del_ for some time


```
	<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/mycode/comandcenter
        <Directory "/var/www/mycode/comandcenter">
                DirectoryIndex Hauptseite.php
                AuthType Basic
                AuthUserFile /var/www-private/passwords.pwd
                AuthName "admin"
                Require valid-user
        </Directory>

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
	</VirtualHost>

	# vim: syntax=apache ts=4 sw=4 sts=4 sr noet

```
then after you have insertet it press _ctrl + x_ and Before exiting, nano will ask you if you wish to save the file press _y_ to safe it and then press enter

and the last thing you need to do is to reload Apache2

	sudo systemctl reload apache2
	
# Wiring Pi

When you use a Raspberry Pi 4 B, you maybe have to update Wiring pi. Wiring pi is a programm that allows you to access the Gpio pins. The link to their Website: http://wiringpi.com/wiringpi-updated-to-2-52-for-the-raspberry-pi-4b/

	cd /tmp
	wget https://project-downloads.drogon.net/wiringpi-latest.deb
	sudo dpkg -i wiringpi-latest.deb
	

# How to wire

In this sketch you can see the raspberry Pi and a breadboard. The breadboard is just a replacement for the Relay Board with 8 Relays.
![image](https://user-images.githubusercontent.com/72698237/116434844-10097180-a84b-11eb-8cfc-2d1d91a74272.png)


# If you want to support me, please subscribe to my Youtube Channel

https://www.youtube.com/channel/UCUKGpRmZLFh_AmThMi59b7w
