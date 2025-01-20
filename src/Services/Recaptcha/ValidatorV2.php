<?php


namespace Stev\GoogleRecaptchaBundle\Services\Recaptcha;


use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class ValidatorV2
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var string
     */
    private $googleRecaptchaSecret;

    private $appEnv;

    /**
     * Validator constructor.
     * @param LoggerInterface $logger
     * @param RequestStack $requestStack
     * @param string $googleRecaptchaSecret
     * @param string $frontendBaseUrl
     */
    public function __construct(
        LoggerInterface $logger,
        RequestStack $requestStack,
        string $googleRecaptchaSecret,
        string $appEnv
    ) {
        $this->logger = $logger;
        $this->requestStack = $requestStack;
        $this->googleRecaptchaSecret = $googleRecaptchaSecret;
        $this->appEnv = $appEnv;
    }


    public function validate($value)
    {

        if($this->appEnv !== 'prod'){
            return true;
        }

        $recaptcha = new \ReCaptcha\ReCaptcha($this->googleRecaptchaSecret);
        $resp = $recaptcha->verify($value, $this->requestStack->getCurrentRequest()->getClientIp());

        if ($resp->isSuccess()) {
            return true;
        }

        $this->logger->error(json_encode($resp->getErrorCodes()));

        return false;
    }

}