@echo off
REM ============================================
REM Script completo para verificar y subir cambios a GitHub
REM Incluye fecha y hora en el mensaje de commit
REM ============================================

echo Revisando estado del repositorio...
git status
echo.

echo Simulando qué se agregaría con "git add c/ cpp/ css/ html/ java/ js/ php/ py/ sql/"
git add -n c/ cpp/ css/ html/ java/ js/ php/ py/ sql/
echo.

echo Verificando qué archivos están siendo ignorados...
git check-ignore -v *
echo.

REM Preguntar si desea continuar
set /p continuar=¿Deseas continuar con el commit y push? (s/n): 
if /I "%continuar%"=="n" goto fin

REM Agregar solo las carpetas de código
git add c/ cpp/ css/ html/ java/ js/ php/ py/ sql/

REM Pedir mensaje de commit al usuario
set /p mensaje=Escribe el mensaje del commit: 

REM Obtener fecha y hora actual
for /f "tokens=1-4 delims=/ " %%a in ('date /t') do set fecha=%%a-%%b-%%c
for /f "tokens=1-2 delims=: " %%a in ('time /t') do set hora=%%a:%%b

REM Crear el commit con mensaje + fecha/hora
git commit -m "%mensaje% [%fecha% %hora%]"

REM Subir los cambios a GitHub
git push

echo ============================================
echo Cambios subidos a GitHub con el commit: "%mensaje% [%fecha% %hora%]"
echo ============================================

:fin
pause
