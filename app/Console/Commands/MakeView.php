<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeView extends Command
{
    // The name and signature of the console command
    protected $signature = 'make:view {name}';

    // The console command description
    protected $description = 'Create a new view file';

    // Execute the console command
    public function handle()
    {
        $name = $this->argument('name');

        // Determine the file path
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');

        // Check if the file already exists
        if (File::exists($path)) {
            $this->error("View {$path} already exists!");
            return;
        }

        // Create the directory if it doesn't exist
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

     
        // Create the view file with the @extends directive
        $content = "@extends('layout.master')\n\n@section('content')\n\n@endsection";
        File::put($path, $content);

        $this->info("View {$path} created successfully.");
    }
}
