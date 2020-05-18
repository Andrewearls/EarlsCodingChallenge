There is a live version of this app at:
https://earls-coding-challenge.herokuapp.com/login

At request I can add a user to my Klaviyo account.

I have a github repo of this app at:
https://github.com/Andrewearls/EarlsCodingChallenge

Installation Instructions:

Clone the github repo from the link above.
Or download the files from my google drive:
https://drive.google.com/open?id=1teJGBxBmaqTEqtRlzW4AcRMRpzBPbwdi

create a database in mysql

create a .env file
run composer update
run php artisan key:generate

in the .env file change the following:
DB_DATABASE=your-database-name
DB_USERNAME=your-user-name
DB_PASSWORD=your-password
QUEUE_CONNECTION=database

in the .env file add the following:
KLAVIYO_API_KEY=your-public-key

run php artisan migrate 
run php artisan queue:listen
run php artisan serve

******************************** Special Note: **********************************
The csv file upload expects the format "name,email,phone" 
WILL FAIL IF ANY OTHER FORMAT IS GIVEN
dynamic handling of the csv is possible but was not required by the instructions
It does not matter if the csv has a header or not
entries with emails that do not have @ and . symbols will not be entered
entries with phone numbers that contain letters will not be entered