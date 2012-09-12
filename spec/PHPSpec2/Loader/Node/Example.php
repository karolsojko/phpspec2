<?php

namespace spec\PHPSpec2\Loader\Node;

use PHPSpec2\Specification;

class Example implements Specification
{
    /**
     * @param Prophet $function mock of ReflectionFunctionAbstract
     */
    function described_with($function)
    {
        $this->example->isAnInstanceOf('PHPSpec2\Loader\Node\Example', array(
            'test example', $function
        ));
    }

    function it_should_have_title()
    {
        $this->example->getTitle()->shouldReturn('test example');
    }

    function it_should_have_mapped_function($function)
    {
        $this->example->getFunction()->shouldReturn($function);
    }

    function it_should_not_have_prefunctions_by_default()
    {
        $this->example->getPreFunctions()->shouldHaveCount(0);
    }

    function it_should_not_have_postfunctions_by_default()
    {
        $this->example->getPostFunctions()->shouldHaveCount(0);
    }

    function it_could_have_prefunctions($function)
    {
        $this->example->addPreFunction($function);
        $this->example->getPreFunctions()->shouldHaveCount(1);
    }

    function it_could_have_postfunctions($function)
    {
        $this->example->addPostFunction($function);
        $this->example->getPostFunctions()->shouldHaveCount(1);
    }
}
