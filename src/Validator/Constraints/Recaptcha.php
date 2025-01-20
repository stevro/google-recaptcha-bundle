<?php

/*
 * This code belongs to NIMA Software SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\GoogleRecaptchaBundle\src\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of Recaptcha
 *
 * @author stefan
 *
 * @Annotation
 */
#[\Attribute]
class Recaptcha extends Constraint
{

    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }

    public function validatedBy()
    {
        return RecaptchaValidator::class;
    }

}
