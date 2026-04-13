<?php

test('the application root redirects to players', function () {
    $response = $this->get('/');

    $response->assertRedirect('/players');
});
