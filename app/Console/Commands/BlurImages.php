<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Spatie\ImageOptimizer\OptimizerChainFactory;

// $ php artisan images:BlurImages public/images/blurred (public/images/blurred is the argument of this command)
class BlurImages extends Command
{
    protected $signature = 'images:BlurImages {directory}';
    protected $description = 'Resize and optimize images in a directory';

    public function handle()
    {
        ini_set('memory_limit', '512M'); // use more memory so the image can be processed correctly

        $directory = $this->argument('directory');

        if (!is_dir($directory)) {
            $this->error("Directory does not exist: {$directory}");
            return 1;
        }

        $manager = new ImageManager(Driver::class);
        $optimizer = OptimizerChainFactory::create();
        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $path = $file->getRealPath();
            $this->info("Processing {$path}");

            $image = $manager->read($path);
            $image->scale(width: 300); // keeps aspect ratio automatically v3
            $image->blur(10);
            $image->save($path);

            $optimizer->optimize($path);
        }

        $this->info('All images blurred & optimzed!');
        return 0;
    }
}
