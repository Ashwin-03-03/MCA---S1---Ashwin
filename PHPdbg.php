use PHPUnit\Framework\TestCase;
//TestCase is a base class provided by PHPUnit.
class CalculatorTest extends TestCase {  //A class groups related tests (for one component/module).
    public function testAdd() {
        $calc = new Calculator();
        $this->assertEquals(5, $calc->add(2, 3));
    }

    public function testDivide() {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->divide(10, 5));
    }

    public function testDivideByZero() {
        $calc = new Calculator();
        $this->expectException(InvalidArgumentException::class);
        $calc->divide(10, 0);
    }
}



// src/Calculator.php
class Calculator {
    public function add($a, $b) {
        return $a + $b;
    }

    public function divide($a, $b) {
        if ($b == 0) throw new InvalidArgumentException("Division by zero");
        return $a / $b;
    }
}
