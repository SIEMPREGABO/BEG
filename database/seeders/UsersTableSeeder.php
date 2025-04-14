<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $clienteprueba = new User();
        $clienteprueba->email = 'gab.mirare@gmail.com';
        $clienteprueba->nombre_pila = 'Gabriel';
        $clienteprueba->apellido_paterno = 'Miron';
        $clienteprueba->apellido_materno = 'Arevalo';
        $clienteprueba->celular = '5510316739';
        $clienteprueba->email_verified_at = null; // Verifica que este sea el nombre correcto del campo
        $clienteprueba->password = Hash::make('AdministradorBEG#01'); // Encripta la contraseña
        //dd($clienteprueba->CONTRASENIA);
        $clienteprueba->remember_token = Str::random(10);
        $clienteprueba->isAdmin = true;
        $clienteprueba->mayorista = false;
        $clienteprueba->mayorista_caducidad = null;

        // Asignar valores para los campos de timestamps
        $clienteprueba->created_at = now(); // Usa el nombre del campo que tienes en la base de datos
        $clienteprueba->updated_at = now(); // Usa el nombre del campo que tienes en la base de datos

        // Guardar el modelo en la base de datos
        $clienteprueba->save();

        $clienteprueba = new User();
        $clienteprueba->email = 'Joan@test.com';
        $clienteprueba->nombre_pila = 'Gabriel';
        $clienteprueba->apellido_paterno = 'Miron';
        $clienteprueba->apellido_materno = 'Arevalo';
        $clienteprueba->celular = '5510316754';
        $clienteprueba->email_verified_at = null; // Verifica que este sea el nombre correcto del campo
        $clienteprueba->password = Hash::make('12345678'); // Encripta la contraseña
        //dd($clienteprueba->CONTRASENIA);
        $clienteprueba->remember_token = Str::random(10);
        $clienteprueba->isAdmin = false;
        $clienteprueba->mayorista = true;
        $clienteprueba->mayorista_caducidad = now();

        // Asignar valores para los campos de timestamps
        $clienteprueba->created_at = now(); // Usa el nombre del campo que tienes en la base de datos
        $clienteprueba->updated_at = now(); // Usa el nombre del campo que tienes en la base de datos

        // Guardar el modelo en la base de datos
        $clienteprueba->save();

        $address = new Address();
        $address->estado = 'Hidalgo';
        $address->municipio = 'Acatlán';
        $address->cp = 11222;
        $address->colonia = 'valle';
        $address->calle = 'valle';
        $address->num_ext = 122;

        $address->save(); // Guardar la dirección

        // Obtener el usuario autenticado (o cualquier otro usuario)
        

        // Asociar la dirección con el usuario a través de la tabla pivote
        $clienteprueba->addresses()->attach($address->id);



        User::factory(10)->create();
    }
}
