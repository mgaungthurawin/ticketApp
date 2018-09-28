<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Bus;
use App\Models\Schedule;
use Alert;
use Konekt\PdfInvoice\InvoicePrinter;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        Session::put('seatArr',$data['seatArr']);
        $response = [];
        $response['status'] = true;
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new InvoicePrinter('A4', 'Ks', 'en');
        $orderId = strtotime("now");

        $data = $request->all();

        $bus_id = Session::get('bus_id');
        
        $kill_date = killdate($bus_id);

        $row = Customer::where('email', $data['email'])->first();
        if (empty($row)) {
            $row = Customer::create($request->all());    
        }

        $book = [];
        $seatArr = Session::get('seatArr');
        foreach ($seatArr as $key => $seat) {
            $array = explode(",", $seat);
            $book[] = ['customer_id' => $row->id, 'bus_id' => $bus_id, 'seat_no' => $array[0], 'seat_prefix' => $array[1], 'kill_date' => $kill_date, 'status' => 1];
        }

        $seat = Seat::where('bus_id', $bus_id)->first();
        $bus = Bus::find($bus_id)->first();
        $price = $seat->price;
        Booking::insert($book);
        /* Header settings */
            $invoice->setLogo(public_path("images/user.png"));
            $invoice->setColor("#007fff");
            $invoice->setType("Booking Invoice");    // Invoice Type
            $invoice->setReference("INV-" . $orderId);   // Reference
            $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
            $invoice->setTime(date('h:i:s A',time()));   //Billing Time
            $invoice->setFrom(array("Aye Aye Nyein","Online Ticket Booking","N0-8, Pyi Thu Kwet(3) Street","Sanchaung"));
            $invoice->setTo(array($data['name'],$data['email'],$data['address'], $data['phone']));
            $total = 0;
            foreach ($book as $key => $b) {
                $invoice->addItem($b['seat_no'],'Bus No - ' . $bus->no .' Model - ' . $bus->model,1,0,$price,0,1*$price);  
                $total += $price*1;  
            }
            $invoice->addTotal("Total",$total);
            $invoice->addBadge("Booked");
            $invoice->addTitle("Important Notice");
            $invoice->addParagraph("This invoice will be killed before one day bus leave.");
            $invoice->setFooternote("<a href='/'>Back</a>");
            $invoice->render($orderId.'.pdf','I'); 

            Alert::success('Successfully booking', 'Yay');
            return redirect('/');
    }

    public function test() {
        // return Carbon::now()->subDays(-1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
