<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(CarBooking $booking)
{
     $this->authorize('view', $booking);

    $pdf = Pdf::loadView('invoice.booking', compact('booking'))
        ->setPaper('a4');

    return $pdf->download(
        'invoice-'.$booking->booking_code.'.pdf'
    );
}
}