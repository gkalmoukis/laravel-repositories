# Laravel Model Repository

A simple package to use **Repository Pattern** approach for Eloquent models. 

## Repository pattern
Repositories are classes or components that encapsulate the logic required to access data sources. They centralize common data access functionality, providing better maintainability and decoupling the infrastructure or technology used to access databases from the domain model layer. [Microsoft](https://docs.microsoft.com/en-us/dotnet/architecture/microservices/microservice-ddd-cqrs-patterns/infrastructure-persistence-layer-design)

## Installation

Require the package using composer:

```bash
composer require gkalmoukis/laravel-repositories
```

## Command and Configuration

To use this package, you need to have repository class bound to laravel model class . This package includes a command that make it easy to to create repository classes from command line . to create a new repository class, run the following command

```bash
php artisan make:repository Repository --model=DummyModel
```

## Usage

The best way to use the repository classes via **Dependency Injection** through the **controller** classes . for example : 

```php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;

class DummyController extends Controller {

	/**
     * create a new controller instance
     *
     * @param  \App\Repositories\Repository $repository
     * @return void
     */
    public function __construct(
        protected Repository $repository
    ) {}
}
```

And in that way one can already get a fully qualified repository class . Also to manually initiated : 

```php
$repository = new \App\Repositories\Repository(new DummyModel);
```