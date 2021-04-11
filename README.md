# Relay_Controll

This repisitory will support Raspberry Pi 3B+ and Raspberry Pi 4B


## Setting up your Raspberry Pi:

### Installing the raspberry pi image

![Raspberry Pi Imager](https://www.raspberrypi.org/homepage-9df4b/static/md-82e922d180736055661b2b9df176700c.png)

If you know how to install a raspberry pi image you can skip this step.
At first go to the Raspberry Pi Website and download the Raspberry Pi Imager: https://www.raspberrypi.org/software/ 
Now start the raspberry Pi Imager and select the Operating System you want to have for your Raspberry Pi. In our case we will use _Raspberry Pi OS (32Bit)_. After you have selected the right Operating System you have to select the boot device, the raspberry pi should boot of. In most cases you normally just use a standart micro sd card that has at least 8GB of storage. Then you have to click onto write and wait a little while

### Setting up SSH
To connect to the raspberry Pi without using a screen we have to set up SSH. This step is pretty easy. You just have to create a file with the name _ssh_ without a ending and drag it into the sd card.
![image](https://user-images.githubusercontent.com/72698237/114294381-8ca3fe00-9a9e-11eb-86fd-7b99838075cc.png)
If the Sd card doesn't show in your Explorer, eject it and put it back in.
