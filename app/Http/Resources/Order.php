<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'status_text' => $this->order_status,
            'status' => $this->status,
            'total_amount' => $this->total_amount,
            'quantity' => $this->getQuantity(),
            'goods' => GoodsResource::collection($this->order_details->pluck('goods')),
            'created_time' => $this->created_at->format('Y-m-d H:i:s'),
            //'path' => $request->order,
            'consignee_info' => $this->when(!empty($request->order), [
                'consignee' => $this->address->consignee,
                'mobile' => $this->address->mobile,
                'address' => $this->address->full_address,
            ]),
        ];
    }
}
