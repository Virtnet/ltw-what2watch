# LTW - Progetto WHAT2WATCH
**Are you bored?** you would like to watch some movie? but you don't know which one?
No problem!
**WHAT2WATCH** works in way that every page refresh it will show you varius of new suggestions depending on the movie genre selected.

------------
### Which technologies used to develop this website?
- Bootstrap 4.5 - The main source of design.
- JavaScript - for the input control ***(addtrailer.js)***
- JQuery - For AJAX requests and manipulaton on the website logo. ***(alljs.js)***
- AJAX - Used for asynchronous requests which allows us to recive data as response without refreshing the page,so it is invisible to the visitor.
Used for the following functions: 
	- Movie details that shown up on the Bootstrap modal ***(trailerinfo.php)***
	- Sorting by genre ***(sort.php)***
	- Updating movie details inside Admin Panel ***(updateinfo.php)***
- PHP - As a side server language
- PostgrSQL - which is database system that extends the SQL language.
- And of course HTML5 and CSS.

### Features:
- Login system only for admin
- Admin control panel
	- Add new trailer
	- Edit trailer
	- Remove trailer

### What inside?

**dbconnect.php** - In order to establish a connection to the database. (Must at first to be edited)

**inc/header.php** - Used in index.php,login.php and admin.php

**login.php** - If you're logged in, you can logout ,it deletes all session variables.


**index.php** - The main page of the website.
- **sort.php** - Sends a query to the database by selected genre and retrieve movies in random order from database.
- **trailerinfo.php** - Gets movie information and shows inside Bootstrap modal.
- **inc/carousel.php** - Bootstrap carousel, displays latest 3 movies by year in decreasing order.
- **js/alljs.js** - Logo aniamtion,AJAX requests and localStorage to keep the value of selected genre

**login.php** - Login page for admin only uses loginform.php when submitting the login form.
- **loginform.php** - Check if admin does exists and opens a session if does exists.

**admin.php** - Admin Panel page.

- **deletetrailer.php** - Deletes the movie which was clicked on delete button.

- **edittrailer.php** - Gets movie infomation from database and returns as response into Bootstrap modal which will allows us to edit the current movie.
- **updateinfo.php** - If the button "Update" cliked from the modal of edittrailer.php, updateinfo.php will run the query with the new updated information.
- **savetrailer.php** - Add new movie-trailer section



------------
### Developed by
**Arthur Gusein**, **Daniele Fardella**, **Fabio Caiazzo**

