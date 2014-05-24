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

namespace spriebsch\PHPca;

/**
 * Tests for the LintError class.
 *
 * @author     Stefan Priebsch <stefan@priebsch.de>
 * @copyright  Stefan Priebsch <stefan@priebsch.de>. All rights reserved.
 */
class LintErrorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers spriebsch\PHPca\LintError::getMessage
     */
    public function testGetMessageStripsOriginalErrorMessage()
    {
        $error = new LintError('./PHPCA/Tests/_files/testdata/lint_fail/003.php', "Parse error: syntax error, unexpected T_FUNCTION, expecting T_STRING or '(' in ./PHPCA/Tests/_files/testdata/lint_fail/003.php on line 3\nErrors parsing ./PHPCA/Tests/_files/testdata/lint_fail/003.php");
        $this->assertEquals("Parse error: syntax error, unexpected T_FUNCTION, expecting T_STRING or '(' on line 3", $error->getMessage());
    }

    /**
     * @covers spriebsch\PHPca\LintError::getLine
     */
    public function testGetLineReturnsZero()
    {
        $error = new LintError('filename', 'message');
        $this->assertEquals(0, $error->getLine());
    }

    /**
     * @covers spriebsch\PHPca\LintError::getColumn
     */
    public function testGetColumnReturnsZero()
    {
        $error = new LintError('filename', 'message');
        $this->assertEquals(0, $error->getColumn());
    }
}
?>