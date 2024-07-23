<?php

function isXSS($input) {
    // Check for common XSS patterns
    return preg_match('/<script>|<\/script>/', $input);
}

function isSQLInjection($input) {
    // Check for common SQL injection patterns
    $sqlInjectionPatterns = ['/\'/', '/\"/', '/\;/', '/\-\-/'];
    foreach ($sqlInjectionPatterns as $pattern) {
        if (preg_match($pattern, $input)) {
            return true;
        }
    }
    return false;
}
?>
