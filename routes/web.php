<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\BinanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\WithdrawalController;

Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/indices', function () {
    return view('home.indices');
});

Route::get('/forex', function () {
    return view('home.forex');
});

Route::get('/commodities', function () {
    return view('home.commodities');
});

Route::get('/stocks', function () {
    return view('home.stocks');
});

Route::get('/options', function () {
    return view('home.options');
});

Route::get('/etfs', function () {
    return view('home.etf');
});

Route::get('/instruments', function () {
    return view('home.instruments');
});

Route::get('/register', function () {
    return view('home.register');
});

Route::get('/users', function () {
    return view('dashboard.home');
});

Route::get('/trading', function () {
    return view('dashboard.trading');
});

Route::get('/accounthistory', function () {
    return view('dashboard.accounthistory');
});

Route::get('/myplans', function () {
    return view('dashboard.myplans');
});

Route::get('/deposit', function () {
    return view('dashboard.deposit');
});

Route::get('/fees', function () {
    return view('home.fees');
});

Route::get('/professionalaccount', function () {
    return view('home.professionalaccount');
});

Route::get('/premiumservice', function () {
    return view('home.premiumservice');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/esg', function () {
    return view('home.esg');
});

Route::get('/bulls', function () {
    return view('home.bulls');
});

Route::get('/legiawarsaw', function () {
    return view('home.legiawarsaw');
});

Route::get('/youngboys', function () {
    return view('home.youngboys');
});

Route::get('/tradingacademy', function () {
    return view('home.tradingacademy');
});

Route::get('/newsandmarketinsights', function () {
    return view('home.newsandmarketinsights');
});

Route::get('/insights', function () {
    return view('home.insights');
});

Route::get('/economiccalendar', function () {
    return view('home.economiccalendar');
});

Route::get('/riskmanagement', function () {
    return view('home.riskmanagement');
});


Route::get('/bulls', function () {
    return view('home.bulls');
});

Route::get('/market-update', function () {
    return view('dashboard.market-update');
});





// // Route to get live price ticker
// Route::get('/binance/ticker/{symbol?}', [BinanceController::class, 'getPriceTicker']);

// // Route to get candlestick data
// Route::get('/binance/candlesticks/{symbol?}/{interval?}', [BinanceController::class, 'getCandlestickData']);


Route::get('/binance', [BinanceController::class, 'showLiveTradingView']);

Route::get('/dashboard', [TradeController::class, 'index'])->name('dashboard');
Route::get('/home', [DashboardController::class, 'showDashboard']);
Route::get('/test', [DashboardController::class, 'showTest']);
Route::get('/profile', [DashboardController::class, 'showProfile']);
Route::get('/withdraw', [DashboardController::class, 'showWithdraw']);
Route::get('/news', [DashboardController::class, 'showNews']);
Route::get('/market', [DashboardController::class, 'showMarket']);
Route::get('/trading', [DashboardController::class, 'showTrading']);
Route::get('/calculator', [DashboardController::class, 'showCalculator']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile', [App\Http\Controllers\HomeController::class, 'Profile'])->name('profile');

Route::get('/deposit', [App\Http\Controllers\DashboardController::class, 'deposit'])->name('deposit');

Route::get('/withdrawals/create', [WithdrawalController::class, 'create'])->name('withdrawals.create');
Route::post('/withdrawals/confirm', [WithdrawalController::class, 'confirm'])->name('withdrawals.confirm');
