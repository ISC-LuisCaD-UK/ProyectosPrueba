var fecha = new Date();
alert("La fecha actual es: " + fecha);

var fechaNacimiento = new Date(1972,0,30); // Enero es el mes 0
alert("Mi fecha de nacimiento es: " + fechaNacimiento);

var fechaCadena = new Date("December 17, 1995 03:24:00");
alert("La fecha a partir de una cadena es: " + fechaCadena);

var fechaCadena2 = new Date("1995-12-17T03:24:00");
alert("La fecha a partir de una cadena en formato ISO es: " + fechaCadena2);

// Obtener componentes de la fecha
var anio = fecha.getFullYear();
var mes = fecha.getMonth() + 1; // hay que sumar 1 porque los meses empiezan desde 0
var dia = fecha.getDate();
alert("Año: " + anio + ", Mes: " + mes + ", Día: " + dia);
