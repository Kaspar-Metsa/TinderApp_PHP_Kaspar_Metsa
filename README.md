This is a TTU university project completed by me - a simple version of Tinder(dating website) using only PHP and MySQL.

Please test the web application here: http://dijkstra.cs.ttu.ee/~Kaspar.Metsa/prax4/tinder/index.php
*For testing*: please create account1, add a picture, select male, create account2, add a picture, 
select female - now female and male can see and like each other, if both like each other then they are able to send private messages
between them.

Requirements for the Tinder PHP web app: (all these features are working)
==============
* Appearance requirement: It should look similar to the real Tinder
* User can create his account by choosing his user name, name, password and e-mail (all as text).
* You can log in. You can’t do anything without logging in.
* You can choose whether you are a male or female.
* You can upload a photo of yourself.
* You can write some text description about yourself.
* All users see everyone – photo and text – but they see only 1 user at a time: that user's picture and description and that user can only be from the opposite sex. It also has „like“ and „nope“ buttons. If you press either button, you can see the next user (like real Tinder).
* If two users both click „like“ then they both see that they have liked each other. If either user or both users have clicked „nope“ – then no information is displayed about it to either user.
* If two users have liked each other, then they can send messages to each other through the application: you can write text and the other will see what is written.(if two users haven’t both liked each other then they can’t send messages to each other.)
* You can configure the distance of people from you, whose pictures are displayed and logging into browser saves your current location into database – this location will be same during the session.

Required security features for the Tinder PHP web app: (all these features are working)
==============
* When user enters text into fields, the information is not displayed directly (without cleaning) (preventing javascript injection-XSS)
  * User may not enter text in a way that this text contains html tags like pictures, scripts etc. Use htmlentities function or htmlspecialchars function from here: http://www.w3schools.com/php/php_form_validation.asp
* When user enters a SQL query as text, then it is not used directly(without cleaning) (preventing SQL injection)
  * User may not enter sql queries as text(like drop table etc). Use this function to achieve that: http://www.w3schools.com/php/func_mysqli_real_escape_string.asp

