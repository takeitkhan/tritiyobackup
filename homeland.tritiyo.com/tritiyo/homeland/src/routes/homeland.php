<?php

use Tritiyo\Homeland\Controllers\BolgateController;
use Tritiyo\Homeland\Controllers\LedgerController;
use Tritiyo\Homeland\Controllers\ExpenseController;
use Tritiyo\Homeland\Controllers\IncomeController;
use Tritiyo\Homeland\Controllers\CustomerController;
use Tritiyo\Homeland\Controllers\PurchaseController;

Route::group(['middleware' => ['web']], function () {
    Route::any('bolgates/search', [BolgateController::class, 'search'])->name('bolgates.search');

    Route::resources([
        'bolgates' => BolgateController::class,
    ]);


    Route::any('ledgers/search', [LedgerController::class, 'search'])->name('ledgers.search');
    Route::resources([
        'ledgers' => LedgerController::class,
    ]);

    Route::any('expenses/search', [ExpenseController::class, 'search'])->name('expenses.search');
    Route::resources([
        'expenses' => ExpenseController::class,
    ]);

    Route::any('incomes/search', [IncomeController::class, 'search'])->name('incomes.search');
    Route::resources([
        'incomes' => IncomeController::class,
    ]);

    Route::any('customers/search', [CustomerController::class, 'search'])->name('customers.search');
    Route::resources([
        'customers' => CustomerController::class,
    ]);

    Route::any('purchases/search', [PurchaseController::class, 'search'])->name('purchases.search');
    Route::resources([
        'purchases' => PurchaseController::class,
    ]);

});
