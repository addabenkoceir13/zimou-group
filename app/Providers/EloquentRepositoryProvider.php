<?php

namespace App\Providers;

use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\Attribute\EloquentAttribute;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\AttributeValue\EloquentAttributeValue;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\EloquentProduct;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class EloquentRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, EloquentUser::class);
        $this->app->bind(AttributeRepository::class, EloquentAttribute::class);
        $this->app->bind(AttributeValueRepository::class, EloquentAttributeValue::class);
        $this->app->bind(ProductRepository::class, EloquentProduct::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind(
        //     UserRepository::class,
        //     EloquentUser::class
        // );
    }
}
