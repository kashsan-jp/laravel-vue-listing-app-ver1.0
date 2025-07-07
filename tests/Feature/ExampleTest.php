<?php

it('returns a successful response', function () {
    $response = $this->get('/Login');

    $response->assertStatus(200);
});
