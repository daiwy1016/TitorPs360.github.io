<?php

namespace Modules\User\Composers;

use Illuminate\Contracts\View\View;
use Modules\User\Contracts\Authentication;

class ConnectedUserViewComposer
{
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function compose(View $view)
    {
        if ($this->auth->check()) {
            $view->with('userCmp', $this->auth->user());
        }
    }
}
