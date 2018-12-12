# pnp
Simple web app similar to AirBnb.
Built with vanilla HTML/CSS/JS/JQUERY/PHP/LINUX/AWS

Access at: http://34.213.205.49/pnp/index.php

Team members: Alana Ceci, Andrea Hyder, Eric Anderson, Kaan Yilmaz


USAGE: Designed for Google Chrome, like any website after sign-in/sign-up you can follow the on page buttons/prompts to navigate the websites features.

DISCLAIMER: We all worked on the code together. If someone needed to edit the database, they did. If someone needed to add a feature on the files someone else was working on, they did. We pair programmed at times and all contributed to the design of the project from the backend to the frontend with everyone touching everything. 

Work breakdown by Team member


Alana
-viewingPage.php
Formatted the viewing page of PnP, displaying the places from DB, filter bar, header and buttons using HTML and CSS. 
-getPlace.php
Pulled from Database with default filter settings (ignoring date) to generate a general query and display the results by echoing HTML and appropriate DB column variables, using PHP and SQL. 
-general.css
Formatted themes, colours, margins, padding, and general syle and resizing of windows using CSS.
-view.css
Formatted spacing of divs, sections and all elements for viewingPage.php. Made adjustments to view based on window size.
-set_rating.php
Used a form and POST to query database to find Place with matching ID so that the user can add its rating to the Rating column in the Places Database, calculated 
-getMyPlaces.php
Wrote HTML form to send rating from user selection (radio buttons) to set_rating.php.


Andrea

I setup the initial look of the web app (html + css) and created the shell of the index page (login/signup). The files that I used/created/edited to do this are the following: 
index.php
index.css
general.css
Most of my work was creating the profile page from start to finish. This required use of html, css, php, javascript and Ajax calls to get the info from the database and then show it to the user on this page. The files I used/created/edited to make this page fully functional are the following: 
profile.php
getMyPlaces.php
getPastBookings.php
getUpcomingBookings.php
profile.css
Two smaller functionalities that I also got working were checking if a username is unique when creating an account (checkUniqueUsername.php), and loging out of the session, i.e. emptying all session variables (log_out.php).


Eric

I setup the AWS config and edited the php.ini config files to enable image uploads. I built the initial sql database files: pnpdb.sql. I did at least 50% of the work on creat_user.php, create_place.php, sign_in_page.php, and getPlace.php. I did 50% or less of the work on viewingPage.php sessions.php. 




Kaan

I built the posting and booking mechanisms this meant designing the Users,Places,and Bookings tables in the database.
I also built the css and html along with the php pages that went along with these (Eric did most of the Images section for these pages). I also did the Ajax calls for these pages as well as for viewingPage.php

worked on the files:
  some general.css
  index.html
  viewingPage.php
  book_place.php
  create_place.php
  book.php
  post.php
  postSuccess.php
  Databases: Places, Users, Booking
