# Blocktrain Instructions
A blockchain application built as a dapp with laravel infrastructure on the backend that uses TFL api data to create journey data that is placed on the blockchain


#Install Instructions
1. At the command line use gitclone to clone to a directory of your choosing
2. If you are using Laravel Valet browse to the blocktrain directory and use valet link to link the directory
3. At the command prompt type mysql -u root and create a new database by following the instructions below
4. Type CREATE DATABASE blocktrain;
5. Type exit;
6. Within the blocktrain directory run php artisan migrate to migrate the database
7. Check to see if the database has migrated using your own SQL software I use table plus to check to see if the databases are migrated.
8. Go to the blocktrain-dapp directory 
9. Type which truffle to find out the version of truffle you are using.
10. If you dont have truffle installed install it here https://www.trufflesuite.com/docs/truffle/getting-started/installation
11. Go to the migrations directory and run truffle migrate
12. Install Granache here https://www.trufflesuite.com/docs/ganache/quickstart
13. Once installed go to the contracts tab and check to see if the truffle migrations have run correctly.
14. Go to blocktrain.test and create a new account
15. Login using that account and test
