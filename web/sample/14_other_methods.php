<?php
/*
 *Other HTTP general methods can be used
*/

<form action="/my/target/route/" method="POST">
	<input type="hidden" name="_method" value="PUT" />
</form>


$app->put('/blog/{id}', function ($id) {
    // ...
});

$app->delete('/blog/{id}', function ($id) {
    // ...
});

$app->patch('/blog/{id}', function ($id) {
    // ...
});

/*
 * match methods samples
*/

$app->match('/blog', function () {
    // ...
});

$app->match('/blog', function () {
    // ...
})
->method('PATCH');

$app->match('/blog', function () {
    // ...
})
->method('PUT|POST');

/*
 * Different Routing variables
*/


$app->get('/blog/{id}', function ($id) {
    // ...
});

$app->get('/blog/{postId}/{commentId}', function ($postId, $commentId) {
    // ...
});

$app->get('/blog/{postId}/{commentId}', function ($commentId, $postId) { // could also do this but not recommended.
    // ...
});

$app->get('/blog/{id}', function (Application $app, Request $request, $id) { //  current Request and Application objects:
    // ...
});

/*
* Default value
*/

$app->get('/{pageName}', function ($pageName) {
    // ...
})
->value('pageName', 'index'); // This will allow matching / route, pageName variable will have the value index. 




?>
