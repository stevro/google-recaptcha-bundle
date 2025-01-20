# google-recaptcha-bundle

Symfony bundle integrating Google Recaptcha

# Install

Run `composer require stev/google-recaptcha-bundle`

Use `$builder ->add('recaptcha', GoogleRecaptchaV2Type::class, []);` in your forms

In your template add the google script and a parser to inject the captcha response

`<script src="https://www.google.com/recaptcha/api.js" async defer></script>`

`<script type="text/javascript">
        function parseCaptchaResponse(recaptchaReponse) {
            document.getElementById('test_recaptcha').value = recaptchaReponse;
        }
    </script>`

Add the html snippet where you want the captcha to be rendered. Usually in your form before the submit button.

`<div class="g-recaptcha" data-sitekey="{{ google_recaptcha_site_key }}" data-callback="parseCaptchaResponse"></div>`

Uncomment the following config in config/packages/google_recaptcha.yaml

`twig:
    globals:
        google_recaptcha_site_key: '%google_recaptcha_site_key%'`

# Disable on dev

If you want to bypass the validation in dev env then add this env variable `GOOGLE_RECAPTCHA_ENABLED=false`