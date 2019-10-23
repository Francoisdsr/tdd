<?php
use App\Utils\Convert;
use PHPUnit\Framework\TestCase;

class ConvertTest extends TestCase
{
    public function test_function_convert_0_return_0()
    {
        $convert = new Convert();
        $convert->setNombre("0");
        $test = $convert->convert();
        $this->assertEquals("0", $test);
    }
    //test si le retour de la function est null
    public function test_function_convert_retour_non_null()
    {
        $convert = new Convert();
        $test = $convert->convert() != null;
        $this->assertTrue($test);
    }

    public function test_function_twoToTen_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("10010");
        $test = base_convert("10010", 2, 10);
        $this->assertEquals($convert->twoToTen(), $test);
    }


    public function test_function_convert_return_le_bon_resultat_de_2_vers_10()
    {
        $convert = new Convert();
        $convert->setNombre("10010");
        $test = base_convert("10010", 2, 10);
        $this->assertEquals($convert->convert("2-10"), $test);
    }

    public function test_function_tenToTwo_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("20");
        $test = base_convert("20", 10, 2);
        $this->assertEquals($convert->tenToTwo(), $test);
    }
    public function test_function_convert_return_le_bon_resultat_de_10_vers_2()
    {
        $convert = new Convert();
        $convert->setNombre("10010");
        $test = base_convert("10010", 10, 2);
        $this->assertEquals($convert->convert("10-2"), $test);
    }




    public function test_function_anyToTen_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("AAAF");
        $test = "43695";
        $this->assertEquals($convert->anyToTen("16"), $test);
    }

    public function test_function_anyToTwo_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("AAAF");
        $test = "1010101010101111";
        $this->assertEquals($convert->anyToTwo(16), $test);
    }

    public function test_function_convert_return_le_bon_resultat_de_any_vers_2()
    {
        $convert = new Convert();
        $convert->setNombre("AAAF");
        $test = "1010101010101111";
        $this->assertEquals($convert->convert("any-2", 16), $test);
    }


    public function test_function_TenToAny_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("3263");
        $test = "CBF";
        $this->assertEquals($convert->TenToAny(16), $test);
    }

    public function test_function_twoToAny_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("1010101010101111");
        $test = "AAAF";
        $this->assertEquals($convert->twoToAny(16), $test);
    }

    public function test_function_anyToAny_return_le_bon_resultat()
    {
        $convert = new Convert();
        $convert->setNombre("31453");
        $test = "2589";
        $this->assertEquals($convert->anyToAny(6, 12), $test);
    }


    public function test_function_convert_return_le_bon_resultat_de_any_vers_any()
    {
        $convert = new Convert();
        $convert->setNombre("AAAF");
        $test = "1010101010101111";
        $this->assertEquals($convert->convert("any-any", 16, 2), $test);
    }

}
?>