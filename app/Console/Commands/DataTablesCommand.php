<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class DataTablesCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:datatables {class} {--model=Model}';

    /**
     * Console command description.
     *
     * @var string
     */
    protected $description = 'Create datatables server side handle';

    /**
     * Create new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute console command.
     *
     * @return int
     */
    public function handle() {
        $stubs = base_path('/App/Console/Commands/Stubs/Datatables.stubs');

        if (!file_exists($stubs)) {
            $this->info('Stub DataTables file not exists!');

            return;
        }

        $dir = app_path('DataTables');

        if (!is_dir($dir)) {
            mkdir($dir);
        }

        $template = file_get_contents($stubs);

        $model = $queue_name = $this->option('model');
        $class = $queue_name = $this->argument('class');

        $path = explode('/', $class);
        $filename = $path[count($path) - 1];

        if (count($path) > 1) {
            unset($path[count($path) - 1]);

            $path_first = $dir;
            foreach ($path as $key => $new_path) {
                if (!is_dir($path_first.DIRECTORY_SEPARATOR.$new_path)) {
                    mkdir($path_first.DIRECTORY_SEPARATOR.$new_path);
                }

                $path_first = $path_first.DIRECTORY_SEPARATOR.$new_path;
            }
        }

        $namespace = 'App\\DataTables\\'.implode('\\', $path);
        $namespace = str_replace('\\'.$filename, '', $namespace);

        $php = str_replace('{{ namespace }}', $namespace, $template);
        $php = str_replace('{{ model }}', $model, $php);
        $php = str_replace('{{ filename }}', $filename, $php);

        $content = $dir.DIRECTORY_SEPARATOR.$class.'.php';

        try {
            if (file_exists($content)) {
                throw new Exception($filename.'.php already exists!');
            }

            file_put_contents($content, $php);

            $this->info($filename.'.php has been created!');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
