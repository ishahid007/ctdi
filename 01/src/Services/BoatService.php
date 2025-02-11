<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Boat;

/**
 * Class BoatService
 * @package Services
 */
final class BoatService implements Boat
{
    /**
     * @param array $matrix
     * @param int $fromY
     * @param int $fromX
     * @param int $toY
     * @param int $toX
     * @return bool
     */
    public function canTravelTo(array $matrix, int $fromY, int $fromX, int $toY, int $toX): bool
    {
        $maxY = count($matrix) - 1;
        $maxX = count($matrix[0]) - 1;

        // Check if the target position is out of bounds
        if ($toY > $maxY || $fromY > $maxY || $toX > $maxX || $fromX > $maxX) {
            return false;
        }

        // Validate legal moves: only adjacent vertical or allowed horizontal movements
        $validMoveY = ($fromY === $toY) || (abs($toY - $fromY) === 1 && $fromX === $toX);
        $validMoveX = ($fromX === $toX) || ($fromY === $toY && $toX - $fromX >= -1 && $toX - $fromX <= 2);

        if (!$validMoveY || !$validMoveX) {
            return false;
        }

        // Check if the path is clear
        if ($fromY === $toY) { // Horizontal move
            foreach (range(min($fromX, $toX), max($fromX, $toX)) as $col) {
                if (!$matrix[$fromY][$col]) return false;
            }
        } elseif ($fromX === $toX) { // Vertical move
            foreach (range(min($fromY, $toY), max($fromY, $toY)) as $row) {
                if (!$matrix[$row][$fromX]) return false;
            }
        } else {
            return false; // Diagonal moves not allowed
        }

        return true;
    }
}