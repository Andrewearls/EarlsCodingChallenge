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
configure your database settings in your .env file 
consider running composer dump-autoload
run php artisan migrate
run php artisan queue:listen
run php artisan serve