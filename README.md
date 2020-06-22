# Processing of XML and JSON stream datas 
This module helps to extract datas from XML or JSON file

## Project's Goal:
-Creation of a module allowing to request, parse an XML and JSON flow. 
-Create an interface allowing to visualize the result of the request.
This module is useful for searching dataML and JSON database with litle step.

## Project on Windows:
### Installation of composer:
Go to getcomposer.org and install the latest version of composer and install it.
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
### Clone Project from git repository
```shell
username@computername:~$ git clone https://github.com/jmkd0/Internship.git
username@computername:~/Internships$ composer install
username@computername:~/Internships$ symfony server:start
```

## Execution:
Paste the following url in the browser: http://localhost:8000/flux and 
### Example 1
-Type in the search bar
```shell
http://brandalley-frontapi-preview-frfr.sparkow.net/C-1812507-robes/NW-129-univers~femme
```
### Example 2
-Type in the search bar

```shell
C-1812507-robes/NW-129-univers~femme
```
### Example 3
-Type in the search bar

```shell
https://www.brandalley.fr/C-1812514-vestes/NW-129-univers~femme
```
## [Click here to find a quick Demo](https://jmkd.fr/jmkd/internship_demo.mp4)
