<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveApproval extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $response;
    public $by;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date, $response, $by)
    {
        $this->date = $date;
        $this->response = $response;
        $this->by = $by;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.leave_approval')->with(
            'date',$this->date,
            'response',$this->response,
            'by',$this->by
        );
    }
}
