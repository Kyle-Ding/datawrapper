<?php

DatawrapperHooks::register(DatawrapperHooks::GET_SETTINGS_PAGES, function() {
    return array(
        'title' => __('Change password'),
        'order' => 10,
        'icon' => 'fa-lock',
        'url' => 'password',
        'controller' => function($app, $context) {
            return function() use ($app, $context) {
                disable_cache($app);
                $user = $context['user'];

                if ($user->getRole() == 'guest') {
                    error_settings_need_login();
                    return;
                }

                $app->render('settings/password.twig', $context);
            };
        }
    );
});
