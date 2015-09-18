<?php
/**
 * This is a Idun front controller for my personal site.
 *
 */

// Get the enviroment, autoloader and the $app object
require __DIR__.'/config_with_app.php';

// Inject the comment service into the app
$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});


// Set link creation to 'clean' for a nice, clean link displayment
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

// Add site specifik configurations
$app->theme->configure(ANAX_APP_PATH . '/config/theme_me.php');

// Add site specifik navbar
$app->navbar->configure(ANAX_APP_PATH . '/config/navbar_me.php');




// Home rout, the 'me' page
$app->router->add('', function() use ($app) {
    
    $app->theme->addStylesheet('css/form.css');
    $app->theme->addStylesheet('css/comment.css');
    $app->theme->setTitle("Om mig");
    
    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
    
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
    
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params'    => ['me'],
    ]);
    
    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
        'pagekey'   => 'me',
    ]);

});

// Rout to SmallTalk, the discussion page
$app->router->add('smalltalk', function() use ($app) {

    $app->theme->addStylesheet('css/form.css');
    $app->theme->addStylesheet('css/comment.css');
    $app->theme->setTitle("Välkommen till SmallTalk");
    $app->views->add('comment/index');

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params'    => ['smalltalk'],
    ]);

    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
        'pagekey'   => 'smalltalk',
    ]);
    
});

// Rout to show site for reports
$app->router->add('redovisning', function() use ($app) {
    
    $app->theme->setTitle("Redovisning");
    
    $content = $app->fileContent->get('report.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    
    $byline  = $app->fileContent->get('byline.md');
    $byline  = $app->textFilter->doFilter($byline, 'shortcode, markdown');
    
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);

});

// Rout to show source code
$app->router->add('source', function() use ($app) {
    
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
    
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..',
        'base_dir' => '..',
        'add_ignore' => ['.htaccess'],
    ]);
    
    $app->views->add('me/source', [
       'content' => $source->View(), 
    ]);

});




// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Leave the rest to the rendering phase
$app->theme->render();