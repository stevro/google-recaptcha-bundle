<?php

namespace Stev\GoogleRecaptchaBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class StevGoogleRecaptchaBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return __DIR__;
    }
}