<?php

/*
 * This code belongs to NIMA Software SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Stev\GoogleRecaptchaBundle\Validator\Constraints;

use Stev\GoogleRecaptchaBundle\Services\Recaptcha\ValidatorV2;
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
class RecaptchaV2Validator extends ConstraintValidator
{

    /**
     * @var ValidatorV2
     */
    private $validator;

    public function __construct(
        ValidatorV2 $validator
    ) {
        $this->validator = $validator;
    }

    public function validate($value, Constraint $constraint)
    {

        if (!$constraint instanceof RecaptchaV2) {
            throw new UnexpectedTypeException($constraint, RecaptchaV2::class);
        }

        if (true === $this->validator->validate($value)) {
            return;
        }

        $this->context->buildViolation('The security code is invalid!')
            ->addViolation();
    }

}
