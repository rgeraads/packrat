<?php

namespace PackratBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExchangeRateControllerTest extends WebTestCase
{
    public function testRefresh()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/refresh');
    }
}
