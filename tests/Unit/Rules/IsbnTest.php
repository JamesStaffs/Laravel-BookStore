<?php

use App\Rules\Isbn;

test('valid ISBN-10 passes', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '0306406152', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeFalse();
});

test('valid ISBN-13 passes', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '9780306406157', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeFalse();
});

test('empty value fails', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeTrue();
    expect($message)->toContain('required');
});

test('non-numeric fails', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '123456789a', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeTrue();
    expect($message)->toContain('must be numeric');
});

test('wrong length fails', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '123456789', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeTrue();
    expect($message)->toContain('must be 10 or 13 digits');
});

test('ISBN with hyphens passes', function () {
    $rule = new Isbn();
    $failed = false;
    $message = '';
    $rule->validate('isbn', '978-0-306-40615-7', function ($msg) use (&$failed, &$message) {
        $failed = true;
        $message = $msg;
    });
    expect($failed)->toBeFalse();
});