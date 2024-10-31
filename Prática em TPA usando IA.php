DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=escola_etapa3
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

touch database/database.sqlite

DB_CONNECTION=sqlite
DB_DATABASE=/caminho_para_o_projeto/escola_etapa3/database/database.sqlite

php artisan make:migration create_teachers_table --create=teachers

php artisan make:migration create_disciplines_table --create=disciplines

public function up()
{
    Schema::create('teachers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });
}

public function up()
{
    Schema::create('disciplines', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->timestamps();
    });
}

php artisan migrate

php artisan make:model Teacher -m
php artisan make:model Discipline -m

php artisan make:controller TeacherController --resource
php artisan make:controller DisciplineController --resource

public function index()
{
    $teachers = Teacher::all();
    return view('teachers.index', compact('teachers'));
}

public function create()
{
    return view('teachers.create');
}

public function store(Request $request)
{
    Teacher::create($request->all());
    return redirect()->route('teachers.index');
}

@foreach($teachers as $teacher)
    <p>{{ $teacher->name }} - {{ $teacher->email }}</p>
@endforeach

Route::resource('teachers', TeacherController::class);
Route::resource('disciplines', DisciplineController::class);
