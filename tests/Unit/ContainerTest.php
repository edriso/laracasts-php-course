<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // testing steps
        // arrange
            //instantiate a class, build up a dependency, or whatever you need to arrange
        $container = new Container();

        $container->bind('foo', fn () => 'bar');

        // act
            //perform your action, do whatever it is that you're trying to test
        $result = $container->resolve('foo');

        // assert/expect
            //this is where you confirm whether or not it actually worked
        expect($result)->toBe('bar');
        expect($result)->toEqual('bar');
})->only();