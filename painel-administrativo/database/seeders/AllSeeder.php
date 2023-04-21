<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Perfil;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');


        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'nascimento' => $faker->dateTimeBetween('-80 years', '-18 years')->format('d/m/Y'),
                'celular' =>  $faker->phoneNumber('48'),
                'situacao' =>  'ativo',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->unique()->userName;
            $fullName = $faker->name;
            $email = $faker->unique()->freeEmail($name);

            $cliente = new Cliente();
            $cliente->nome_usuario = $name;
            $cliente->nome_completo = $fullName;
            $cliente->email = $email;
            $cliente->cpf = $faker->unique()->cpf(true);
            $cliente->rg = $faker->unique()->rg();
            $cliente->nascimento = $faker->dateTimeBetween('-80 years', '-18 years')->format('d/m/Y');
            $cliente->celular = $faker->phoneNumber('48');
            $cliente->situacao = 'ativo';
            $cliente->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $endereco = new Endereco();
            $endereco->cliente_id = Cliente::inRandomOrder()->first()->id;
            $endereco->cep = $faker->postcode;
            $endereco->estado = $faker->stateAbbr;
            $endereco->cidade = $faker->city;
            $endereco->rua = $faker->streetName;
            $endereco->numero = $faker->buildingNumber;
            $endereco->complemento = $faker->secondaryAddress;
            $endereco->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $redesSociais = ['instragram', 'facebook', 'twiiter', 'tiktok'];
            $perfil = new Perfil();
            $cliente = Cliente::inRandomOrder()->first();
            $perfil->cliente_id = $cliente->id;
            $perfil->tipo = $faker->randomElement($redesSociais);
            $perfil->nome_usuario = str_replace('.', '', $cliente->nome);
            $perfil->url = $faker->url;
            $perfil->ultimo_acesso = $faker->dateTimeBetween('-1 year')->format('Y-m-d');
            $perfil->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $tipo_album = ['musica', 'video'];
            $situacao = ['disponivel_publico', 'disponivel_restrito', 'bloqueado', 'excluido'];
            $album = new Album();
            $cliente = Cliente::inRandomOrder()->first();
            $perfil = Perfil::inRandomOrder()->first();
            $album->cliente_id = $cliente->id;
            $album->perfil_id = $perfil->id;
            $album->tipo_album = $faker->randomElement($tipo_album);
            $album->titulo = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $album->descricao = $faker->paragraph($nbSentences = 5, $variableNbSentences = true);
            $album->caminho_imagem_principal = $faker->imageUrl($width = 640, $height = 480);
            $album->caminho_video = $faker->filePath();
            $album->data_inclusao = $faker->dateTimeBetween('-1 year')->format('Y-m-d');
            $album->situacao = $faker->randomElement($situacao);
            $album->save();
        }
    }
}
