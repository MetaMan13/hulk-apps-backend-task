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