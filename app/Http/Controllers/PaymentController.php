<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<<< HEAD:app/Http/Controllers/PaymentController.php
class PaymentController extends Controller
========
class TransactionsController extends Controller
>>>>>>>> 7d4b9e364bc749340b944556aff6a596a7720afa:app/Http/Controllers/TransactionsController.php
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<<< HEAD:app/Http/Controllers/PaymentController.php

        return view('payment');
========
        return view('transactions');
>>>>>>>> 7d4b9e364bc749340b944556aff6a596a7720afa:app/Http/Controllers/TransactionsController.php
    }
}
