# php-crud

> This is a basic PHP CRUD system which allows users to login, create more users, edit the users and delete users. Upon adding a user, a welcome email will be sent to the user to confirm they have been captured 

1.	To use the PHP CRUD you will need to create database preferrably with the name ***php_crud*** with table called ***users***
```sql
CREATE DATABASE IF NOT EXISTS `php_crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_crud`;
-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `sa_id_number` text NOT NULL,
  `mobile_number` text NOT NULL,
  `email` text NOT NULL,
  `birth_date` date DEFAULT NULL,
  `language` text NOT NULL,
  `interests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `surname`, `sa_id_number`, `mobile_number`, `email`, `birth_date`, `language`, `interests`) VALUES
(2, 'tevin', 'demo123', 'Tevin', 'Hendricks', '9503165059084', '0795044020', 'tevinhendricks16@gmail.com', '1995-03-16', 'english', 'soccer'),
(15, 'isabelle conrad', 'password123', 'Isabelle Conrad', 'Lynch', '67', '783', 'fudacupul@mailinator.com', '2019-11-16', 'Other', 'Movies, Tennis'),
(16, 'sage delaney', 'password123', 'Sage Delaney', 'Austin', '53', '723', 'roqizuqe@mailinator.com', '2005-08-29', 'Afrikaans', 'Movies, Tennis, Music');

```
3.	You will then need to edit the ***db_conn.php*** with your database credentials
4.	Next step will be to login into the system using the credentials imported into the DB with the login being:
```json
username = tevin
password = demo123
```
6.	Once logged in you should see this CRUD system:
7.	You can now click on Add Users and you should then see the form
8.	Fill out the form (Note the username and password will be automatically generated from name and password will always be password123)
9.	You can now edit, delete newly created user. 
10.	Logout to login with new user created.
