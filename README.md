# laravel-kahlan4

[![Latest Stable Version](https://poser.pugx.org/midnightsuyama/laravel-kahlan4/version)](https://packagist.org/packages/midnightsuyama/laravel-kahlan4)
[![Build Status](https://github.com/midnightSuyama/laravel-kahlan4/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/midnightSuyama/laravel-kahlan4/actions?query=workflow%3ATests+branch%3Amaster)

Kahlan specs suite for Laravel

## Features

* Support Laravel test methods
* Support Laravel test traits
* Support Laravel test assertions

## Installation

    $ composer require --dev midnightsuyama/laravel-kahlan4

## Usage

Add this line to your [kahlan-config.php](https://kahlan.github.io/docs/config-file.html) file (create it if necessary):

```php
<?php

LaravelKahlan4\Config::bootstrap($this);
```

and

    $ ./vendor/bin/kahlan

### Example

```php
<?php
// spec/User.spec.php

describe('User', function() {
    it('has a name "example"', function() {
        $user = factory(App\User::class)->make(['name' => 'xample']);
        expect($user['name'])->toEqual('example');
    });
});
```

```
$ ./vendor/bin/kahlan
            _     _
  /\ /\__ _| |__ | | __ _ _ __
 / //_/ _` | '_ \| |/ _` | '_ \
/ __ \ (_| | | | | | (_| | | | |
\/  \/\__,_|_| |_|_|\__,_|_| |_|

The PHP Test Framework for Freedom, Truth and Justice.

src directory  :
spec directory : /spec

F                                                                   1 / 1 (100%)


User
  ✖ it has a name "example"
    expect->toEqual() failed in `./spec/User.spec.php` line 7

    It expect actual to be equal to expected (==).

    actual:
      (string) "xample"
    expected:
      (string) "example"


Expectations   : 1 Executed
Specifications : 0 Pending, 0 Excluded, 0 Skipped

Passed 0 of 1 FAIL (FAILURE: 1) in 0.817 seconds (using 20MB)
```

## Method

```php
$response = $this->laravel->get('/');
```

`$this->laravel` is an instance of `Illuminate\Foundation\Testing\TestCase` subclass. It can call test methods of `Illuminate\Foundation\Testing\Concerns`.

## Trait

```php
use Illuminate\Foundation\Testing\RefreshDatabase;

describe('User table', function() {
    beforeAll(function() {
        $this->laravel->useTrait(RefreshDatabase::class);
    });

    it('has no records', function() {
        $count = App\User::count();
        expect($count)->toEqual(0);
    });
});
```

Call `$this->laravel->useTrait()` in `beforeAll`, if you want to use test traits. That trait is set before `beforeEach` is called.

### Support traits

* Illuminate\Foundation\Testing\RefreshDatabase
* Illuminate\Foundation\Testing\DatabaseMigrations
* Illuminate\Foundation\Testing\DatabaseTransactions
* Illuminate\Foundation\Testing\WithoutMiddleware
* Illuminate\Foundation\Testing\WithoutEvents
* Illuminate\Foundation\Testing\WithFaker

## Matcher

Provied custom matchers. `toPass*` matcher is paired with `assert*` assertion by Laravel.

### Response

```php
describe('Response', function() {
    it('has a 200 status code', function() {
        $response = $this->laravel->get('/');
        expect($response)->toPassStatus(200);
    });
});
```

|Matcher|Description|
|:---|:---|
|toPassSuccessful()|The response has a successful status code.|
|toPassOk()|The response has a 200 status code.|
|toPassNotFound()|The response has a not found status code.|
|toPassForbidden()|The response has a forbidden status code.|
|toPassUnauthorized()|The response has an unauthorized status code.|
|toPassCreated()|The response has a 201 status code.
|toPassNoContent(_$status_ = 204)|The response has the given status code and no content.
|toPassStatus(_$status_)|The response has the given status code.|
|toPassRedirect(_$uri_ = null)|The response is redirecting to a given URI.|
|toPassHeader(_$headerName_, _$value_ = null)|The response contains the given header and equals the optional value.|
|toPassHeaderMissing(_$headerName_)|The response does not contains the given header.|
|toPassLocation(_$uri_)|The current location header matches the given URI.|
|toPassPlainCookie(_$cookieName_, _$value_ = null)|The response contains the given cookie and equals the optional value.|
|toPassCookie(_$cookieName_, _$value_ = null, _$encrypted_ = true, _$unserialize_ = false)|The response contains the given cookie and equals the optional value.|
|toPassCookieExpired(_$cookieName_)|The response contains the given cookie and is expired.|
|toPassCookieNotExpired(_$cookieName_)|The response contains the given cookie and is not expired.|
|toPassCookieMissing(_$cookieName_)|The response does not contains the given cookie.|
|toPassSee(_$value_)|The given string is contained within the response.|
|toPassSeeInOrder(array _$values_)|The given strings are contained in order within the response.|
|toPassSeeText(_$value_)|The given string is contained within the response text.|
|toPassSeeTextInOrder(array _$values_)|The given strings are contained in order within the response text.|
|toPassDontSee(_$value_)|The given string is not contained within the response.|
|toPassDontSeeText(_$value_)|The given string is not contained within the response text.|
|toPassJson(array _$data_, _$strict_ = false)|The response is a superset of the given JSON.|
|toPassExactJson(array _$data_)|The response has the exact given JSON.|
|toPassJsonFragment(array _$data_)|The response contains the given JSON fragment.|
|toPassJsonMissing(array _$data_, _$exact_ = false)|The response does not contain the given JSON fragment.|
|toPassJsonMissingExact(array _$data_)|The response does not contain the exact JSON fragment.|
|toPassJsonPath(_$path_, _$expect_, _$strict_ = false)|The expected value exists at the given path in the response.
|toPassJsonStructure(array _$structure_ = null, _$responseData_ = null)|The response has a given JSON structure.|
|toPassJsonCount(int _$count_, _$key_ = null)|The response JSON has the expected count of items at the given key.|
|toPassJsonValidationErrors(_$errors_)|The response has the given JSON validation errors.|
|toPassJsonMissingValidationErrors(_$keys_ = null)|The response has no JSON validation errors for the given keys.|
|toPassViewIs(_$value_)|The response view equals the given value.|
|toPassViewHas(_$key_, _$value_ = null)|The response view has a given piece of bound data.|
|toPassViewHasAll(array _$bindings_)|The response view has a given list of bound data.|
|toPassViewMissing(_$key_)|The response view is missing a piece of bound data.|
|toPassSessionHas(_$key_, _$value_ = null)|The session has a given value.|
|toPassSessionHasAll(array _$bindings_)|The session has a given list of values.|
|toPassSessionHasInput(_$key_, _$value_ = null)|The session has a given value in the flashed input array.|
|toPassSessionHasErrors(_$keys_ = [], _$format_ = null, _$errorBag_ = 'default')|The session has the given errors.|
|toPassSessionDoesntHaveErrors(_$keys_ = [], _$format_ = null, _$errorBag_ = 'default')|The session is missing the given errors.|
|toPassSessionHasNoErrors()|The session has no errors.|
|toPassSessionHasErrorsIn(_$errorBag_, _$keys_ = [], _$format_ = null)|The session has the given errors.|
|toPassSessionMissing(_$key_)|The session does not have a given key.|

### Authentication

```php
describe('User', function() {
    it('is authenticated', function() {
        $user = factory(App\User::class)->make();
        $this->laravel->actingAs($user);
        expect($this->laravel)->toPassAuthenticated();
    });
});
```

|Matcher|Description|
|:---|:---|
|toPassAuthenticated(_$guard_ = null)|The user is authenticated.|
|toPassGuest(_$guard_ = null)|The user is not authenticated.|
|toPassAuthenticatedAs(_$user_, _$guard_ = null)|The user is authenticated as the given user.|
|toPassCredentials(array _$credentials_, _$guard_ = null)|The given credentials are valid.|
|toPassInvalidCredentials(array _$credentials_, _$guard_ = null)|The given credentials are invalid.|

### Database

```php
describe('User table', function() {
    it('has records', function() {
        $user = factory(App\User::class)->create();
        expect($this->laravel)->toPassDatabaseHas('users', ['email' => $user['email']]);
    });
});
```

|Matcher|Description|
|:---|:---|
|toPassDatabaseHas(_$table_, array _$data_, _$connection_ = null)|A given where condition exists in the database.|
|toPassDatabaseMissing(_$table_, array _$data_, _$connection_ = null)|A given where condition does not exist in the database.|
|toPassSoftDeleted(_$table_, array _$data_ = [], _$connection_ = null)|The given record has been deleted.|

### Notification

```php
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;

describe('User', function() {
    it('is notified', function() {
        $notification = Notification::fake();
        expect($notification)->toPassNothingSent();

        $user = factory(App\User::class)->create();
        $user->notify(new VerifyEmail);
        expect($notification)->toPassSentTo($user, VerifyEmail::class);
    });
});
```

|Matcher|Description|
|:---|:---|
|toPassNothingSent()|No notifications were sent.|
|toPassSentTo(_$notifiable_, _$notification_, _$callback_ = null)|The given notification was sent based on a truth-test callback.|
|toPassNotSentTo(_$notifiable_, _$notification_, _$callback_ = null)|The given notification was not sent based on a truth-test callback.|
|toPassSentToTimes(_$notifiable_, _$notification_, _$times_ = 1)|The given notification was sent a number of times.|
|toPassTimesSent(_$expectedCount_, _$notification_)|The total amount of times a notification was sent.|

## Test

```
$ cd test-project
$ composer install
$ touch database/database.sqlite
$ php artisan migrate --env=testing
$ ./vendor/bin/kahlan
            _     _
  /\ /\__ _| |__ | | __ _ _ __
 / //_/ _` | '_ \| |/ _` | '_ \
/ __ \ (_| | | | | | (_| | | | |
\/  \/\__,_|_| |_|_|\__,_|_| |_|

The PHP Test Framework for Freedom, Truth and Justice.

src directory  :
spec directory : /test-project/spec

.............................................................     61 / 61 (100%)



Expectations   : 61 Executed
Specifications : 0 Pending, 0 Excluded, 0 Skipped

Passed 61 of 61 PASS in 7.760 seconds (using 37MB)
```

## License

Licensed using the [MIT license](https://opensource.org/licenses/MIT).

## Acknowledgments

Inspired by [sofa/laravel-kahlan](https://github.com/jarektkaczyk/laravel-kahlan).
