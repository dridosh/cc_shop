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


        public function test_signup_page_ok(): void
        {
            $this->get(action([AuthController::class, 'signUp']))
                ->assertOk()
                ->assertSee('Регистрация')
                ->assertViewIs('auth.sign-up');
        }

        public function test_login_page_ok(): void
        {
            $this->get(action([AuthController::class, 'index']))
                ->assertOk()
                ->assertSee('Вход в аккаунт')
                ->assertViewIs('auth.index');
        }

        public function test_forgot_page_ok(): void
        {
            $this->get(action([AuthController::class, 'forgotPassword']))
                ->assertOk()
                ->assertSee('Восстановление пароля')
                ->assertViewIs('auth.forgot-password');
        }


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

            $this->assertDatabaseMissing('users', ['email' => $request['email']]);

            //   $response = $this->post(route('store'), $request);
            $response = $this->post(action([AuthController::class, 'store']), $request);
            $response->assertValid();

            $this->assertDatabaseHas('users', ['email' => $request['email']]);

            $response->assertRedirect(route('home'));


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

        public function test_signIn_success(): void
        {
            $password = '12345679';
            $user = User::factory()->create(([
                'name'     => 'Name',
                'email'    => 'rt@mail.ru',
                'password' => bcrypt($password),
            ]));
            $request = [
                'email'    => $user->email,
                'password' => $password,
            ];
            $response = $this->post(action([AuthController::class, 'signIn']), $request);
            $response->assertValid()
                ->assertRedirect(route('home'));
            $this->assertAuthenticatedAs($user);
        }

        public function test_logout_success(): void
        {
            $user = User::factory()->create(([
                'email' => 'rt@mail.ru',
            ]));

            $this->actingAs($user)
                ->delete(action([AuthController::class, 'logOut']))
                ->assertRedirect(route('home'));
            $this->assertGuest();
        }

    }
