<?php

it('return a successful response', function () {
    $response = $this->get('/');
    $response->assertOk();
});
