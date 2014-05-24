<?php
/**
 * Copyright (c) 2009 Stefan Priebsch <stefan@priebsch.de>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 *   * Neither the name of Stefan Priebsch nor the names of contributors
 *     may be used to endorse or promote products derived from this software
 *     without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER ORCONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHPca
 * @author     Stefan Priebsch <stefan@priebsch.de>
 * @copyright  Stefan Priebsch <stefan@priebsch.de>. All rights reserved.
 * @license    BSD License
 */

namespace spriebsch\PHPca\Rule;

use spriebsch\PHPca\Loader;
use spriebsch\PHPca\Constants;
use spriebsch\PHPca\Tokenizer;
use spriebsch\PHPca\Result;

require_once __DIR__ . '/../../src/Rule/ClassesMustHaveDocBlockRule.php';

/**
 * Tests for the classes must have doc block rule.
 *
 * @author     Stefan Priebsch <stefan@priebsch.de>
 * @copyright  Stefan Priebsch <stefan@priebsch.de>. All rights reserved.
 */
class ClassesMustHaveDocBlockRuleTest extends AbstractRuleTest
{
    /**
     * @covers \spriebsch\PHPca\Rule\ClassesMustHaveDocBlockRule
     */
    public function testNoClassToken()
    {
        $this->init(__DIR__ . '/../_testdata/ClassesMustHaveDocBlockRule/no_class.php');

        $rule = new ClassesMustHaveDocBlockRule();
        $rule->check($this->file, $this->result);

        $this->assertFalse($this->result->hasViolations());
    }

    /**
     * One class and no docblock in the file.
     *
     * @covers \spriebsch\PHPca\Rule\ClassesMustHaveDocBlockRule
     */
    public function testReportsViolationWhenFileContainsNoDocBlock()
    {
        $this->init(__DIR__ . '/../_testdata/ClassesMustHaveDocBlockRule/one_class.php');

        $rule = new ClassesMustHaveDocBlockRule();
        $rule->check($this->file, $this->result);

        $this->assertTrue($this->result->hasViolations());
    }

    /**
     * @covers \spriebsch\PHPca\Rule\ClassesMustHaveDocBlockRule
     */
    public function testNoViolations()
    {
        $this->init(__DIR__ . '/../_testdata/ClassesMustHaveDocBlockRule/docblock.php');

        $rule = new ClassesMustHaveDocBlockRule();
        $rule->check($this->file, $this->result);

        $this->assertFalse($this->result->hasViolations());
    }

    /**
     * @covers \spriebsch\PHPca\Rule\ClassesMustHaveDocBlockRule
     */
    public function testViolations()
    {
        $this->init(__DIR__ . '/../_testdata/ClassesMustHaveDocBlockRule/no_docblock.php');

        $rule = new ClassesMustHaveDocBlockRule();
        $rule->check($this->file, $this->result);

        $this->assertTrue($this->result->hasViolations());
        $this->assertEquals(2, $this->result->getNumberOfViolations());
    }
}
?>