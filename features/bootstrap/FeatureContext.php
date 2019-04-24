<?php

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo 
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 * 
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When a demo scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path)
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }


    /**
     * @When I load the :arg1
     */
    public function iLoadThe($arg1)
    {
        if($this->response = $this->kernel->handle(Request::create($arg1, 'GET'))){
            
        }else{
            throw new \RuntimeException('La page ne c\'est pas lancé');
        }
    }

    /**
     * @Then the page containe :arg1
     */
    public function thePageContaine($arg1)
    {
        if (strpos($this->response->getContent(), $arg1) == false) {
            throw new \RuntimeException('La page n\'est pas valide');  
        }
        
    }

     /**
     * @Then the page not containe :arg1
     */
    public function thePageNotContaine($arg1)
    {
        if (strpos($this->response->getContent(), $arg1) == true) {
            throw new \RuntimeException('La page n\'est pas valide');  
        }
        
    }

}
