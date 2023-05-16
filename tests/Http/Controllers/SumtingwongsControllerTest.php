<?php

use Athphane\Sumtingwong\Models\SumtingwongRecord;
use function Pest\Laravel\assertDatabaseCount;

beforeEach(function () {
    app()->detectEnvironment(function () {
        return 'local';
    });
});

test('can authenticate with sumtingwong if env is local', function () {
    $this->get(route('sumtingwongs.index'))
        ->assertOk();
});

test('can see created  sumtingwong records if authenticated and ordered by latest created', function () {

    SumtingwongRecord::factory()->state([
        'severity' => 'low',
    ])->count(3)->create();

    SumtingwongRecord::factory()->state([
        'severity' => 'high',
        'created_at' => now()->subMinutes(5),
    ])->count(3)->create();

    SumtingwongRecord::factory()->state([
        'severity' => 'medium',
        'created_at' => now()->subMinutes(10),
    ])->count(3)->create();

    $response = $this->get(route('sumtingwongs.index'))
        ->assertOk();

    $response->assertSeeTextInOrder([
        'low',
        'low',
        'low',
        'high',
        'high',
        'high',
        'medium',
        'medium',
        'medium',

    ]);
});

test('can order sumtingwong records by severity', function () {

    SumtingwongRecord::factory()->state([
        'severity' => 'low',
    ])->count(3)->create();

    SumtingwongRecord::factory()->state([
        'severity' => 'high',
    ])->count(3)->create();

    SumtingwongRecord::factory()->state([
        'severity' => 'medium',
    ])->count(3)->create();

    $response = $this->get(route('sumtingwongs.index', ['orderBy' => 'severity']))
        ->assertOk();

    assertDatabaseCount('sumtingwong_entries', 9);

    SumtingwongRecord::all()->each(function ($record) use ($response) {
        $response->assertSee($record->ip);
        $response->assertSee($record->severity);
        $response->assertSee($record->route);
        $response->assertSee($record->created_at->format('d M Y H:i:s'));
    });

    $response->assertSeeTextInOrder([
        'high',
        'high',
        'high',
        'low',
        'low',
        'low',
        'medium',
        'medium',
        'medium',
    ]);
});

test('can see a single sumtingwong record if authenticated', function () {
    $record = SumtingwongRecord::factory()->create();

    $this->get(route('sumtingwongs.show', $record->id))
        ->assertOk()
        ->assertSee(__('Report :id', ['id' => $record->id]))
        ->assertSee($record->ip)
        ->assertSee($record->severity)
        ->assertSee($record->route)
        ->assertSee($record->description)
        ->assertSee(__('Reported at :reported_at', ['reported_at' => $record->created_at->format('d M Y - H:i:s')]));
});

test('can see the latest sumtingwong record if authenticated', function () {
    SumtingwongRecord::factory()->create([
        'created_at' => now()->subMinutes(5),
    ]);

    $latestRecord = SumtingwongRecord::factory()->create();

    $response = $this->get(route('sumtingwongs.latest'))
        ->assertRedirect(route('sumtingwongs.show', $latestRecord->id));

    $this->followRedirects($response)
        ->assertSee(__('Report :id', ['id' => $latestRecord->id]))
        ->assertSee($latestRecord->ip)
        ->assertSee($latestRecord->severity)
        ->assertSee($latestRecord->route)
        ->assertSee($latestRecord->description)
        ->assertSee(__('Reported at :reported_at', ['reported_at' => $latestRecord->created_at->format('d M Y - H:i:s')]));
});
