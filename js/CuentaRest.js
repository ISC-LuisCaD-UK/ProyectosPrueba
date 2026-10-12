// Cuenta de un restaurante usando prompt y alert
var comida = 0;
var bebida = 0;
var comida1 = prompt("Ingrese el precio de la comida 1:");
var comida2 = prompt("Ingrese el precio de la comida 2:");
var bebida1 = prompt("Ingrese el precio de la bebida 1:");
var bebida2 = prompt("Ingrese el precio de la bebida 2:");

comida = parseFloat(comida1) + parseFloat(comida2);
bebida = parseFloat(bebida1) + parseFloat(bebida2);

var total = comida + bebida;

document.write("<h1>Cuenta del Restaurante</h1>");
document.write("<p>Comida: $" + comida.toFixed(2) + "</p>");
document.write("<p>Bebida: $" + bebida.toFixed(2) + "</p>");
document.write("<p>Total: $" + total.toFixed(2) + "</p>");

 // alert("El total de la cuenta es: " + total);

console.log("total: " + total);
console.log("comida: " + comida);
console.log("bebida: " + bebida);
