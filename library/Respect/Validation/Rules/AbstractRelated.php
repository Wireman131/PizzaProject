<?php

namespace Respect\Validation\Rules;

use Respect\Validation\Validatable;
use Respect\Validation\Exceptions\ValidationException;

abstract class AbstractRelated extends AbstractRule implements Validatable
{

    public $mandatory = true;
    public $reference = '';
    public $validator;

    abstract public function hasReference($input);

    abstract public function getReferenceValue($input);

    public function __construct($reference, Validatable $validator=null, $mandatory=true)
    {
        $this->setName($reference);
        $this->reference = $reference;
        $this->validator = $validator;
        $this->mandatory = $mandatory;
    }

    public function assert($input)
    {
        if (!$this->verifyMandatory($input))
            throw $this->reportError($input, array('hasReference' => false));
        elseif (!$this->validator)
            return true;
        else
            try {
                return $this->validator->assert($this->getReferenceValue($input));
            } catch (ValidationException $e) {
                throw $this
                    ->reportError($this->reference, array('hasReference' => true))
                    ->addRelated($e);
            }
    }

    public function check($input)
    {
        if (!$this->verifyMandatory($input))
            throw $this->reportError($input, array('hasReference' => false));
        else
            return $this->validator->check($this->getReferenceValue($input));
    }

    public function validate($input)
    {
        if (!$this->verifyMandatory($input))
            return false;
        else
            return $this->validator->validate($this->getReferenceValue($input));
    }

    protected function verifyMandatory($input)
    {
        return!$this->mandatory || $this->hasReference($input);
    }

}

/**
 * LICENSE
 *
 * Copyright (c) 2009-2011, Alexandre Gomes Gaigalas.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *     * Neither the name of Alexandre Gomes Gaigalas nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */