<?php

namespace App\Exports;

use App\Order;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($from,$to)
    {
        $this->from=$from;
        $this->to=$to;
    }

    public function view(): View
    {
        return view('backend.exports.invoices', [
            'orders' => Order::whereBetween('created_at', [$this->from, $this->to])->get()
        ]);
    }
}
