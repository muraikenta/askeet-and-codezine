<?php
// auto-generated by sfRoutingConfigHandler
// date: 2014/01/09 11:10:55
$routes = sfRouting::getInstance();
$routes->setRoutes(
array (
  'question' => 
  array (
    0 => '/question/:stripped_title',
    1 => '#^/question(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'stripped_title',
    ),
    3 => 
    array (
      'stripped_title' => 1,
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'show',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'popular_questions' => 
  array (
    0 => '/index/:page',
    1 => '#^/index(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'page',
    ),
    3 => 
    array (
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'list',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'recent_questions' => 
  array (
    0 => '/question/recent/:page',
    1 => '#^/question/recent(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'page',
    ),
    3 => 
    array (
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'recent',
      'page' => 1,
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'add_question' => 
  array (
    0 => '/add_question',
    1 => '#^/add_question$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'add',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'recent_answers' => 
  array (
    0 => '/recent/answers/:page',
    1 => '#^/recent/answers(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'page',
    ),
    3 => 
    array (
      'page' => 1,
    ),
    4 => 
    array (
      'module' => 'answer',
      'action' => 'recent',
      'page' => 1,
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'add_answer' => 
  array (
    0 => '/add_answer',
    1 => '#^/add_answer$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'answer',
      'action' => 'add',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'login' => 
  array (
    0 => '/login',
    1 => '#^/login$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'login',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'logout' => 
  array (
    0 => '/logout',
    1 => '#^/logout$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'logout',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'user_profile' => 
  array (
    0 => '/user/:nickname',
    1 => '#^/user(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'nickname',
    ),
    3 => 
    array (
      'nickname' => 1,
    ),
    4 => 
    array (
      'module' => 'user',
      'action' => 'show',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'homepage' => 
  array (
    0 => '/',
    1 => '/^[\\/]*$/',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'question',
      'action' => 'list',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_symfony' => 
  array (
    0 => '/symfony/:action/*',
    1 => '#^/symfony(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'action',
    ),
    3 => 
    array (
      'action' => 1,
    ),
    4 => 
    array (
      'module' => 'default',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_index' => 
  array (
    0 => '/:module',
    1 => '#^(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'module',
    ),
    3 => 
    array (
      'module' => 1,
    ),
    4 => 
    array (
      'action' => 'list',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default' => 
  array (
    0 => '/:module/:action/*',
    1 => '#^(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'module',
      1 => 'action',
    ),
    3 => 
    array (
      'module' => 1,
      'action' => 1,
    ),
    4 => 
    array (
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
)
);
