# Setting Up a Laravel Project with Database Integration

## Project Implementation Steps

- Link database in env file and add password

- Create a model with name singular form of the table name

```
php artisan make:model Train
```

- Create controller
  
```
php artisan make:controller Guest/PageController
```


- In web.php, change route to

```
Route::get('/', [PageController::class, 'index']);
```

- In the controller, add the index method

```  
class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }
}
```

- Create a table via terminal

```
php artisan make:migration create_trains_table (the name of the table will be the plural form of our model)
```

- php artisan migrate

this command will create the table in the database with the name plural of our model. The table created will have three columns: id, created_at, & updated_at. If I want to modify these columns, I can change the migration file and migrate a new table that will overwrite the existing one. Or I can do a rollback

```
php artisan migrate:rollback
```

rollback will call the down function existing in the migration file. 

- To create a table with the columns of our choice, after rollback, we go to the migration file of our table and inside the function up() define the columns of our table. 

```
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda', 50);
            $table->string('stazione_di_partenza', 100);
            $table->string('stazione_di_arrivo', 100);
            $table->time('orario_di_partenza');
            $table->time('orario_di_arrivo');
            $table->string('codice_treno', 20);
            $table->tinyInteger('numero_carrozze')->unsigned();
            // could have used boolean type
            $table->tinyInteger('in_orario')->unsigned()->default(1);
            $table->tinyInteger('cancellato')->unsigned()->default(0);
            $table->date('departure_date');
            $table->timestamps();
        });
    }

```

- An alternative to update a table without rollback, it's the command:

```
php artisan make:migration update_tablename_table --table=tablename
```

This will create a new migration file where we can insert the new column also indicating the position:

> in the up function

```
$table->string('string_name', 255)->after('column_name_after_which_to_position')
```

> in the down function I need to write the opposite, how to delete the update

```
$table->dropColumn('column_name');
```

- To delete a column, create a new migration with a descriptive name, then in the up function use the dropColumn method. In the down function, add the code to recreate the column. This is useful if you need to rollback the migration.

- Once data has been inserted in the table via phpMyAdmin, I create a simple HTML structure in the welcome view. Then I code my controller to return all the data in the Trains table

```
class PageController extends Controller
{
    function index()
    {
        $trains = Train::all();
        
        return view('welcome', compact('trains'));
    }
}
```

- Now I can use a foreach loop to print all the trains. If I want to display only the trains departing today, I will use my controller to filter the database to select instead of *All*, only the trains where departing date is today

```
class PageController extends Controller
{
    function index()
    {
        $trains = Train::all();
        $today_trains = Train::where('departure_date', Carbon::today())->get();
        return view('welcome', compact('trains', 'today_trains'));
    }
}
```

I will then use a similar foreach loop to iterate across the results and print them on my welcome view. 



