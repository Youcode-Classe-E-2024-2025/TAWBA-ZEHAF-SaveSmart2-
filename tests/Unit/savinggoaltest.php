<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class savinggoaltest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function test_calculate_progress()
{
    $savingsGoal = new SavingGoal([
        'target_amount' => 1000,
        'saved_amount' => 500,
    ]);

    $this->assertEquals(0.5, $savingsGoal->calculateProgress());
}

/**
 * Test the calculateProgress method using a factory.
 *
 * @return void
 */
public function test_calculate_progress_with_factory()
{
    $savingsGoal = SavingGoal::factory()->create([
        'target_amount' => 1000,
        'saved_amount' => 500,
    ]);

    $this->assertEquals(0.5, $savingsGoal->calculateProgress());
}

}
//php artisan make:test savinggoaltest --unit
// // php artisan test 