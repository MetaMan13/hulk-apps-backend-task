# Hulk Apps Backend Task

## App setup

    1. composer install
    2. npm install
    3. npm run dev
    4. php artisan migrate:fresh --seed
    5. php artisan storage:link
    6. Please modify the env for emails ( I used mailtrap ) because I enabled the "MustVerifyEmail" for users and password reset links. The app will break without it
    7. php artisan serve
    8. npm run watch ( optional )

### Task completion process

    NOTE: I had really no time to complete this. At my current job I am managing 5+ projects alone ( fontend,backend,deployment ( cron jobs etc.)). I hope this will be enough of a showcase what I can do

    1. Laravel new app + composer require laravel breeze + php artisan breeze:install
        
        I would usualy queue the emails but I didn't want to overcomplicate things installation and review wise

    2. Enabled mustverifyemail feature, forgot password and styled the basic auth layouts a bit ( added the hulk apps logo and shades of hulk apps logo to the tailwind config - extended the existing color pallete )
    3. Created the "Post" migration, factory and controller. Created the "Comment" migration, factory and controller. Created the needed relations described in the task ( I kept it simple )

        NOTE: Policies is also a viable option to handle and manage premissions for posts
        Can the user update or delete that specific post

    4. Created CRUD for user dashboard posts with custom requests and validation of "hasComments" when trying to delete a post with basic flash messages

    5. Created the homepage post listing with pagination and identifiers "edit and delete" buttons if the post is owned by the user

    6. Created option to create a comment on a post and also an identifier to delete a comment if it is owned by the logged in user


    IDEAS, ADDITIONS:

        Defenitely a better layout, queues for emails and intense tasks, events + listeners + notifications for maybe when a user comments on the post with a bell icon that displays the notification.
        User profile CRUD [ profile image, interests ]
        Post categories and maybe a search by category and posts name

    DURATION TO COMPLETE TASK:

    ~ 4-5 hours ( NOTE: I was really bussy with work since I manage alot of projects that last from may till now an into the future )