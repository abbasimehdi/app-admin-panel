<?php

namespace Selfofficename\Modules\Domain\Product\Http\Contracts\Repository;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ProductInterface
{
    public function index(): JsonResponse;

    public function store(array $data): JsonResponse;
}
