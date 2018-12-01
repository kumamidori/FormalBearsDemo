<?php
declare(strict_types=1);
namespace Fob\FormalBearsDemo\Module\UserList;

use FormalBears\Foundation\Config\Module\AbstractConfigAwareModule;

class UserListModule extends AbstractConfigAwareModule
{
    /**
     * Configure binding
     */
    protected function configure()
    {
        $this->bind()->annotatedWith('app.user_list.api_base_url')->toInstance($this->config['api_base_url']);
        $this->bind()->annotatedWith('app.user_list.names')->toInstance($this->config['names']);
    }

    protected function getConfiguration()
    {
        return new UserListConfiguration();
    }
}
