# XML and JSON data flow processing to extract and visualize MerchandisingActions on Brandalley France E-commerce Website
This module helps to extract datas from XML or JSON file

## Project's Goal:
-Creation of a module allowing to request, parse XML and JSON data flow. 
-Create an interface to access easily MerchandisingActions in website Page via XML or JSON database.
This module is useful for searching data from XML and JSON database with litle step.

## Project on MacOS
### Install php 
```shell
curl -s http://php-osx.liip.ch/install.sh | bash -s 7.4
```
### Update php to 7.4
```shell
brew install php@7.4
```
### Install composer
```shell
>curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
```

### Install Symfony
```shell
 curl -sS https://get.symfony.com/cli/installer | bash
 ```


## Project on Windows:
### Installation of composer:
Go to [Composer Installation](https://getcomposer.org/) and install the latest version of composer and install it.
Begin the installation, 
-Do not check developer mode
-Browse the path of php.exe; for example C:\XAMP\php\php.exe if php is installed in XAMP
-Leave set proxy url
-Click on install at the end.
When the installation is finished click on next and finish.
### Clone Project from git repository
```shell
repo/repo1> git clone https://github.com/jmkd0/Internship.git
repo/repo1/Internships> composer install
repo/repo1/Internships> symfony server:start
```
## Project on Ubuntu Debian:
### Install PHP 7.4.3
```shell
username@computername:~$ sudo apt install php7.4
```
### Install Composer:
```shell
username@computername:~$ sudo apt install composer
```
If xml dependencie error: 
```shell
username@computername:~$ sudo apt-get install php7.4-xml
```
### Install Symfony:
```shell
sudo wget https://get.symfony.com/cli/installer -O - | bash
Add Symfony to the Shell:
export PATH="$HOME/.symfony/bin:$PATH"
mv /home/komlan/.symfony/bin/symfony /usr/local/bin/symfony
```

### Clone Project from git repository
```shell
username@computername:~$ git clone https://github.com/jmkd0/Internship.git
username@computername:~/Internships$ composer install
username@computername:~/Internships$ symfony server:start
```

## Execution:
Go to the following url in the browser: http://localhost:8000/flux.
The following url are valid:
### Example 1: xml file
-Type in the search bar
```shell
http://brandalley-frontapi-preview-frfr.sparkow.net/C-1812507-robes/NW-129-univers~femme
```
### Example 2: Json file
-Type in the search bar
```shell
http://brandalley-frontapi-preview-frfr.sparkow.net/json/C-1812507-robes/NW-129-univers~femme
```
### Example 3: 
-Type in the search bar

```shell
C-1812507-robes/NW-129-univers~femme
```
### Example 4:
-Type in the search bar

```shell
https://www.brandalley.fr/C-1812514-vestes/NW-129-univers~femme
```
## [View Demo](https://jmkd.fr/projects_demos/internship.mp4)
