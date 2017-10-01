<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Commands\TwitterStreamCommand;
use Spatie\TwitterStreamingApi\PublicStream;
use Spatie\LaravelTwitterStreamingApi\TwitterStreamingApi;
use Mockery;

class TwitterStreamCommandTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /** @test */
    public function it_hears_twitter_stream(): void
    {
        $name = ($command = new TwitterStreamCommand())->getName();
        $hears = 'laravel-zero';

        $twitterStreamingApi = Mockery::mock(TwitterStreamingApi::class);
        $publicStream = Mockery::mock(PublicStream::class);

        $twitterStreamingApi->shouldReceive('publicStream')
            ->once()
            ->andReturn($publicStream);

        $publicStream->shouldReceive('whenHears')
            ->once()
            ->with($hears, Mockery::type('closure'))
            ->andReturn($publicStream);

        $publicStream->shouldReceive('startListening')
            ->once();

        $this->app->getContainer()
            ->instance('laravel-twitter-streaming-api', $twitterStreamingApi);

        $this->app->call($name, ['hears' => $hears]);
    }
}
