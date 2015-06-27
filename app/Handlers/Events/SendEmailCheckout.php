<?php namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  CheckoutEvent  $event
	 * @return void
	 */
	public function handle(CheckoutEvent $event)
	{
            $user = $event->getUser();
            $order = $event->getOrder();
            
            Mail::send('emails.checkout', ['name' => $user, 'order' => $order], function($message)
            {
                $message->to('lcquinhone@gmail.com', 'John Smith')->subject('Welcome!');
            });
	}

}
