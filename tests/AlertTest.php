<?php

use SquareBoat\Alert\Alert;

class AlertTest extends PHPUnit_Framework_TestCase
{
    /**
     * The session store implementation.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * The package's alert implementation.
     *
     * @var \SquareBoat\Alert\Alert
     */
    protected $alert;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        $this->session = Mockery::mock('Illuminate\Session\Store');

        $this->alert = new Alert($this->session);
    }

    /** @test */
    public function it_displays_default_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => 'This is a default message',
            'title'             => 'Title',
            'type'              => 'info',
        ];

        $this->session->shouldReceive('flash')->with('sweet_alert.text', $expectedConfig['text']);
        $this->session->shouldReceive('flash')->with('sweet_alert.title', $expectedConfig['title']);
        $this->session->shouldReceive('flash')->with('sweet_alert.type', $expectedConfig['type']);
        $this->session->shouldReceive('flash')->with('sweet_alert.showConfirmButton', $expectedConfig['showConfirmButton']);
        $this->session->shouldReceive('flash')->with('sweet_alert.timer', $expectedConfig['timer']);
        $this->session->shouldReceive('flash')->with('sweet_alert.allowOutsideClick', $expectedConfig['allowOutsideClick']);
        $this->session->shouldReceive('flash')->with('sweet_alert.alert', json_encode($expectedConfig));

        $this->alert->message('This is a default message', 'Title', 'info');
    }

    /** @test */
    public function it_displays_info_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => 'This is a info message',
            'title'             => 'Title',
            'type'              => 'info',
        ];

        $this->session->shouldReceive('flash')->with('sweet_alert.text', $expectedConfig['text']);
        $this->session->shouldReceive('flash')->with('sweet_alert.title', $expectedConfig['title']);
        $this->session->shouldReceive('flash')->with('sweet_alert.type', $expectedConfig['type']);
        $this->session->shouldReceive('flash')->with('sweet_alert.showConfirmButton', $expectedConfig['showConfirmButton']);
        $this->session->shouldReceive('flash')->with('sweet_alert.timer', $expectedConfig['timer']);
        $this->session->shouldReceive('flash')->with('sweet_alert.allowOutsideClick', $expectedConfig['allowOutsideClick']);
        $this->session->shouldReceive('flash')->with('sweet_alert.alert', json_encode($expectedConfig));

        $this->alert->info('This is a info message', 'Title');
    }

    /** @test */
    public function it_displays_success_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => 'This is a success message',
            'title'             => 'Title',
            'type'              => 'success',
        ];

        $this->session->shouldReceive('flash')->with('sweet_alert.text', $expectedConfig['text']);
        $this->session->shouldReceive('flash')->with('sweet_alert.title', $expectedConfig['title']);
        $this->session->shouldReceive('flash')->with('sweet_alert.type', $expectedConfig['type']);
        $this->session->shouldReceive('flash')->with('sweet_alert.showConfirmButton', $expectedConfig['showConfirmButton']);
        $this->session->shouldReceive('flash')->with('sweet_alert.timer', $expectedConfig['timer']);
        $this->session->shouldReceive('flash')->with('sweet_alert.allowOutsideClick', $expectedConfig['allowOutsideClick']);
        $this->session->shouldReceive('flash')->with('sweet_alert.alert', json_encode($expectedConfig));

        $this->alert->success('This is a success message', 'Title');
    }

    /** @test */
    public function it_displays_error_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => 'This is a error message',
            'title'             => 'Title',
            'type'              => 'error',
        ];

        $this->session->shouldReceive('flash')->with('sweet_alert.text', $expectedConfig['text']);
        $this->session->shouldReceive('flash')->with('sweet_alert.title', $expectedConfig['title']);
        $this->session->shouldReceive('flash')->with('sweet_alert.type', $expectedConfig['type']);
        $this->session->shouldReceive('flash')->with('sweet_alert.showConfirmButton', $expectedConfig['showConfirmButton']);
        $this->session->shouldReceive('flash')->with('sweet_alert.timer', $expectedConfig['timer']);
        $this->session->shouldReceive('flash')->with('sweet_alert.allowOutsideClick', $expectedConfig['allowOutsideClick']);
        $this->session->shouldReceive('flash')->with('sweet_alert.alert', json_encode($expectedConfig));

        $this->alert->error('This is a error message', 'Title');
    }

    /** @test */
    public function it_displays_warning_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => 'This is a warning message',
            'title'             => 'Title',
            'type'              => 'warning',
        ];

        $this->session->shouldReceive('flash')->with('sweet_alert.text', $expectedConfig['text']);
        $this->session->shouldReceive('flash')->with('sweet_alert.title', $expectedConfig['title']);
        $this->session->shouldReceive('flash')->with('sweet_alert.type', $expectedConfig['type']);
        $this->session->shouldReceive('flash')->with('sweet_alert.showConfirmButton', $expectedConfig['showConfirmButton']);
        $this->session->shouldReceive('flash')->with('sweet_alert.timer', $expectedConfig['timer']);
        $this->session->shouldReceive('flash')->with('sweet_alert.allowOutsideClick', $expectedConfig['allowOutsideClick']);
        $this->session->shouldReceive('flash')->with('sweet_alert.alert', json_encode($expectedConfig));

        $this->alert->warning('This is a warning message', 'Title');
    }

    /** @test */
    public function it_displays_important_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => true,
            'timer'             => 'null',
            'allowOutsideClick' => false,
            'text'              => 'This is a success message',
            'title'             => 'Title',
            'type'              => 'success',
            'confirmButtonText' => 'Done',
        ];

        $this->session->shouldReceive('flash')->atLeast(1);

        $this->alert->success('This is a success message', 'Title')->important('Done');

        $this->assertEquals($expectedConfig, $this->alert->getConfig());
    }

    /** @test */
    public function it_displays_html_alert_notifications()
    {
        $expectedConfig = [
            'showConfirmButton' => false,
            'timer'             => 1800,
            'allowOutsideClick' => true,
            'text'              => '<strong>This should be bold!</strong>',
            'title'             => 'Title',
            'type'              => null,
            'html'              => true,
        ];

        $this->session->shouldReceive('flash')->atLeast(1);

        $this->alert->message('<strong>This should be bold!</strong>', 'Title')->html();

        $this->assertEquals($expectedConfig, $this->alert->getConfig());
    }
}
