<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function orders(Request $req)
    {

        $month = date('m', strtotime($req->month));
        $orders = Order::when($req->date != null, function ($q) use ($req) {
            return $q->whereDate('created_at', $req->date);
        })
            ->when($req->month != null, function ($q) use ($month) {
                return $q->whereMonth('created_at', $month);
            })
            ->when($req->status != null, function ($q) use ($req) {
                return $q->where('status', $req->status);
            })
            ->when($req->order_id != null, function ($q) use ($req) {
                return $q->where('tracking_no', $req->order_id);
            })

            ->where('status', '!=', '4')
            ->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.orders.index', \compact('orders'));
    }

    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order) {

            return view('admin.orders.view', \compact('order'));
        } else {

            return redirect('orders')->with('status', 'Order Id not found');
        }
    }

    public function update_order_status(Request $req, $id)
    {

        $order = Order::find($id);

        $order->update([
            'status' => $req->order_status,
            'message' => $req->order_message
        ]);

        return \redirect('orders')->with('status', 'Order status updated successfully');
    }

    public function order_history(Request $req)
    {
        $month = date('m', strtotime($req->month));
        $orders = Order::when($req->date != null, function ($q) use ($req) {
            return $q->whereDate('created_at', $req->date);
        })
            ->when($req->month != null, function ($q) use ($month) {
                return $q->whereMonth('created_at', $month);
            })
            ->when($req->order_id != null, function ($q) use ($req) {
                return $q->where('tracking_no', $req->order_id);
            })
            ->where('status', '4')
            ->latest()
            ->get();
        return view('admin.orders.history', \compact('orders'));
    }



    // ------------------ invoice generate ----------------

    public function viewInvoice($orderId)
    {
        $order = Order::findorfail($orderId);
        return view('admin.invoice.index', compact('order'));
    }

    public function downloadInvoice($orderid)
    {
        $order = Order::findorfail($orderid);
        $data = ['order' => $order];
        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.index', $data);
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }

    public function mailInvoice($orderId)
    {
        $order = Order::findorfail($orderId);
        return $order;
        // return Auth::user()->email;
        try {
            Mail::to($order->user->email)->send(new InvoiceOrderMailable($order));
            return redirect('order/' . $orderId)->with('status', 'Invoice mail has sent to ' . $order->user->email);
        } catch (\Exception $e) {
            return redirect('order/' . $orderId)->with('status', 'something went wrong!');
        }
    }
}
