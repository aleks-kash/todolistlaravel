<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">

# Tasks ToDoList

<ul>
    <li>Laravel Framework 6.9.0</li>
    <li>PHP 7.2</li>
    <li>MySQL 5.6</li>
</ul>

</p>

## Instructions of the installation

<ol>

<li>
     Deploy a project

   - using the command: 
  
    > git clone https://github.com/aleks-kash/todolistlaravel.git

   - or download archive, press the 'Clone or download' button then click on the 'Download ZIP' button
</li>

<li>

   After downloading, go to the project folder
   
   * rename the (.env.example) file in (.env)
   * edit your ".env" file if necessary, for example, to change the database connection settings, etc.
    
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=laravel
          DB_USERNAME=root
          DB_PASSWORD=

</li>

<li>
     Run composer:
     
     > composer install
</li>


<li>
     Generate api key:
    
     > php artisan key:generate
     
     Application key set successfully.
</li>


<li>
     Create a database
</li>


<li>
     Run migrate and seeds:
        
     > php artisan migrate --seed
    
</li>


<li>
     Run artisan server:
     
     > php artisan serve
     
     Laravel development server started: http://127.0.0.1:8000
</li>

</ol>

##### Thanks for your attention!