<?php

    namespace Tests\Feature;

    use App\Http\Controllers\AuthController;
    use App\Listeners\SendEmailNewUserListener;
    use App\Models\User;
    use App\Notifications\NewUserNotification;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Support\Facades\Event;
    use Illuminate\Support\Facades\Notification;
    use Tests\TestCase;

    class AuthControllerTest extends TestCase
    {
        use RefreshDatabase;


        public function test_creating_user(): void
        {
            Event::fake();
            Notification::fake();

            $request = [
                'name'                  => 'Test',
                'email'                 => 'testing@odv.ru',
                'password'              => '12345678',
                'password_confirmation' => '12345678',
            ];

            //   $response = $this->post(route('store'), $request);
            $response = $this->post(action([AuthController::class, 'store']), $request);

            $response->assertRedirect(route('home'));

            $this->assertDatabaseHas('users', ['email' => $request['email']]);

            $user = User::query()->where(['email' => $request['email']])->first();

            Event::assertDispatched(Registered::class);
            Event::assertListening(Registered::class, SendEmailNewUserListener::class);

            $event = new Registered($user);
            $listener = new SendEmailNewUserListener();
            $listener->handle($event);

            Notification::assertSentTo($user, NewUserNotification::class);

            $response->assertRedirect(route('home'));


            $this->assertAuthenticatedAs($user);
        }

    }
