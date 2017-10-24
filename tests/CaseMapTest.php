<?php

use PHPUnit\Framework\TestCase;
use jpuck\mbstring\CaseMap;

class CaseMapTest extends TestCase
{
    public function test_can_instantiate_object()
    {
        $this->assertInstanceOf(CaseMap::class, new CaseMap);
    }

    public function test_can_initialize_object()
    {
        $this->assertInstanceOf(CaseMap::class, new CaseMap('тоҷик'));
    }

    public function charCaseDataProvider()
    {
        return [
            ['A', true ],
            ['a', false],
            ['Ғ', true ],
            ['ғ', false],
            ['Г', true ],
            ['г', false],
            ['Ӣ', true ],
            ['ӣ', false],
            ['И', true ],
            ['и', false],
            ['Ҷ', true ],
            ['ҷ', false],
            ['Ч', true ],
            ['ч', false],
            ['Ҳ', true ],
            ['ҳ', false],
            ['Х', true ],
            ['х', false],
            ['Қ', true ],
            ['қ', false],
            ['К', true ],
            ['к', false],
            ['Ӯ', true ],
            ['ӯ', false],
            ['У', true ],
            ['у', false],
            ['Т', true ],
            ['т', false],
            [' ', false],
            ['1', false],
        ];
    }

    /**
     * @dataProvider charCaseDataProvider
     */
    public function test_can_determine_case(string $char, bool $capitalized)
    {
        $this->assertSame($capitalized, (new CaseMap)->isUpper($char));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_can_invalidate_too_many_chars()
    {
        (new CaseMap)->isUpper('AB');
    }
}
