<?php

namespace Certification\TestBundle;

use Certification\TestBundle\DependencyInjection\TestExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TestBundle extends Bundle
{
	public function getContainerExtension()
	{
		return new TestExtension();
	}
}
