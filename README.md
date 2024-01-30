- Link database in env file and add password

- create model with name singular form of table name
php artisan make:model Train

- create controller
php artisan make:controller Guest/PageController 


- in web.php, change route to 
Route::get('/', [PageController::class, 'index']);

- in controller, add index method 
class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }
}

- create table via terminal
php artisan make:migration create_trains_table (the name of the table will be the plural form of our model)

- php artisan migrate
this command will create the table in the database with name plural of our model. The table created will have three columns: id, created_at, & updated_at. If I want to modify these columns, I can change the migration file and migrate a new table that will overwrite the existing one. Or I can do a rollback
php artisan migrate:rollback
rollback will call the down function existing in the migration file. 

- To create a table with the columns of our choice, after rollback, we go to the migration file of our table and inside the function up() define what are the columns of our table. 
