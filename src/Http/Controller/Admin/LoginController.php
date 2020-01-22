<?php

namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation\NavigationCollection;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoginController extends PublicController
{

    /**
     * Return the admin login form.
     *
     * @param NavigationCollection $navigation
     * @return \Illuminate\Http\Response
     */
    public function login(NavigationCollection $navigation)
    {
        /*
         * If we're already logged in
         * proceed to the dashboard.
         *
         * Replace this later with a
         * configurable landing page.
         */
        if (auth()->check() && $home = $navigation->first()) {
            return redirect($home->getHref());
        }

        template([
            'meta_title' => trans('anomaly.module.users::breadcrumb.login')
        ]);

        return view('theme::login');
    }

    /**
     * Log the user out.
     *
     * @param  UserAuthenticator $authenticator
     * @return \Illuminate\Http\RedirectResponse|Redirector
     */
    public function logout(UserAuthenticator $authenticator)
    {
        if (!auth()->guest()) {
            $authenticator->logout();
        }

        messages()->success('anomaly.module.users::message.logged_out');

        return redirect('admin/login');
    }
}
