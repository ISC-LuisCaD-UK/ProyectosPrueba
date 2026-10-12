// Resolver Mayor/Menor después de una resta
document.write("<h1>Resultado de la resta</h1>");
var num1 = parseInt(prompt("Ingrese el primer número:"));
var num2 = parseInt(prompt("Ingrese el segundo número:"));

var resultado = num1 - num2;

var parOimpar = (resultado % 2 === 0) ? "par" : "impar";

if (resultado > 0) {
    console.log("El resultado es positivo. Mayor que cero." + " Es un número " + parOimpar + ".");
} else if (resultado < 0) {
    console.log("El resultado es negativo. Menor que cero." + " Es un número " + parOimpar + ".");
} else {
    console.log("El resultado es cero.");
}