<?php namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;

use Illuminate\Queue\SerializesModels;

class CheckoutEvent extends Event {

	use SerializesModels;

	private $user;
        private $order;
        
	public function __construct($user, $order)
	{
            $this->user = $user;
            $this->order = $order;
	}
        
        public function getUser(){return $this->user;}

        public function getOrder(){return $this->order;}
}
