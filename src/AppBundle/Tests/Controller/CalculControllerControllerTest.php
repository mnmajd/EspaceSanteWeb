<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculControllerControllerTest extends WebTestCase
{
    public function testCalculimc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'imc');
    }

    public function testCalculimg()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'img');
    }

    public function testCalculpid()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'poidsideal');
    }

}
