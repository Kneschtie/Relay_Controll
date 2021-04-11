# Relay_Controll

This repisitory will support Raspberry Pi 3B+ and Raspberry Pi 4B The other Pi's i didn't tested, they probably also work.


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

      sudo nano Hauptseite.php
      
copy and paste the code down below
      
         

      
  
      
   


      


