
<img width="1385" alt="Screenshot 2023-01-25 at 14 27 04" src="https://user-images.githubusercontent.com/8981082/214579058-d9d3fac1-b2c6-4ba6-94f4-c1c3ee6ec21b.png">

## Project

-- It is about News Articles based on Laravel 9

## Instructions
1. run composer install to generate depedencies in vendor folder
2. change .env.example to .env
3. run php artisan key:generate
4. configure .env
5. Add your db credentials



## Note
1. Please check your environment as this project uses laravel 9 

2.  You might get this error 'Vite manifest not found at:' 
   1. Run npm install
   2. npm run dev --> this will create the vite manifest

   3. php artisan serve




## End points

   - News  ( validates user needs to add authorization Bearer token to work)
     * https://capitalsage.overallheuristic.com/api/news
     * To view the above news you need the bearer token and you can get it
     by using the credentials username: user@example.com && Password: password
     you can also create your own with the register api below.

   - Register
     * https://capitalsage.overallheuristic.com/api/register

   - Login
     * https://capitalsage.overallheuristic.com/api/login





## Features
1. HTTP client used to pull news and insert into db without duplicates
2. API News created and displayed on landing page searchable by keyword & date using a blog format && datatables. Datatables version is in the feature/datatable/1 branch.
3. Registration / Login for users Using auth:sanctum
4. throttle (throttle:visits) used to limit access to IP address for more than 20 hits per minutes. You get an error "message": "Too Many Attempts.
5. Task Schedule command to pull news every 6 hours
