# This repository contains the source code of the web panel I have used in my book series of books: Cyber and Penetration Testing – Web Penetration Testing.

Intro:
---------------

Link to the book: [WILL BE UPDATED ONCE PUBLISHED]

Screenshot:
![alt tag](https://raw.githubusercontent.com/romanzaikin/Owasp-TOP-10-Training-Panel/master/panel.PNG)

If you still want to use this panel and you don't have the book, Here is the steps to to setup the panel:

Tools you will need to Download in order to solve the challenges:
-----------------
1. Burp Suit: https://portswigger.net/burp/communitydownload
2. Sqlmap:	https://github.com/sqlmapproject/sqlmap
3. dirbuster: https://sourceforge.net/projects/dirbuster/
4. python: https://www.python.org/downloads/


Setup:
-----------------
1. Download xampp on your windows computer: https://www.apachefriends.org/download.html
2. Move all the repository files to the folder: C:\xampp\htdocs
3. Start xampp mysql and apache in the xampp software.
4. Open your browser at http://127.0.0.1/phpmyadmin

4.1. Create the database "sqli" 

4.1.1. press on the database "sqli"

4.1.2. press on the import tab

4.1.3. select the following file: C:\xampp\htdocs\challenge\SQLI\sqli.sql

4.1.4. press "Go"

4.2. Create the database "forum" 

4.2.1. press on the database "forum"

4.2.2. press on the import tab

4.2.3. select the following file: C:\xampp\htdocs\forum\forum.sql

4.2.4. press "Go"

5. Open the challenge: http://127.0.0.1/challenge/

Have Fun!