cara mengubah path halaman admin dari zpanel menjadi yg lain :
- app/Http/Middleware/AuthenticateAdmin ubah guest('zpanel')
- app/Http/Controller/Controlle.php ubah variable admin_prefix
- app/Http/routes.php ubah prefix dari zpanel menjadi yg lain

