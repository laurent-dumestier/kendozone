<?php

namespace App\Notifications;

use App\Tournament;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class InviteCompetitor extends Notification
{
    use Queueable;

    protected $user, $tournament, $code, $category;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param Tournament $tournament
     * @param $code
     * @param null $category
     */
    public function __construct(User $user, Tournament $tournament, $code, $category = null)
    {
        $this->user = $user;
        $this->tournament = $tournament;
        $this->code = $code;
        $this->category = $category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $subject = trans('mail.invite_to_tournament') . ": " . $this->tournament->name;
        $message = (new MailMessage)
            ->subject($subject)
            ->greeting(trans('mail.dear_kenshi'))
            ->line(trans('mail.you_are_invited_to_tournament') . ":" . $this->tournament->name);

        if ($this->tournament->venue_id != null) {
            $message
                ->line("<strong>".trans('core.venue') . ': </strong>' . $this->tournament->venue->name)
                ->line("<strong>".trans('core.address') . ': </strong>' . $this->tournament->venue->address);
        }
        $message
            ->line(trans("<strong>".trans('core.eventDateIni') . ': </strong>' . $this->tournament->dateIni))
            ->line(trans("<strong>".trans('core.eventDateFin') . ': </strong>' . $this->tournament->dateFin));

        if ($this->tournament->cost != null) {
            $message->line("<strong>".trans('core.cost') . ': </strong>' . $this->tournament->cost);
        }

        if ($this->tournament->registerDateLimit != null && $this->tournament->registerDateLimit != '0000-00-00') {
            $message->line("<strong>".trans('core.limitDateRegistration') . ': </strong>' . $this->tournament->limitDateRegistration);
        }
        if (isset($this->category)) {
            $message->line("<strong>".trans('mail.you_have_been_preregistered')."</strong>")
                ->line('- ' . $this->category);
        } else {
            $message->action(trans('mail.confirm_registration'), URL::action('ChampionshipController@create', ['tournamentSlug' => $this->tournament->slug, 'token' => $this->code]));
        }
        if ($this->user->password != null) {
            $message->line("<strong>".trans('mail.your_connection_data') . ":</strong>")
                ->line("<strong>".trans('core.username') . ":</strong>" . $this->user->email)
                ->line("<strong>".trans('core.password') . ":</strong>" . $this->user->clearPassword);
        }
//        $message->line("<strong>".trans('mail.dont_forget_to_pay'));


        if ($this->tournament->registerDateLimit != null && $this->tournament->registerDateLimit != '0000-00-00') {
            $message->line(trans('mail.before_day'). $this->tournament->registerDateLimit);
        }

        $message->line(trans('core.thanks'));

        return $message;
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
