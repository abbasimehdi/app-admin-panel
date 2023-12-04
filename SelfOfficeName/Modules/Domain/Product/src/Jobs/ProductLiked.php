<?php

namespace Selfofficename\Modules\Domain\Product\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Selfofficename\Modules\Domain\Product\Http\Contracts\Repository\ProductRepository;
use Selfofficename\Modules\Domain\Product\Models\Product;

class ProductLiked implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $product = Product::find($this->data['product_id']);
        $product->likes++;
        $product->save();
    }
}
