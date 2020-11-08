# CrudBack

1. Clonar el repositorio en la carpeta /var/www
```console
detektor@UbSwDevDtk: cd /var/www
detektor@UbSwDevDtk: git clone https://github.com/juank1520/detektor-back.git
```

2. Habilitar el módulo de encabezados en las peticiones de apache y reiniciar el servidor apache
```console
detektor@UbSwDevDtk:~$ sudo a2enmod headers
detektor@UbSwDevDtk:~$ systemctl restart apache2
```

3. Crear un host virtual con nombre 'motivos.devel' en apache
3.1. Dirigirse abrir el archivo hosts del directorio '/etc'
```console
detektor@UbSwDevDtk:~$ sudo nano /etc/hosts
```
3.2. Agregar la siguiente línea 
```console
127.0.0.1       motivos.devel
```

3.3. En el repositorio se encuentra el archivo crud.conf, este archivo lo tiene que mover al directorio '/etc/apache2/sites-available'
```console
detektor@UbSwDevDtk:~$ cp crud.conf /etc/apache2/sites-available/
```

3.4. Crear un enlace simbólico de este archivo a la carpera /etc/apache2/sites-enabled/
```console
detektor@UbSwDevDtk:~$ sudo ln -s /etc/apache2/sites-available/crud.conf /etc/apache2/sites-enabled/crud.conf 
```
3.5. Reiniciar el servidor
```console
detektor@UbSwDevDtk:~$ sudo service apache2 restart 
```


