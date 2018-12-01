<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Module\HttpClient;

use GuzzleHttp\Client;
use Ray\Di\AbstractModule;

class HttpClientModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(Client::class);
    }
}
