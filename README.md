# pnp
Simple web app similar to AirBnb.
Built with vanilla HTML/CSS/JS/JQUERY/PHP/LINUX/AWS

Team members: Alana Ceci, Andrea Hyder, Eric Anderson, Kaan Yilmaz

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



Eric




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
