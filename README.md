# laravel_blog
Simple Blog System Using Laravel Framework

After clone this project, you need to follow some steps below:
1. Update depedencies
    <br>+ Composer upgrade (run on terminal)

2. Create environment file and configur with your system
    <br>+ Copy & configure .env.example to .env

3. Create databse with migrate artisan command
    <br>+ php artisan migrate (run on terminal)

4. Clear cache and generate key
	<br>+ php artisan key:generate (run on terminal)
	<br>+ php artisan config:cache (run on terminal)
    <br>+ php artisan storage:link (run on terminal)

5. Try to run with artisan server