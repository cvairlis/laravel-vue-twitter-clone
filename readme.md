## Building a Twitter Clone using Laravel and Vue

This is a demo application to demonstrate the start of my experience with Laravel & Vue. It is showing how to build a simple twitter clone using Laravel and Vue.

### All Features
- Guests users can only see login and registration form.
- Guests can register and login
- Users can Post a tweet including image
- Users can see and edit their profile page
- Users can upload avatar within the profile edit feature
- Users can see their tweets within their profile page
- Users can see a Users List with all the registered Users
- Users can follow / unfollow other registered users
- Users can see Timeline page which includes a list of all tweets from users they follow
- Added ability of pagination on each page
- Ability of sending an email to the user when he has a new follower.
- Ability of a database table there is stored every page the user has visited and DateTime for every record
- Small amount of Feature and Unit testing with PHPUnit
- Refactored some parts of the code to be more readable, reusable code (DRY)
- Simple API
    - /api/users to get a list with all users.
    - /api/statistics a list with all visited routes on the last 24 hours.
    - Caching API results for 1 minute
- PHPDoc comments methods, properties etc.
- README.md with instructions on how to set up and run this application


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to install the software.
- Composer
- Node Package Manager (I used npm)
- Git
- PHP >= 7.2.18
- Laravel CLI
- Webserver like Nginx or Apache
- Node Package Manager (I used npm)

### Installation

Clone the git repository on your computer

    $ git clone https://github.com/cvairlis/laravel-vue-twitter-clone.git

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git.

After cloning the application, you need to install it's dependencies.

    $ cd twitter_clone_project
    $ composer install

### Setup

- When you are done with installation, copy the .env.example file to .env

        $ cp .env.example .env

- Generate the application key

        $ php artisan key:generate

- Install node modules

        $ npm install

- Setup .env file

    APP_NAME="Laravel Twitter Clone"
    APP_ENV=local
    APP_KEY=base64:mAHpn8AQgCxP1fkVZQPYUlieOR4XPkPGShfMfCZNNWY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=twitter_clone
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    QUEUE_DRIVER=database

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=9260151abe842c
    MAIL_PASSWORD=534d36382dca66
    MAIL_FROM_ADDRESS=from@example.com
    MAIL_FROM_NAME=Example

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1

    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

- Migrate the application

        $ php artisan migrate

### Run the application
    $ php artisan serve


## Built With
- Laravel - The PHP framework for building the API endpoints needed for the application
- Vue - The Progressive JavaScript Framework for building interactive interfaces

## Acknowledgments
- Laravel - The excellent documentation explaining how to get started with Laravel and Laravel Passport made it easy to provide a step by step guide for beginners to follow the application
- Vue - Concise documentation
