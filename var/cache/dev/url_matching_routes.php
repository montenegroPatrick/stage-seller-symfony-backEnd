<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/login' => [
            [['_route' => 'app_api_login', '_controller' => 'App\\Controller\\Api\\LoginController::login'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_login_check'], null, null, null, false, false, null],
        ],
        '/api/mail' => [[['_route' => 'app_api_mail', '_controller' => 'App\\Controller\\Api\\MailController::index'], null, ['POST' => 0], null, false, false, null]],
        '/api/matches' => [[['_route' => 'app_api_my_match_add', '_controller' => 'App\\Controller\\Api\\MyMatchController::add'], null, ['POST' => 0], null, false, false, null]],
        '/api/register' => [[['_route' => 'app_api_register', '_controller' => 'App\\Controller\\Api\\RegisterController::index'], null, ['POST' => 0], null, false, false, null]],
        '/api/skills' => [[['_route' => 'app_api_skill', '_controller' => 'App\\Controller\\Api\\SkillController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/api/stages' => [[['_route' => 'app_api_stage_add', '_controller' => 'App\\Controller\\Api\\StageController::add'], null, ['POST' => 0], null, false, false, null]],
        '/api/users/type' => [[['_route' => 'api_users_by_type', '_controller' => 'App\\Controller\\Api\\UserController::getUsersByType'], null, ['GET' => 0], null, false, false, null]],
        '/api/users/suggest' => [[['_route' => 'app_api_user_suggest', '_controller' => 'App\\Controller\\Api\\UserController::getSuggest'], null, ['GET' => 0], null, false, false, null]],
        '/api/users/matches/from' => [[['_route' => 'app_api_user_matches_from', '_controller' => 'App\\Controller\\Api\\UserController::getMatchesFrom'], null, ['GET' => 0], null, false, false, null]],
        '/api/users/matches/to' => [[['_route' => 'app_api_user_matches_to', '_controller' => 'App\\Controller\\Api\\UserController::getMatchesTo'], null, ['GET' => 0], null, false, false, null]],
        '/api/users/matches/mutual' => [[['_route' => 'app_api_matches_mutual', '_controller' => 'App\\Controller\\Api\\UserController::getMutualMatches'], null, ['GET' => 0], null, false, false, null]],
        '/user' => [[['_route' => 'app_backoffice_user_index', '_controller' => 'App\\Controller\\Backoffice\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/new' => [[['_route' => 'app_backoffice_user_new', '_controller' => 'App\\Controller\\Backoffice\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'default', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/log' => [[['_route' => 'app_log', '_controller' => 'App\\Controller\\LogController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|matches/([^/]++)(?'
                        .'|(*:34)'
                    .')'
                    .'|stages/(\\d+)(*:54)'
                    .'|users/(?'
                        .'|(\\d+)(?'
                            .'|(*:78)'
                        .')'
                        .'|(\\d+)/skill(?'
                            .'|(*:100)'
                        .')'
                        .'|(\\d+)/upload(*:121)'
                        .'|(\\d+)/download(*:143)'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:170)'
                    .'|/edit(*:183)'
                    .'|(*:191)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:231)'
                    .'|wdt/([^/]++)(*:251)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:297)'
                            .'|router(*:311)'
                            .'|exception(?'
                                .'|(*:331)'
                                .'|\\.css(*:344)'
                            .')'
                        .')'
                        .'|(*:354)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        34 => [
            [['_route' => 'app_api_my_match_edit', '_controller' => 'App\\Controller\\Api\\MyMatchController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
            [['_route' => 'app_api_my_match_delete', '_controller' => 'App\\Controller\\Api\\MyMatchController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        54 => [[['_route' => 'api_stages_edit', '_controller' => 'App\\Controller\\Api\\StageController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null]],
        78 => [
            [['_route' => 'api_users_read', '_controller' => 'App\\Controller\\Api\\UserController::read'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_edit', '_controller' => 'App\\Controller\\Api\\UserController::edit'], ['id'], ['PUT' => 0, 'PATCH' => 1], null, false, true, null],
        ],
        100 => [
            [['_route' => 'app_api_user_add_skill', '_controller' => 'App\\Controller\\Api\\UserController::addSkill'], ['id'], ['POST' => 0], null, false, false, null],
            [['_route' => 'app_api_user_delete_skill', '_controller' => 'App\\Controller\\Api\\UserController::removeSkill'], ['id'], ['DELETE' => 0], null, false, false, null],
        ],
        121 => [[['_route' => 'api_users_upload', '_controller' => 'App\\Controller\\Api\\UserController::uploadFile'], ['id'], ['POST' => 0], null, false, false, null]],
        143 => [[['_route' => 'api_users_get_file', '_controller' => 'App\\Controller\\Api\\UserController::getFile'], ['id'], ['POST' => 0], null, false, false, null]],
        170 => [[['_route' => 'app_backoffice_user_show', '_controller' => 'App\\Controller\\Backoffice\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        183 => [[['_route' => 'app_backoffice_user_edit', '_controller' => 'App\\Controller\\Backoffice\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        191 => [[['_route' => 'app_backoffice_user_delete', '_controller' => 'App\\Controller\\Backoffice\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        231 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        251 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        297 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        311 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        331 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        344 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        354 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
