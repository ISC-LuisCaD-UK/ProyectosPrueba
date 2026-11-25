@echo off

title Actualizar GitHub

echo.
echo ==========================
echo Estado actual
echo ==========================
echo.

git status

echo.
set /p msg=Mensaje del commit: 

echo.
echo Agregando archivos...
git add .

echo.
echo Creando commit...
git commit -m "%msg%"

echo.
echo Enviando a GitHub...
git push origin master

echo.
echo ==========================
echo PROCESO FINALIZADO
echo ==========================
pause