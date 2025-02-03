<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservasFixture
 */
class ReservasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'datainicial' => '2025-02-03',
                'datafinal' => '2025-02-03',
            ],
        ];
        parent::init();
    }
}
