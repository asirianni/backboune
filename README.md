# TP FARMACIA

Reto Tecnico



## Getting Started

Servicio Desarrollado en Laravel 8.
El Servicio LEE UN ARCHIVO .TXT CON CODIGOS POSTALES DE MEXICO

### Pre-requisitos

Verifique que su equipo tenga instalado las siguientes versiones. Abra una consola cmd  o terminal powershell:

```
php -v // PHP 7.4.27
composer -v // Version 2.2.1
git --version // version 2.34.1.windows.1

```

### Instalacion

Abra consola y por terminal seleccionar la ruta donde se va a clonar el proyecto. 

```
cd documents
```

crear carpeta en la ruta seleccionada con el siguiente comando

```
mkdir reto
```

ingresar a la carpeta

```
cd reto
```

Iniciar repositorio en la carpeta

```
git init .
```

agregar la ruta de clonacion con el siguiente comando

```
git remote add origin git@github.com:asirianni/backboune.git
```

clonar proyecto

```
git pull origin main
```

El sistema solicitara sus credenciales de acceso al repositorio git privado

```
abra una ventana del browser cuando se lo solicite, logguese y luego cierre la pestaña asi corre el proceso por consola.
```

finalizada la clonacion corra el siguiente comando para instalar las dependencias

```
composer install
```

finalizada la instalacion corra el siguiente comando

```
php artisan serve
```

El servidor estara corriendo en el puerto 8000

```
PHP 7.4.27 Development Server (http://127.0.0.1:8000) started
```


## API

## GET ZIP-CODE

* GET / http://localhost:8000/api/zip-codes/01270


Resp
```
   {
    "zip_code": "01270",
    "locality": "CIUDAD DE M?XICO",
    "federal_entity": {
        "key": 9,
        "name": "CIUDAD DE M?XICO",
        "code": 0
    },
    "settlements": [
        {
            "key": "09",
            "name": "EL TEJOCOTE",
            "zone_type": "0120",
            "settlement_type": {
                "name": "COLONIA"
            }
        },
        {
            "key": "09",
            "name": "LA PRESA",
            "zone_type": "0121",
            "settlement_type": {
                "name": "COLONIA"
            }
        },
        {
            "key": "09",
            "name": "GOLONDRINAS",
            "zone_type": "0123",
            "settlement_type": {
                "name": "COLONIA"
            }
        },
        {
            "key": "09",
            "name": "GOLONDRINAS 1A SECCI?N",
            "zone_type": "0124",
            "settlement_type": {
                "name": "COLONIA"
            }
        },
        {
            "key": "09",
            "name": "GOLONDRINAS 2A SECCI?N",
            "zone_type": "0125",
            "settlement_type": {
                "name": "COLONIA"
            }
        },
        {
            "key": "09",
            "name": "LOMAS DE CAPULA",
            "zone_type": "0127",
            "settlement_type": {
                "name": "COLONIA"
            }
        }
    ],
    "municipality": {
        "key": "?LVARO OBREG?N",
        "name": 10
    }
}
```




## Authors

* **Adrian Sirianni** - *Analista Tecnico Programador* - [asprofactory.net](https://asprofactory.net)




