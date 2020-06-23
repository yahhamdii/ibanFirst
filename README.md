# ibanFirst

## How do I get set up? ###
The project runs on a **Apache 2.4.3 + **MySQL 5.7.21 + **PHP 7.2.4 + **phpMyAdmin** environment. You can also install MySQL 5.7.21 on your dev machine.

You'll also need Symfony 3.4 

### Common steps (for both alternatives)

#### Clone the project

1. Open a terminal.
2. Change directory to where you wish to put the project files
3. type `git clone git@github.com:yahhamdii/ibanFirst.git`
4. This will provide you a copy of the project under the directory **ibanFirst/** .
5. Go back to your terminal and execute `php composer.phar install`
... You will be asked a few questions for configuration:
 1. **database_driver (pdo_mysql):** : leave default (keep blank and hit [Enter]).
 1. **database_host (127.0.0.1):** : leave default or type `localhost` (recommended).
 1. **database_port (null):** : leave default.
 1. **database_name:** : type `iban_first`
 1. **database_user:** : type `root`
 1. **database_password:** : type `rootroot` (or another password)
 1. Leave all other values by default (blank or otherwise).

