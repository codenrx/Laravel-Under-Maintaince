<?php

namespace codenrx\maintaince\App\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Config\Repository;

class maintainceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:maintaince {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Repository $config, Filesystem $filesystem)
    {
        parent::__construct();
        $this->config = $config->get('maintaince');
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $type = $this->argument('type');
        if ($type == 'off') {
            $hash = 'off';
            $envPath = $this->laravel->environmentFilePath();
            $envContent = $this->filesystem->get($envPath);
            $regex = '/MAINTAINCE_STATUS=\S+/';
            if (preg_match($regex, $envContent)) {
                $hash = str_replace(['\\', '$'], ['', '\$'], 'off');
                $envContent = preg_replace($regex, $this->newLine($hash), $envContent);
            } else {
                $envContent .= "\n" . $this->newLine($hash) . "\n";
            }
            $this->filesystem->put($envPath, $envContent);
            echo "Maintaince Mode Disabled";
        } else if ($type == 'underconstruction') {
            $hash = 'on';
            $envPath = $this->laravel->environmentFilePath();
            $envContent = $this->filesystem->get($envPath);
            $regex1 = '/MAINTAINCE_STATUS=\S+/';
            $regex2 = '/MAINTAINCE_TYPE=\S+/';
            if (preg_match($regex1, $envContent)) {
                $hash = str_replace(['\\', '$'], ['', '\$'], 'on');
                $envContent = preg_replace($regex1, $this->newLine($hash), $envContent);
            } else {
                $envContent .= "\n" . $this->newLine($hash) . "\n";
            }
            if (preg_match($regex2, $envContent)) {
                $hash = str_replace(['\\', '$'], ['', '\$'], 'on');
                $envContent = preg_replace($regex2, "MAINTAINCE_TYPE=underconstruction", $envContent);
            } else {
                $envContent .= "\n" . "MAINTAINCE_TYPE=underconstruction" . "\n";
            }
            $this->filesystem->put($envPath, $envContent);
            echo "Maintaince Mode Enabled ( underconstruction )";
        } else if ($type == 'on') {
            $hash = 'on';
            $envPath = $this->laravel->environmentFilePath();
            $envContent = $this->filesystem->get($envPath);
            $regex1 = '/MAINTAINCE_STATUS=\S+/';
            $regex2 = '/MAINTAINCE_TYPE=\S+/';
            if (preg_match($regex1, $envContent)) {
                $hash = str_replace(['\\', '$'], ['', '\$'], 'on');
                $envContent = preg_replace($regex1, $this->newLine($hash), $envContent);
            } else {
                $envContent .= "\n" . $this->newLine($hash) . "\n";
            }
            if (preg_match($regex2, $envContent)) {
                $hash = str_replace(['\\', '$'], ['', '\$'], 'on');
                $envContent = preg_replace($regex2, "MAINTAINCE_TYPE=maintaince", $envContent);
            } else {
                $envContent .= "\n" . "MAINTAINCE_TYPE=maintaince" . "\n";
            }
            $this->filesystem->put($envPath, $envContent);
            echo "Maintaince Mode Enabled ( maintaince )";
        }
    }

    private function newLine($hash)
    {
        return "MAINTAINCE_STATUS=$hash";
    }
}
