<?php

namespace App\Mailers;

use App\Models\Ticket;
use Illuminate\Contracts\Mail\Mailer;
use Mail;
class AppMailer
{
    protected $mailer;
    protected $fromAddress = 'support@supportticket.dev';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    /**
     * AppMailer constructor.
     * @param $mailer
     */
    // public function __construct(Mailer $mailer)
    // {
    //     $this->mailer = $mailer;
    // }

    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;

        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";

        $this->view = 'emails.ticket_info';

        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');
        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');
        return $this->deliver();
    }

    public function deliver()
    {
         //dd($this->view, $this->to);
        Mail::send('admin.ticket_system.emails.ticket_info', $this->data, function($message)
    {
        $message
            ->to($this->to)
            ->from($this->fromAddress, $this->fromName)
            ->subject($this->subject);
    });
        /*$this->mailer->send($this->view, $this->data, function($message){

            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);

        });*/
    }
}
