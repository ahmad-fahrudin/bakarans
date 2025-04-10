<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RepositoryCommand extends Command
{
    protected $signature = 'make:repository {name : The name of the repository}';

    protected $description = 'Create a new repository class';

    public function handle()
    {
        // Ambil parameter name
        $name = $this->argument('name');

        // Pastikan nama repository diakhiri dengan "Repository"
        if (!Str::endsWith($name, 'Repository')) {
            $name .= 'Repository';
        }

        // Gunakan path tetap Repositories
        $directory = app_path('Repositories');

        // Pastikan direktori ada
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Buat namespace untuk file repository
        $namespace = 'App\\Repositories';

        // Buat template untuk file repository
        $stub = $this->getStub($namespace, $name);

        // Buat file repository dengan template yang telah dibuat
        $filePath = $directory . '/' . $name . '.php';
        File::put($filePath, $stub);

        $this->info("Repository {$name} dibuat di {$filePath}");
    }

    protected function getStub($namespace, $name)
    {
        return "<?php

namespace {$namespace};

class {$name}
{
    //
}
";
    }
}
