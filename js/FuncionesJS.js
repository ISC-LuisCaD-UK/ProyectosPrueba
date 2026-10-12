var respuesta = window.prompt("Hola, ¿cómo estás?");
alert("Me alegra saber que estás " + respuesta + "!");

var confirmacion = window.confirm("¿Quieres continuar con la aplicación?");

if (confirmacion) {
    alert("¡Genial! Continuemos.");
} else {
    alert("Entendido. Puedes volver cuando quieras.");
}