# Jibimo Frontend Talent Test    
## Installation  
- Get the project from our git repository  
`git clone git@github.com:Jibimo/frontend-talent-test.git`  
- Chang directory to project root  
`cd frontend-talent-test`  
- Install __laravel__ framework  
`composer install`  
- Set the __env__ file  
`cp .env.example .env`  
- Create database schema    
`mysql -u root -p`  
`create schema talent charset="utf8mb4";`  
- Set database config in __.env__ file  
`DB_DATABASE=talent`  
`DB_USERNAME=username`  
`DB_PASSWORD=password`  
- Set directory permissions  
`chmod 777 -R storage`  
`chmod 777 -R bootstrap/cache`  
- Run key generator command in laravel  
`php artisan key:generate`  
- Create tables and Fill database with dummy data
`php artisan migrate --seed`  
- Start server
`php artisan serve`  
## Task
You should design a page contains showing products on the page.  
You should design a page contains showing product's details.  
You should add a contact us form which contains of email and a text field and is exists on both pages.    
### Hints
- Page should implement as SPA (use vue router)
- Consider responsive design
- Consider separate modules
- use `http://localhost:8000/product` url to get products. This url accepts `page` query parameter to fetch paginate data.
- use `http://localhost:8000/product/{product_id}` url to get product's details.
- use `http://localhost:8000/contact` with `post` method contains `email` and `text` to save a contact information in server and show a notification to client.
- Products should have a `Add To Basket` button which does not do anything for now.
