PERSONAL EXERCISES
==================

this project was made by simply following simple tutorials on the web.
----------------------------------------------------------------------

Project one
- If you complete the form it will give an alert that shows the information you've entered, it may tell you to check your email but its not true (Planning to configure)
- this will not save the data on to the database

Project two
- this one is using DYNAMIC validation Script made by me.
- this will save the data onto the database.

Project Three
- This is a login page.
- You can login using the credentials you've entered on Project two (Aint working yet)


TO create database

 `Create table Registration (
  id int unsigned not null auto_increment,
  Firstname varchar(20) not null,
  Lastname varchar(20) not null,
  Address varchar(50),
  email varchar(20) not null,
  gender varchar(20) not null,
  Username varchar(20) not null,
  Password varchar(255) not null,
  constraint pk_Registration primary key (id)
  );`

TODO's :

+ Encrypt Password before inserting into database
+ Work on Login
