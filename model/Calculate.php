<?php
declare(strict_types=1);

class Calculate
{
    private int $cutomerId;
    private int $productId;

    public function __construct(int $cutomerId, int $productId)
    {
        $this->cutomerId = $cutomerId;
        $this->productId = $productId;
    }


}