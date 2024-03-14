<?php

namespace App\Listeners;

use App\Events\ProductStored;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessProductStored
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductStored $event)
    {
        // Faça algo com os dados do produto
        $productName = $event->productName;
        $productPrice = $event->productPrice;

        Product::create(["name" => $productName,  "price" => $productPrice]);

        // Por exemplo, salve os dados do produto no banco de dados
        // Ou envie um email de notificação
    }
}
