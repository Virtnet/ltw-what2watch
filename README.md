# LTW - Progetto WHAT2WATCH
**Are you bored?** you would like to watch some movie? but you don't know which one?
No problem!
**WHAT2WATCH** works in way that every page refresh it will show you various of new suggestions depending on the movie genre selected.

------------
### Which technologies used to develop this website?
- Bootstrap 4.5 - The main source of design.
- JavaScript - for the input control ***(addtrailer.js)***
- JQuery - For AJAX requests , manipulation on the website logo and localStorage to save selected movie genre . ***(alljs.js)***
- AJAX - Used for asynchronous requests which allows us to receive data as response without refreshing the page,so it is invisible to the visitor.
Used for the following functions: 
	- Movie details that shown up on the Bootstrap modal ***(trailerinfo.php)***
	- Sorting by genre ***(sort.php)***
	- Updating movie details inside Admin Panel ***(updateinfo.php)***
- PHP - As a side server language
- PostgreSQL - which is database system that extends the SQL language.
- And of course HTML5 and CSS.

-------------------------------------------------------------------
**Login Info** - Email: arthurgusein@gmail.com , Password: sapienza
-------------------------------------------------------------------

### Features:
- Login system only for admin
- Admin control panel
	- Add new trailer
	- Edit trailer
	- Remove trailer

### What's inside?

**dbconnect.php** - In order to establish a connection to the database. (Must at first to be configured)

**inc/header.php** - Contains the header part of the website,used in index.php,login.php and admin.php 

**inc/carousel.php** - Bootstrap carousel, displays latest 3 movies by year in decreasing order from database.



**index.php** - The main page of the website.
- **sort.php** - Sends a query to the database by selected genre and retrieve movies in random order from database.
- **trailerinfo.php** - Gets movie information and shows inside Bootstrap modal in case movie is cliked in the main page (image movie,title movie) is valid also for the carousel..
- **js/alljs.js** - Logo animation,AJAX requests using JQuery and localStorage to keep the value of selected genre and scroll down animation to the section of the movies when button "Show other movies" is clicked.
- **logout.php** - The logout option will be presented inside the main page of the website at the header section (index.php,header.php) if the admin is logged in.
if the lougout button will be clicked ,it will destory the session variables and destory the current session.

**login.php** - Login page for admin only uses loginform.php when submitting the login form.
- **loginform.php** - Check if admin does exists and opens a session and define session variables if does exists.

**admin.php** - Admin Panel page,contains the following features:

- **deletetrailer.php** - Deletes the movie which was clicked on delete button and creates a session variables which will be available to the admin.php to show the messages if the query is done successfully or not.
- **edittrailer.php** - Gets movie information from database and returns as response into Bootstrap modal which will allows us to edit the movie cliked, if the query done successfully or not ,will be created session variables which will be available in the current session in order to show the message inside the admin.php.
- **updateinfo.php** - If the button "Update" cliked from the modal of edittrailer.php, updateinfo.php will run the query with the new updated information.
- **savetrailer.php** - Add new movie - trailer section,if the movie added successfully or not,will be created session variables, in which will be available in the admin.php to show the message if movie added or not.

**In the proccess of editing movie,removing and adding new movie will be created session variables in order to show to the user that the opertion done successfully or not, after that the message wil be shown the session variable will be not available as we use unset()**


### Database schema
![](https://i.ibb.co/2KS203F/database.png)

------------
### Developed by
**Arthur Gusein**

