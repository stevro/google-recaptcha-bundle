<?php


namespace Stev\GoogleRecaptchaBundle\Services\Recaptcha;


use Psr\Log\LoggerInterface;
use ReCaptcha\ReCaptcha;
use Symfony\Component\HttpFoundation\RequestStack;

class ValidatorV2
{

    public function __construct(
        private readonly ReCaptcha $recaptcha,
        private readonly LoggerInterface $logger,
        private readonly RequestStack $requestStack,
        private readonly bool $recaptchaEnabled = true
    ) {
    }

    public function validate($value): bool
    {
        if (!$this->recaptchaEnabled) {
            $this->logger->warning('Google reCAPTCHA not enabled');

            return true;
        }

        $resp = $this->recaptcha->verify($value, $this->requestStack->getCurrentRequest()->getClientIp());

        if ($resp->isSuccess()) {
            return true;
        }

        $this->logger->error(json_encode($resp->getErrorCodes()));

        return false;
    }

}