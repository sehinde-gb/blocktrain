# What Is It? </ br>
Blocktrain is a blockchain application built as a dapp with laravel infrastructure on the backend that uses TFL api data to create journey data that is placed on the blockchain. </ br> 

(Note that this uses Laravel as a backend and a vuejs SPA as a front end)


# Installation Instructions
1. At the command line use gitclone to clone to a directory of your choosing. </ br>
2. If you are using Laravel Valet browse to the blocktrain directory and use valet link to link the directory. </ br> 
3. At the command prompt type mysql -u root and create a new database by following the instructions below: </ br> 
4. Type CREATE DATABASE blocktrain; </ br> 
5. Type exit; </ br> 
6. Within the blocktrain directory run php artisan migrate to migrate the database. </ br> 
7. Check to see if the database has migrated using your own SQL software I use table plus to check to see if the databases are migrated. </ br> 
8. Go to the blocktrain-dapp directory. </ br>  
9. Type which truffle to find out the version of truffle you are using. </ br> 
10. If you dont have truffle installed install it [Truffle] (https://www.trufflesuite.com/docs/truffle/getting-started/installation) </ br> 
11. Go to the migrations directory and run truffle migrate </ br> 
12. Install Granache [Granache] (https://www.trufflesuite.com/docs/ganache/quickstart) </ br> 
13. Once installed go to the contracts tab and check to see if the truffle migrations have run correctly. </ br> 
14. Go to blocktrain.test and create a new account. </ br> 
15. Login using that account and test </ br> 
