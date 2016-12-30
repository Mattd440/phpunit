<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\Constraint\IsJson;
use PHPUnit\Framework\TestCase;

class Framework_Constraint_IsJsonTest extends TestCase
{
    /**
     * @dataProvider evaluateDataprovider
     * @covers IsJson::evaluate
     * @covers IsJson::matches
     * @covers IsJson::__construct
     */
    public function testEvaluate($expected, $jsonOther)
    {
        $constraint = new IsJson();
        $this->assertEquals($expected, $constraint->evaluate($jsonOther, '', true));
    }

    public static function evaluateDataprovider()
    {
        return [
            'valid JSON'                                     => [true, '{}'],
            'empty string should be treated as invalid JSON' => [false, ''],
        ];
    }
}
