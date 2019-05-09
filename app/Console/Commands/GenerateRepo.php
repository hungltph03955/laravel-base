<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class GenerateRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:generate-repo {module} {table} {--skip-route}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create repository contract for model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module = $this->argument('module');
        $table_name = $this->argument('table');
        $skip_route = $this->option('skip-route');

        //get fillable column
        $list_column = Schema::getColumnListing($table_name);


        $Module = ucfirst(camel_case($module));
        $contract_tpl = $this->loadView('command.generate_repo.contract', ['module' => $module, 'Module' => $Module]);
        $eloquent_tpl = $this->loadView('command.generate_repo.eloquent', ['module' => $module, 'Module' => $Module]);
        $service_contract_tpl = $this->loadView('command.generate_repo.service_contract', ['module' => $module, 'Module' => $Module]);
        $service_tpl = $this->loadView('command.generate_repo.service', ['module' => $module, 'Module' => $Module]);
        $model_tpl = $this->loadView('command.generate_repo.model', ['module' => $module, 'Module' => $Module, 'table' => $table_name, 'list_column' => $list_column]);
        $controller_tpl = $this->loadView('command.generate_repo.controller', ['module' => $module, 'Module' => $Module, 'table' => $table_name]);

        //create file
        //model
        file_put_contents(app_path('Models/' . $Module . '.php'), $model_tpl);
        file_put_contents(app_path('Repositories/Contracts/I' . $Module . 'Repository.php'), $contract_tpl);
        file_put_contents(app_path('Repositories/' . $Module . 'Repository.php'), $eloquent_tpl);
        file_put_contents(app_path('Services/Contracts/I' . $Module . 'Service.php'), $service_contract_tpl);
        file_put_contents(app_path('Services/' . $Module . 'Service.php'), $service_tpl);
        if (!$skip_route) {
            file_put_contents(app_path('Http/Controllers/' . $Module . 'Controller.php'), $controller_tpl);
        }

        //append to RepositoryServiceProvider
        $repo = $Module . 'Repository';
        $string_bind = '		$this->app->bind(I' . $repo . '::class, function () {
			return new ' . $repo . '(new ' . $Module . '());
		});';

        $string_use = 'use App\Repositories\Contracts' . '\I' . $repo . ';' . "\n";
        $string_use .= 'use App\Repositories\\' . $repo . ';' . "\n";
        $string_use .= 'use App\Models\\' . $Module . ';';

        $string_provides = '			' . $repo . '::class,';

        $file_path = app_path('Providers/RepositoriesServiceProvider.php');
        $bind_marker = '##AUTO_INSERT_BIND##';
        $use_marker = '##AUTO_INSERT_USE##';
        $provide_marker = '##AUTO_INSERT_NAME##';
        $this->insertIntoFile($file_path, $bind_marker, $string_bind, true);
        $this->insertIntoFile($file_path, $use_marker, $string_use, true);
        $this->insertIntoFile($file_path, $provide_marker, $string_provides, true);

        //append route
        if (!$skip_route) {
            $route_path = app_path() . '/../' . 'routes/web.php';
            $route_marker = '##AUTO_INSERT_ROUTE##';
            $route_insert_text = '
		//' . $module . '
		Route::get(\'' . $module . '\', [
			\'uses\' => \'' . $Module . 'Controller@index\'
		]);
		Route::post(\'' . $module . '\', [
			\'uses\' => \'' . $Module . 'Controller@add\'
		]);
		';
            $this->insertIntoFile($route_path, $route_marker, $route_insert_text);
        }

    }

    private function loadView($view, $data = [])
    {
        return '<?php ' . PHP_EOL . view($view, $data);
    }

    private function insertIntoFile($file_path, $insert_marker, $text, $after = true)
    {
        $contents = file_get_contents($file_path);
        $new_contents = str_replace($insert_marker, ($after) ? $insert_marker . "\n" . $text : $text . "\n" . $insert_marker, $contents);
        return file_put_contents($file_path, $new_contents);
    }
}
