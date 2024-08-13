<?php

namespace App\Http\Controllers\Frontend;

use App\Services\Midtrans\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Feature\Order;
use App\Repositories\CrudRepositories;
use App\Services\Feature\OrderService;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class TransacationController extends Controller
{   
    protected $orderService;
    protected $order;
    protected $midtransService;

    public function __construct(OrderService $orderService,Order $order, Midtrans $midtransService)
    {
        $this->orderService = $orderService;
        $this->order = new CrudRepositories($order);
        $this->midtransService = $midtransService;
    }

    public function index()
    {
        $data['orders'] = $this->orderService->getUserOrder(auth()->user()->id);
        return view('frontend.transaction.index',compact('data'));
    }

    public function show($invoice_number)
    {
        $data['order'] = $this->order->Query()->where('invoice_number',$invoice_number)->first();
        $snapToken = $data['order']->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($data['order']);
            $snapToken = $midtrans->getSnapToken();
            $data['order']->snap_token = $snapToken;
            $data['order']->save();
        }
        return view('frontend.transaction.show',compact('data'));
    }

    public function getStatus(Request $request, $orderId)
    {
        // $status = $this->midtransService->getTransactionStatus($orderId);

        // return response()->json($status);
        {
        $status = $this->midtransService->getTransactionStatus($orderId);
        if ($status) {
            $order = Order::where('invoice_number', $orderId)->first();
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            // Update status order berdasarkan transaction_status dari Midtrans
            switch ($status->transaction_status) {
                case 'settlement':
                    $order->update(['status' => 3]); // 3 berarti "dikemas"
                    break;
                case 'pending':
                    $order->update(['status' => 0]); // 0 berarti "menunggu pembayaran"
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $order->update(['status' => 4]); // 4 berarti "dibatalkan"
                    break;
            }
            return back()->with('success', __('message.order_updated'));
        }
        return response()->json(['error' => 'Failed to get transaction status'], 500);
    }
    }

    

    public function received($invoice_number)
    {
        $this->order->Query()->where('invoice_number',$invoice_number)->first()->update(['status' => 3]);
        return back()->with('success',__('message.order_received'));
    }

    public function canceled($invoice_number)
    {
        $this->order->Query()->where('invoice_number',$invoice_number)->first()->update(['status' => 4]);
        return back()->with('success',__('message.order_canceled'));
    }
}
