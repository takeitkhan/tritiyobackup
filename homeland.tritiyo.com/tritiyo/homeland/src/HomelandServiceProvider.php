<?php
namespace Tritiyo\Homeland;
use Illuminate\Support\ServiceProvider;
use Tritiyo\Homeland\Repositories\Bolgate\BolgateEloquent;
use Tritiyo\Homeland\Repositories\Bolgate\BolgateInterface;

use Tritiyo\Homeland\Repositories\Ledger\LedgerEloquent;
use Tritiyo\Homeland\Repositories\Ledger\LedgerInterface;

use Tritiyo\Homeland\Repositories\Expense\ExpenseEloquent;
use Tritiyo\Homeland\Repositories\Expense\ExpenseInterface;

use Tritiyo\Homeland\Repositories\Income\IncomeEloquent;
use Tritiyo\Homeland\Repositories\Income\IncomeInterface;

use Tritiyo\Homeland\Repositories\Customer\CustomerEloquent;
use Tritiyo\Homeland\Repositories\Customer\CustomerInterface;

use Tritiyo\Homeland\Repositories\Purchase\PurchaseEloquent;
use Tritiyo\Homeland\Repositories\Purchase\PurchaseInterface;

class HomelandServiceProvider extends ServiceProvider {

    public function boot(){
        $this->loadRoutesFrom(__DIR__. '/routes/homeland.php');
        $this->loadViewsFrom(__DIR__. '/views', 'homeland');
        $this->loadMigrationsFrom(__DIR__. '/Migrations');

        $this->publishes([
            __DIR__. '/Migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__. '/Seeders/' => database_path('seeders')
        ], 'seeders');
    }

    public function register(){
        $this->app->singleton(BolgateInterface::class, BolgateEloquent::class);
        $this->app->singleton(LedgerInterface::class, LedgerEloquent::class);
        $this->app->singleton(ExpenseInterface::class, ExpenseEloquent::class);
        $this->app->singleton(IncomeInterface::class, IncomeEloquent::class);
        $this->app->singleton(CustomerInterface::class, CustomerEloquent::class);
        $this->app->singleton(PurchaseInterface::class, PurchaseEloquent::class);
    }
}
