# google-recaptcha-bundle

Symfony bundle integrating Google Recaptcha

# Install
run `composer require stev/google-recaptcha-bundle`

use `$builder ->add('recaptcha', GoogleRecaptchaV2Type::class, []);` in your forms

in your template add the google script and a parser to inject the captcha response

`<script src="https://www.google.com/recaptcha/api.js" async defer></script>`

`<script type="text/javascript">
        function parseCaptchaResponse(recaptchaReponse) {
            document.getElementById('test_recaptcha').value = recaptchaReponse;
        }
    </script>`

# Disable on dev
If you want to bypass the validation in dev env then add this env variable `GOOGLE_RECAPTCHA_ENABLED=false`