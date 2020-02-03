<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Testing\Fakes\NotificationFake;

describe('Matcher', function() {
    beforeEach(function() {
        $this->laravel = Mockery::spy(TestCase::class);
    });

    context('Response', function() {
        beforeEach(function() {
            $this->response = Mockery::spy(TestResponse::class);
        });

        describe('toPassSuccessful', function() {
            it('calls assertSuccessful()', function() {
                expect($this->response)->toPassSuccessful();
                $this->response->shouldHaveReceived()->assertSuccessful();
            });
        });

        describe('toPassOk', function() {
            it('calls assertOk()', function() {
                expect($this->response)->toPassOk();
                $this->response->shouldHaveReceived()->assertOk();
            });
        });

        describe('toPassNotFound', function() {
            it('calls assertNotFound()', function() {
                expect($this->response)->toPassNotFound();
                $this->response->shouldHaveReceived()->assertNotFound();
            });
        });

        describe('toPassForbidden', function() {
            it('calls assertForbidden()', function() {
                expect($this->response)->toPassForbidden();
                $this->response->shouldHaveReceived()->assertForbidden();
            });
        });

        describe('toPassUnauthorized', function() {
            it('calls assertUnauthorized()', function() {
                expect($this->response)->toPassUnauthorized();
                $this->response->shouldHaveReceived()->assertUnauthorized();
            });
        });

        describe('toPassStatus', function() {
            it('calls assertStatus()', function() {
                expect($this->response)->toPassStatus(200);
                $this->response->shouldHaveReceived()->assertStatus(200);
            });
        });

        describe('toPassRedirect', function() {
            it('calls assertRedirect()', function() {
                expect($this->response)->toPassRedirect(null);
                $this->response->shouldHaveReceived()->assertRedirect(null);
            });
        });

        describe('toPassHeader', function() {
            it('calls assertHeader()', function() {
                expect($this->response)->toPassHeader('header', null);
                $this->response->shouldHaveReceived()->assertHeader('header', null);
            });
        });

        describe('toPassHeaderMissing', function() {
            it('calls assertHeaderMissing()', function() {
                expect($this->response)->toPassHeaderMissing('header');
                $this->response->shouldHaveReceived()->assertHeaderMissing('header');
            });
        });

        describe('toPassLocation', function() {
            it('calls assertLocation()', function() {
                expect($this->response)->toPassLocation('/');
                $this->response->shouldHaveReceived()->assertLocation('/');
            });
        });

        describe('toPassPlainCookie', function() {
            it('calls assertPlainCookie()', function() {
                expect($this->response)->toPassPlainCookie('cookie', null);
                $this->response->shouldHaveReceived()->assertPlainCookie('cookie', null);
            });
        });

        describe('toPassCookie', function() {
            it('calls assertCookie()', function() {
                expect($this->response)->toPassCookie('cookie', null, true, false);
                $this->response->shouldHaveReceived()->assertCookie('cookie', null, true, false);
            });
        });

        describe('toPassCookieExpired', function() {
            it('calls assertCookieExpired()', function() {
                expect($this->response)->toPassCookieExpired('cookie');
                $this->response->shouldHaveReceived()->assertCookieExpired('cookie');
            });
        });

        describe('toPassCookieNotExpired', function() {
            it('calls assertCookieNotExpired()', function() {
                expect($this->response)->toPassCookieNotExpired('cookie');
                $this->response->shouldHaveReceived()->assertCookieNotExpired('cookie');
            });
        });

        describe('toPassCookieMissing', function() {
            it('calls assertCookieMissing()', function() {
                expect($this->response)->toPassCookieMissing('cookie');
                $this->response->shouldHaveReceived()->assertCookieMissing('cookie');
            });
        });

        describe('toPassSee', function() {
            it('calls assertSee()', function() {
                expect($this->response)->toPassSee('value');
                $this->response->shouldHaveReceived()->assertSee('value');
            });
        });

        describe('toPassSeeInOrder', function() {
            it('calls assertSeeInOrder()', function() {
                expect($this->response)->toPassSeeInOrder([]);
                $this->response->shouldHaveReceived()->assertSeeInOrder([]);
            });
        });

        describe('toPassSeeText', function() {
            it('calls assertSeeText()', function() {
                expect($this->response)->toPassSeeText('value');
                $this->response->shouldHaveReceived()->assertSeeText('value');
            });
        });

        describe('toPassSeeTextInOrder', function() {
            it('calls assertSeeTextInOrder()', function() {
                expect($this->response)->toPassSeeTextInOrder([]);
                $this->response->shouldHaveReceived()->assertSeeTextInOrder([]);
            });
        });

        describe('toPassDontSee', function() {
            it('calls assertDontSee()', function() {
                expect($this->response)->toPassDontSee('value');
                $this->response->shouldHaveReceived()->assertDontSee('value');
            });
        });

        describe('toPassDontSeeText', function() {
            it('calls assertDontSeeText()', function() {
                expect($this->response)->toPassDontSeeText('value');
                $this->response->shouldHaveReceived()->assertDontSeeText('value');
            });
        });

        describe('toPassJson', function() {
            it('calls assertJson()', function() {
                expect($this->response)->toPassJson([], false);
                $this->response->shouldHaveReceived()->assertJson([], false);
            });
        });

        describe('toPassExactJson', function() {
            it('calls assertExactJson()', function() {
                expect($this->response)->toPassExactJson([]);
                $this->response->shouldHaveReceived()->assertExactJson([]);
            });
        });

        describe('toPassJsonFragment', function() {
            it('calls assertJsonFragment()', function() {
                expect($this->response)->toPassJsonFragment([]);
                $this->response->shouldHaveReceived()->assertJsonFragment([]);
            });
        });

        describe('toPassJsonMissing', function() {
            it('calls assertJsonMissing()', function() {
                expect($this->response)->toPassJsonMissing([], false);
                $this->response->shouldHaveReceived()->assertJsonMissing([], false);
            });
        });

        describe('toPassJsonMissingExact', function() {
            it('calls assertJsonMissingExact()', function() {
                expect($this->response)->toPassJsonMissingExact([]);
                $this->response->shouldHaveReceived()->assertJsonMissingExact([]);
            });
        });

        describe('toPassJsonStructure', function() {
            it('calls assertJsonStructure()', function() {
                expect($this->response)->toPassJsonStructure([], null);
                $this->response->shouldHaveReceived()->assertJsonStructure([], null);
            });
        });

        describe('toPassJsonCount', function() {
            it('calls assertJsonCount()', function() {
                expect($this->response)->toPassJsonCount(1, null);
                $this->response->shouldHaveReceived()->assertJsonCount(1, null);
            });
        });

        describe('toPassJsonValidationErrors', function() {
            it('calls assertJsonValidationErrors()', function() {
                expect($this->response)->toPassJsonValidationErrors([]);
                $this->response->shouldHaveReceived()->assertJsonValidationErrors([]);
            });
        });

        describe('toPassJsonMissingValidationErrors', function() {
            it('calls assertJsonMissingValidationErrors()', function() {
                expect($this->response)->toPassJsonMissingValidationErrors(null);
                $this->response->shouldHaveReceived()->assertJsonMissingValidationErrors(null);
            });
        });

        describe('toPassViewIs', function() {
            it('calls assertViewIs()', function() {
                expect($this->response)->toPassViewIs('view');
                $this->response->shouldHaveReceived()->assertViewIs('view');
            });
        });

        describe('toPassViewHas', function() {
            it('calls assertViewHas()', function() {
                expect($this->response)->toPassViewHas('key', null);
                $this->response->shouldHaveReceived()->assertViewHas('key', null);
            });
        });

        describe('toPassViewHasAll', function() {
            it('calls assertViewHasAll()', function() {
                expect($this->response)->toPassViewHasAll([]);
                $this->response->shouldHaveReceived()->assertViewHasAll([]);
            });
        });

        describe('toPassViewMissing', function() {
            it('calls assertViewMissing()', function() {
                expect($this->response)->toPassViewMissing('key');
                $this->response->shouldHaveReceived()->assertViewMissing('key');
            });
        });

        describe('toPassSessionHas', function() {
            it('calls assertSessionHas()', function() {
                expect($this->response)->toPassSessionHas('key', null);
                $this->response->shouldHaveReceived()->assertSessionHas('key', null);
            });
        });

        describe('toPassSessionHasAll', function() {
            it('calls assertSessionHasAll()', function() {
                expect($this->response)->toPassSessionHasAll([]);
                $this->response->shouldHaveReceived()->assertSessionHasAll([]);
            });
        });

        describe('toPassSessionHasInput', function() {
            it('calls assertSessionHasInput()', function() {
                expect($this->response)->toPassSessionHasInput('key', null);
                $this->response->shouldHaveReceived()->assertSessionHasInput('key', null);
            });
        });

        describe('toPassSessionHasErrors', function() {
            it('calls assertSessionHasErrors()', function() {
                expect($this->response)->toPassSessionHasErrors([], null, 'default');
                $this->response->shouldHaveReceived()->assertSessionHasErrors([], null, 'default');
            });
        });

        describe('toPassSessionDoesntHaveErrors', function() {
            it('calls assertSessionDoesntHaveErrors()', function() {
                expect($this->response)->toPassSessionDoesntHaveErrors([], null, 'default');
                $this->response->shouldHaveReceived()->assertSessionDoesntHaveErrors([], null, 'default');
            });
        });

        describe('toPassSessionHasNoErrors', function() {
            it('calls assertSessionHasNoErrors()', function() {
                expect($this->response)->toPassSessionHasNoErrors();
                $this->response->shouldHaveReceived()->assertSessionHasNoErrors();
            });
        });

        describe('toPassSessionHasErrorsIn', function() {
            it('calls assertSessionHasErrorsIn()', function() {
                expect($this->response)->toPassSessionHasErrorsIn('default', [], null);
                $this->response->shouldHaveReceived()->assertSessionHasErrorsIn('default', [], null);
            });
        });

        describe('toPassSessionMissing', function() {
            it('calls assertSessionMissing()', function() {
                expect($this->response)->toPassSessionMissing('key');
                $this->response->shouldHaveReceived()->assertSessionMissing('key');
            });
        });
    });

    context('Authentication', function() {
        describe('toPassAuthenticated', function() {
            it('calls assertAuthenticated()', function() {
                expect($this->laravel)->toPassAuthenticated(null);
                $this->laravel->shouldHaveReceived()->assertAuthenticated(null);
            });
        });

        describe('toPassGuest', function() {
            it('calls assertGuest()', function() {
                expect($this->laravel)->toPassGuest(null);
                $this->laravel->shouldHaveReceived()->assertGuest(null);
            });
        });

        describe('toPassAuthenticatedAs', function() {
            it('calls assertAuthenticatedAs()', function() {
                $user = new User();
                expect($this->laravel)->toPassAuthenticatedAs($user, null);
                $this->laravel->shouldHaveReceived()->assertAuthenticatedAs($user, null);
            });
        });

        describe('toPassCredentials', function() {
            it('calls assertCredentials()', function() {
                expect($this->laravel)->toPassCredentials([], null);
                $this->laravel->shouldHaveReceived()->assertCredentials([], null);
            });
        });

        describe('toPassInvalidCredentials', function() {
            it('calls assertInvalidCredentials()', function() {
                expect($this->laravel)->toPassInvalidCredentials([], null);
                $this->laravel->shouldHaveReceived()->assertInvalidCredentials([], null);
            });
        });
    });

    context('Database', function() {
        describe('toPassDatabaseHas', function() {
            it('calls assertDatabaseHas()', function() {
                $this->laravel->shouldAllowMockingProtectedMethods();
                expect($this->laravel)->toPassDatabaseHas('table', [], null);
                $this->laravel->shouldHaveReceived()->assertDatabaseHas('table', [], null);
            });
        });

        describe('toPassDatabaseMissing', function() {
            it('calls assertDatabaseMissing()', function() {
                $this->laravel->shouldAllowMockingProtectedMethods();
                expect($this->laravel)->toPassDatabaseMissing('table', [], null);
                $this->laravel->shouldHaveReceived()->assertDatabaseMissing('table', [], null);
            });
        });

        describe('toPassSoftDeleted', function() {
            it('calls assertSoftDeleted()', function() {
                $this->laravel->shouldAllowMockingProtectedMethods();
                expect($this->laravel)->toPassSoftDeleted('table', [], null);
                $this->laravel->shouldHaveReceived()->assertSoftDeleted('table', [], null);
            });
        });
    });

    context('Notification', function() {
        beforeEach(function() {
            $this->notification = Mockery::spy(NotificationFake::class);
        });

        describe('toPassNothingSent', function() {
            it('calls assertNothingSent()', function() {
                expect($this->notification)->toPassNothingSent();
                $this->notification->shouldHaveReceived()->assertNothingSent();
            });
        });

        describe('toPassSentTo', function() {
            it('calls assertSentTo()', function() {
                expect($this->notification)->toPassSentTo('notifiable', 'notification', null);
                $this->notification->shouldHaveReceived()->assertSentTo('notifiable', 'notification', null);
            });
        });

        describe('toPassNotSentTo', function() {
            it('calls assertNotSentTo()', function() {
                expect($this->notification)->toPassNotSentTo('notifiable', 'notification', null);
                $this->notification->shouldHaveReceived()->assertNotSentTo('notifiable', 'notification', null);
            });
        });

        describe('toPassSentToTimes', function() {
            it('calls assertSentToTimes()', function() {
                expect($this->notification)->toPassSentToTimes('notifiable', 'notification', 3);
                $this->notification->shouldHaveReceived()->assertSentToTimes('notifiable', 'notification', 3);
            });
        });

        describe('toPassTimesSent', function() {
            it('calls assertTimesSent()', function() {
                expect($this->notification)->toPassTimesSent(3, 'notification');
                $this->notification->shouldHaveReceived()->assertTimesSent(3, 'notification');
            });
        });
    });
});
