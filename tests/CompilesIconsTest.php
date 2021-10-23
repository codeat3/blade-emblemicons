<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeEmblemicons\BladeEmblemiconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('emblem-alert')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V13.2H13V6ZM13 15.6H11V18H13V15.6Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('emblem-alert', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V13.2H13V6ZM13 15.6H11V18H13V15.6Z" fill="currentColor"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('emblem-alert', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V13.2H13V6ZM13 15.6H11V18H13V15.6Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-emblemicons.class', 'awesome');

        $result = svg('emblem-alert')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V13.2H13V6ZM13 15.6H11V18H13V15.6Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-emblemicons.class', 'awesome');

        $result = svg('emblem-alert', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 6H11V13.2H13V6ZM13 15.6H11V18H13V15.6Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeEmblemiconsServiceProvider::class,
        ];
    }
}
