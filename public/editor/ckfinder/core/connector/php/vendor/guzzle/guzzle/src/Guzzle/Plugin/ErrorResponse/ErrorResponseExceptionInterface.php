<?php

namespace Guzzle\Plugin\ErrorResponse;

use Guzzle\Service\Command\CommandInterface;
use Guzzle\Http\Message\Response;

/**
 * Interface used to create an exception from an errors response
 */
interface ErrorResponseExceptionInterface
{
    /**
     * Create an exception for a command based on a command and an errors response definition
     *
     * @param CommandInterface $command  Command that was sent
     * @param Response         $response The errors response
     *
     * @return self
     */
    public static function fromCommand(CommandInterface $command, Response $response);
}
