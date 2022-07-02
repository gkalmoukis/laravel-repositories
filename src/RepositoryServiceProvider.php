<?php

namespace Gkalmoukis\Repositories;

use Illuminate\Support\ServiceProvider;
use Gkalmoukis\Repositories\Console\MakeRepositoryCommand;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('repository', function($app) {
        return new BaseRepository();
    });
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {
      // publish config file
  
      $this->commands([
          MakeRepositoryCommand::class
      ]);
    }
  }
}