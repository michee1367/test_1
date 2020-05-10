<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Tools\Tools;

class fssIdFssTest extends TestCase
{
    use \Tests\CreatesApplication;
    /**
     * A basic unit test SMS.
     *
     * @return void
     */
    public function testSMS()
    {
        $app = $this->createApplication();
        $tools = new Tools($app);
        $fssIdFss = $tools->getFssIdFss();
        $idActeur = 1;
        $idIntrant = 1;
        $res = $fssIdFss->bySMS($idActeur, $idIntrant);
        //dd($res->toJson());
        $this->assertTrue(true);
    }
    /**
     * A basic unit test Api.
     *
     * @return void
     */
    public function testDirect()
    {
        $app = $this->createApplication();
        $tools = new Tools($app);
        $fssIdFss = $tools->getFssIdFss();
        $idActeur = 1;
        $idIntrant = 1;
        $res = $fssIdFss->byDirect($idActeur, $idIntrant);
        //dd($res->toJson());
        $this->assertTrue(true);
    }
}
