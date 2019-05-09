<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

##AUTO_INSERT_USE##
use App\Repositories\Contracts\IProductClassRepository;
use App\Repositories\ProductClassRepository;
use App\Models\ProductClass;
use App\Repositories\Contracts\IProductRepository;
use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\UserRepository;
use App\Models\User;


class RepositoriesServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        ##AUTO_INSERT_BIND##
		$this->app->bind(IProductClassRepository::class, function () {
			return new ProductClassRepository(new ProductClass());
		});
		$this->app->bind(IProductRepository::class, function () {
			return new ProductRepository(new Product());
		});
        $this->app->bind(IUserRepository::class, function () {
            return new UserRepository(new User());
        });
    }

    public function provides()
    {
        return [
            ##AUTO_INSERT_NAME##
			ProductClassRepository::class,
			ProductRepository::class,
            UserRepository::class,
        ];
    }
}
