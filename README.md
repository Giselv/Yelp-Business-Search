https://learn.microsoft.com/en-us/windows/wsl/install for windows
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:ZHFaYSNSPQ8mAoeh8nqUTzX3IS9g8Tf9k52ghUfeOoc=
APP_DEBUG=true
APP_URL=http://localhost
APP_PORT=8091
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
FORWARD_DB_PORT=13305

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
VITE_PORT=15175
```

## Assignment 3
## Part 0 Installation
## Step 1. Make sure you have docker installed and install php composer 
```
https://getcomposer.org/doc/00-intro.md

```
## inside root directory of this project
```
composer install
```
## Step 2. Go to the root directory
run
```
./vendor/bin/sail up
``` 
This should create a mysql instance along with a laravel backend api available at localhost:8091
Step 3.
To create the business table run
```
./vendor/bin/sail artisan make:migrate
```
Step 4.
To add the yelp data set into the table run
```
./vendor/bin/sail artisan db:seed --class=BusinessSeeder
```
## Part 1 Backend
Build out the rest of the endpoint started for you at this route. Do backend first then think of a method to display this on a front end framework posting your search results while paginating the data and ordering by the various field in the database. Do not do client side pagination order sorting only server side.
```
routes/api.php
Route::post('/business/search',function(Request $request){
    //TODO your api
    //https://laravel.com/docs/10.x/queries#main-content
    $search_param = $request->input('search_param');

    $businesses = Business::
    where('name','like',"%{$search_param}%")
    ->limit(10)
    ->get();

    return response($businesses);
});
```
## Part 2 Frontend
Create a frontend for this api endpoint
sorting and searching what ever fields you find interesting try to do at least to or 3 search fields
Make sure to paginate your data. Returning only 25-100 entries max at a time.

## You dont have to user larevel for your api but this is the quickest way to seed a database instance with yelp data which will then be available to you through docker
