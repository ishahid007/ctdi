<?php

declare(strict_types=1);

use App\Services\BoatService;

require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload


/**
 * @param array $matrix
 * @param int $fromY
 * @param int $fromX
 * @param int $toY
 * @param int $toX
 * @return bool
 */
$matrix = [
    [false, true, true, false, false, false],
    [true, true, true, false, false, false],
    [true, true, true, true, true, true],
    [false, true, true, false, true, true],
    [false, true, true, true, false, true],
    [false, false, false, false, false, false],
];

// Instantiate the BoatService class
$boatService = new BoatService();
// Test the canTravelTo method
echo $boatService->canTravelTo($matrix, 3, 2, 2, 2) ? "true\n" : "false\n"; // true, Valid move
echo $boatService->canTravelTo($matrix, 3, 2, 3, 4) ? "true\n" : "false\n"; // false, Can't travel through land
echo $boatService->canTravelTo($matrix, 3, 2, 6, 2) ? "true\n" : "false\n"; // false, Out of bounds