@echo off

echo.
echo ==========================
echo ACTUALIZANDO GITHUB
echo ==========================
echo.

git status

set /p mensaje=Mensaje del commit: 

git add .
git commit -m "%mensaje%"
git push origin master

pause