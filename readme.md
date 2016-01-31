## OBLAGIO CORE 
Source Code Core Backend / Admin 

Fitur :

1. Hak Akses (Create , Update , Delete , View dan bisa tambah sendiri :D )

2. Helpers ready : Generator Datatables Server Side , Buttons , Alert Generator , Ect (Cek Packages/Oblagio files)  

3. Ajax Form Validation

4. Admin LTE

## Cara Install :

1. Clone https://github.com/oblagiolabs/core.git

2. composer install

3. import database database/backup/oblagio.sql

4. setting your .env 

5. Running Project (localhost/yourproject/public/admin-cp or yourproject.dev/admin-cp)

6. Login  : Username and Password reza , reza123

## Documentation

### Setting

Buka File OblagioSetting.php di Packages/Oblagio/OblagioSetting.php

```sh

<?php

/*
|--------------------------------------------------------------------------
| Konfigurasi
|--------------------------------------------------------------------------
|
| Variable statusProject -> jika isinya dev maka menu developer pada aplikasi tetap ada jika isinya live maka menu developer hilang
| Variable Backend -> variable yang berisi path uri backenend itu sendiri. jika variable backendName diubah maka uri nya pun berubah.
|
*/


return [

	'statusProject' => 'dev',
	'backendName' => 'admin-cp', 

];


?>
```

### Crud

coming soon :)
