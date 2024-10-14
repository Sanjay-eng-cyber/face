<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ProjectSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Required Directories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('creating required directories.');
        Artisan::call('storage:link');
        $this->info('Storage has been linked.');
        Storage::disk('public')->makeDirectory('images');
        $this->line('-----');
        Storage::disk('public')->makeDirectory('images/galleries');
        $this->line('-----');
        Storage::disk('public')->makeDirectory('images/uploads');
        $this->line('-----');
        Storage::disk('public')->makeDirectory('images/events');
        $this->line('-----');
        Storage::disk('public')->makeDirectory('images/events/watermark_image');
        $this->info('Command Ran Successfully.');
    }
}
