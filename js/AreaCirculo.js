// Este codigo ha sido generado por el modulo psexport 20230904-w32 de PSeInt.
// Es posible que el codigo generado no sea completamente correcto. Si encuentra
// errores por favor reportelos en el foro (http://pseint.sourceforge.net).

function areacirculo() {
	var area, pi, radio;
	document.write("Dame el valor del radio del circulo: ", '<BR/>');
	radio = Number(prompt());
	area = Math.PI*radio*radio;
	document.write("el area del circulo es: ", area, "Unidades Cuadradas", '<BR/>');
}

