<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use App\OrderDetails;
use Exception;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'name', 'email', 'slug',
        'address', 'phone', 'total', 'state', 'note'
    ];
    public function stores($order)
    {

        $newOrder = $this;
        $newOrder->name = $order->name;
        $newOrder->slug = Str::slug($order->name, '-');
        $newOrder->phone = $order->phone;
        $newOrder->email = $order->email;
        $newOrder->address = $order->address;
        $newOrder->total = $order->total;
        $newOrder->state = 0;
        $inserOrder = $newOrder->save();
        if ($inserOrder) {
            $dataCart = $order->chitietdathangs;
            $arrayInsert = [];
            foreach ($dataCart as $key => $arrData) {
                $orderInsertItem = [
                    'name' =>  $arrData['name'],
                    'price' =>  $arrData['price'],
                    'quantity' =>  $arrData['soluong'],
                    'image' =>  $arrData['image'],
                    'order_id' => $newOrder->id,
                ];
                array_push($arrayInsert, $orderInsertItem);
            }
            $orders = new OrderDetails();
            try {
                $orders->insert($arrayInsert);
                return response()->json(['status' => 'OK']);
            } catch (Exception $e) {
                $newOrder->delete();
                return response()->json(['status' => 'False']);
            }
        }
        return response()->json(['status' => 'False']);
    }
    public function details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}