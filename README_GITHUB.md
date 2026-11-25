\# Actualizar GitHub



\## 1. Actualizar archivos existentes



Si solamente modificaste archivos que ya estaban en GitHub:



git status

git add .

git commit -m "Descripción de cambios"

git push origin master





\## 2. Agregar una carpeta nueva



\### Paso 1: Editar .gitignore



Si el repositorio contiene:



\*



Debes agregar:



!nombre\_carpeta/

!nombre\_carpeta/\*\*



Ejemplo:



!webapps/

!webapps/\*\*



o



!html/5j/

!html/5j/\*\*





\### Paso 2: Verificar



git status



Debe mostrar los archivos nuevos.





\### Paso 3: Subir cambios



git add .

git commit -m "Se agrega carpeta nueva"

git push origin master





\## 3. Verificar si Git ignora una carpeta



git status --ignored



o



git check-ignore -v nombre\_carpeta





\## 4. Ver archivos rastreados por Git



git ls-files





\## 5. Ver rama actual



git branch





\## 6. Descargar cambios de GitHub



git pull origin master





\## 7. Ver repositorio remoto



git remote -v

