<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Userlist;

use BEAR\Resource\ResourceObject;
use GuzzleHttp\Client;
use Koriym\HttpConstants\StatusCode;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

class User extends ResourceObject
{
    /**
     * @var string
     */
    private static $API_BASE_URL;

    const PATH = '/users';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var array
     */
    private $users;

    /**
     * @Inject
     * @Named("baseUrl=app.user_list.api_base_url")
     *
     * @param string $baseUrl
     */
    public function __construct(Client $client, string $baseUrl)
    {
        $this->client = $client;
        self::$API_BASE_URL = $baseUrl;
    }

    public function onGet(string $name) : ResourceObject
    {
        // 説明用の例なので素朴な実装にしてある
        $url = sprintf('%s%s/%s', self::$API_BASE_URL, self::PATH, $name);
        $res = $this->client->get($url);
        if ($res->getStatusCode() !== StatusCode::OK) {
            throw new \RuntimeException();
        }
        $resContents = $res->getBody()->getContents();
        $this->body = json_decode($resContents, true);

        return $this;
    }
}
