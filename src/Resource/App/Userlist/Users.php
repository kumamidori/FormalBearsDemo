<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Resource\App\Userlist;

use BEAR\Resource\Code;
use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

class Users extends ResourceObject
{
    use ResourceInject;

    /**
     * @var array
     */
    private $names;

    /**
     * @Inject
     * @Named("names=app.user_list.names")
     */
    public function __construct(array $names)
    {
        $this->names = $names;
    }

    public function onGet() : ResourceObject
    {
        $users = [];
        foreach ($this->names as $name) {
            // 説明用の例なので素朴な実装にしてある
            $users[] = ($this->resource->get->uri('app://self/userlist/user')(['name' => $name]))->body;
        }
        $this->body = $users;
        if (empty($users)) {
            $this->code = Code::NOT_FOUND;
        }

        return $this;
    }
}
