<?php

namespace CodingSocks\ChunkUploader;

use CodingSocks\ChunkUploader\Identifier\AuthIdentifier;
use CodingSocks\ChunkUploader\Identifier\NopIdentifier;
use CodingSocks\ChunkUploader\Identifier\SessionIdentifier;
use Illuminate\Support\Manager;

class IdentityManager extends Manager
{
    public function createSessionDriver()
    {
        return new SessionIdentifier();
    }

    public function createAuthDriver()
    {
        return new AuthIdentifier();
    }

    public function createNopDriver()
    {
        return new NopIdentifier();
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['chunk-uploader.identifier'];
    }

    /**
     * Set the default mail driver name.
     *
     * @param  string $name
     *
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['chunk-uploader.identifier'] = $name;
    }
}
