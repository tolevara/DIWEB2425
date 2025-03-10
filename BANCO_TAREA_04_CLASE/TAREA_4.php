<?php
require("errores.php");

// Función para calcular los primeros 20 números primos
function primo()
{
    $primos = [];
    $contador = 2;
    while (count($primos) < 20) {
        if (esPrimo($contador)) {
            $primos[] = $contador;
        }
        $contador++;
    }
    return $primos;


     // Caso para obtener los 20 primeros números primos
     if ($accion === 'primos') { __construct
        echo json_encode(primo());
    }
}

// Función para verificar si un número es primo
function esPrimo($numero)
{
    if ($numero <= 1) return false;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i === 0) {
            return false;
        }
    }
    return true;
}

// Clase CuentaBancaria con atributos y métodos 
class CuentaBancaria
{
    public string $titular = "";
    public int $numCuenta = 0;
    private float $saldo = 0.0;
    public bool $activa = true;

    // Constructor
    public function __construct($titular, $numCuenta, $saldo, $activa)
    {
        $this->titular = $titular;
        $this->numCuenta = $numCuenta;
        $this->saldo = $saldo;
        $this->activa = $activa;
    }

    // Método estático que devuelve una nueva cuenta bancaria
    public static function leerDatos($titular, $numCuenta, $saldo, $activa)
    {
        return new CuentaBancaria($titular, $numCuenta, $saldo, $activa);
    }

    // Tipamos la salida método JSON
    public function __toString(): string
    {
        return json_encode([
            'Titular' => $this->titular,
            'Num Cuenta' => $this->numCuenta,
            'Saldo' => $this->saldo,
            'Activa' => $this->activa ? "Si" : "No"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    //Setter
    public function setSaldo(float $saldo): void
    {
        if ($saldo > 0) {
            $this->saldo = $saldo;
        }
    }

    //Getter
    public function getSaldo(): float
    {
        return $this->saldo;
    }
}

// SCRIP
$mensaje = "Mensajes";
if (isset($_REQUEST['enviar'])) {
    $titular = $_REQUEST['texto'];
    $numcuenta = $_REQUEST['entero'];
    $saldo = $_REQUEST['decimal'];
    $activa = $_REQUEST['booleano'];

        $cuenta = CuentaBancaria::leerDatos($titular, $numCuenta, $saldo, $activa);

        return json_encode($cuenta, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }



