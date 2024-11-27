<?php

namespace Municipio;

use PHPUnit\Framework\TestCase;
use WpService\Implementations\FakeWpService;
use Municipio\TestUtils\WpMockFactory;

/**
 * @group wp_mock
 */
class CustomizerTest extends TestCase
{
    /**
     * @testdox sanitizeKirkiDefaultArrayValue converts empty string value to array if default is array
     */
    public function testSanitizeKirkiDefaultArrayValueConvertsEmptyStringValueToArrayIfDefaultIsArray()
    {
        $wpService = new FakeWpService([
          'addFilter' => true,
          'addAction' => true
        ]);
        $wpdb      = WpMockFactory::createWpdb([]);

        $value      = '';
        $default    = ['foo' => 'bar'];
        $customizer = new \Municipio\Customizer(
            $wpService,
            $wpdb
        );

        $sanitizedValue = $customizer->sanitizeKirkiDefaultArrayValue($value, $default);

        $this->assertEquals(['foo' => 'bar'], $sanitizedValue);
    }
}