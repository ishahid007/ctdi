<?php
declare(strict_types=1);

namespace App\Contracts;
/**
 * Interface Boat
 * @package Contracts
 */
interface Boat
{
    /**
     * @param array $matrix
     * @param int $fromY
     * @param int $fromX
     * @param int $toY
     * @param int $toX
     * @return bool
     */
    public function canTravelTo(array $matrix, int $fromY, int $fromX, int $toY, int $toX): bool;
}