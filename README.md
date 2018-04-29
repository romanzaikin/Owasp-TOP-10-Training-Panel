This repository contains the source code of the web panel I have used in my book series of books: Cyber and Penetration Testing – Web Penetration Testing.

Link to the book: <!-- WILL BE UPDATED ONCE PUBLISHED !-->

If you still want to use this panel and you don't have the book the setup steps are as following:

-----------------
Tools you will need to Download in order to solve the challenges:
-----------------
1. Burp Suit: https://portswigger.net/burp/communitydownload
2. Sqlmap:	https://github.com/sqlmapproject/sqlmap
3. dirbuster: https://sourceforge.net/projects/dirbuster/
4. python: https://www.python.org/downloads/

-----------------
Setup:
-----------------
1. Download xampp on your windows computer: https://www.apachefriends.org/download.html
2. Move all the repository files to the folder: C:\xampp\htdocs
3. Start xampp mysql and apache in the xampp software.
4. Open your browser at htpp://127.0.0.1/phpmyadmin
4.1. Press on the import tab
4.1.1: import the SQL files:
4.1.1.1: C:\xampp\htdocs\challenge\SQLI\sqli.sql
4.1.1.2: C:\xampp\htdocs\forum\forum.sql
4.1.2: press on go

5. Open the challenge: http://127.0.0.1/challenge/

Have Fun!