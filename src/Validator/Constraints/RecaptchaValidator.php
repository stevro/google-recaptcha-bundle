<?php

/*
 * This code belongs to NIMA Software SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\GoogleRecaptchaBundle\src\Validator\Constraints;

use Stev\GoogleRecaptchaBundle\Services\Recaptcha\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Description of RecaptchaValidator
 *
 * @author stefan
 *
 * for backend
 * @see https://developers.google.com/recaptcha/docs/verify
 *
 * for frontend
 * @see https://developers.google.com/recaptcha/docs/display
 */
class RecaptchaValidator extends ConstraintValidator
{

    /**
     * @var Validator
     */
    private $validator;

    public function __construct(
        Validator $validator
    ) {
        $this->validator = $validator;
    }

    public function validate($value, Constraint $constraint)
    {

        if (!$constraint instanceof Recaptcha) {
            throw new UnexpectedTypeException($constraint, Recaptcha::class);
        }

        if (true === $this->validator->validate($value)) {
            return;
        }

        $this->context->buildViolation('The security code is invalid!')
            ->addViolation();
    }

}
