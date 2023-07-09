<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function prepareForValidation()
    {
        $makeOrder = Cart::where('user_id',Auth::user()->id)->get();

        foreach($makeOrder as $order) {

            $where = Order::where('user_id',$order->user_id)->where('product_id',$order->product_id)->first();

            if($where) {
                $where->update(['quantity' => $where->quantity + 1,'country' => $where->country,'total' => $where->total + $order->total]);
            } else {

                $this->merge([
                    'user_id' => Auth::user()->id,
                    'product_id' => $order->product_id,
                    'country' => Auth::user()->country,
                    'quantity'=>1,
                    'total' => $order->product()->get()[0]->price,
                ]);
                
                Order::create($this->except('_token'));
            }

            $order->delete();
        }

    }
}
