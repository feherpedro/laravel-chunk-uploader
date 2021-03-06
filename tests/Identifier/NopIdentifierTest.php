<?php

namespace CodingSocks\ChunkUploader\Tests\Identifier;

use CodingSocks\ChunkUploader\Identifier\NopIdentifier;
use PHPUnit\Framework\TestCase;

class NopIdentifierTest extends TestCase
{
    /**
     * @var \CodingSocks\ChunkUploader\Identifier\SessionIdentifier
     */
    private $identifier;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identifier = new NopIdentifier();
    }

    public function testGenerateIdentifier()
    {
        $identifier = $this->identifier->generateIdentifier('any_string');
        $this->assertEquals('any_string', $identifier);
    }

    public function testUploadedFileIdentifierName()
    {
        $identifier = $this->identifier->generateFileIdentifier(200, 'any_filename.ext');
        $this->assertEquals('200_any_filename.ext', $identifier);
    }
}
