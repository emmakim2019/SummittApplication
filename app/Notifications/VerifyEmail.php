<?php

namespace App\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;


class VerifyEmail extends Notification
{
    /**
     * The first name.
     *
     * @var string
     */
    public $first_name;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        $unauthorizedLn = sprintf(
            'If you did not authorise this request, please contact us at <a href="mailto:%s">%s</a>',
            env('SUPPORT_EMAIL'),
            env('SUPPORT_EMAIL')
        );

        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->greeting(Lang::get('Welcome,'))
            ->line(Lang::get(' Your account on Summit Recruitment has been created.'))
            ->line(Lang::get('In order to complete your registration and log in, please click on “Verify Email Address” to get it activated.'))
            ->action(
                Lang::get('Verify Email Address'),
                $this->verificationUrl($this->user)
            )
            ->line(Lang::get('Kindly ignore this email incase you did not make this request.'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($user)
    {
        return URL::signedRoute('verify.account', ['token' => $user->verifyUser->token]);
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
