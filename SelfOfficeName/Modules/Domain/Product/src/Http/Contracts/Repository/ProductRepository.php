<?php

namespace Selfofficename\Modules\Domain\Product\Http\Contracts\Repository;

use Selfofficename\Modules\Core\Http\Contracts\BaseRepository;
use Selfofficename\Modules\Domain\Product\Models\Product;

class ProductRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return Product::class;
    }
}
