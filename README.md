# painel-administrativo
Para iniciar o projeto colocar o comando 
git clone https://github.com/MateusAntunes95/painel-administrativo.git

criar um .env configurando o banco usando .env.exeple

depois rodar o comando para rodar migration
php artisan migrate

rodar php artisan DB:seed 
php artisan db:seed --class=AllSeeder.php

depois so rodar o comando php artisan serve 
