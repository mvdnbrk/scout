<?php

namespace Laravel\Scout\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Laravel\Scout\Jobs\RemoveFromSearch;
use Illuminate\Database\Eloquent\Collection;

class RemoveFromSearchTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_handle_passes_the_collection_to_engine()
    {
        $job = new RemoveFromSearch($collection = Collection::make([
            $model = m::mock(),
        ]));

        $model->shouldReceive('searchableUsing->delete')->with($collection);

        $job->handle();
    }
}
