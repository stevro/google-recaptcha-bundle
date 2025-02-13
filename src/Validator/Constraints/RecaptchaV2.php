<?php

/*
 * This code belongs to NIMA Software SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\GoogleRecaptchaBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of Recaptcha
 *
 * @author stefan
 *
 * @Annotation
 */
#[\Attribute]
class RecaptchaV2 extends Constraint
{

    public function getTargets(): array|string
    {
        return self::PROPERTY_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return RecaptchaV2Validator::class;
    }

}
