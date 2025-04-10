<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceCommand extends Command
{
    protected $signature = 'make:service {name : The name of the service}';

    protected $description = 'Create a new service class';

    public function handle()
    {
        // Ambil parameter name
        $name = $this->argument('name');

        // Pastikan nama service diakhiri dengan "Service"
        if (!Str::endsWith($name, 'Service')) {
            $name .= 'Service';
        }

        // Gunakan path tetap Services
        $directory = app_path('Services');

        // Pastikan direktori ada
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Buat namespace untuk file service
        $namespace = 'App\\Services';

        // Buat template untuk file service
        $stub = $this->getStub($namespace, $name);

        // Buat file service dengan template yang telah dibuat
        $filePath = $directory . '/' . $name . '.php';
        File::put($filePath, $stub);

        $this->info("Service {$name} dibuat di {$filePath}");
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
