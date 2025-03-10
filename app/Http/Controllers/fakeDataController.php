<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

    //  Evidencia de realización, tener encuenta lo largo del codigo, la cual la captura suele salir muy extensa
    //  y no se puede mostrar en la pantalla, por lo larga que es.
class fakeDataController
{
    public function users()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data  = [
                'nombre' => $Faker->name(),
                'apellido' => $Faker->lastName(),
                'cargo'=> $Faker->randomElement([
                    'Ejecutiva de cuentas',
                    'Director Creativo',
                    'Director Estrategico',
                    'Development Leader',
                    'Tester',
                    'Diseñador grafico',
                    'Accoun Executive',
                    'Content Manager',
                    'Data specialist',
                    'Community Manager',
                    'Practicante En Diseño Gráfico',
                    'Web Development'
            ]),
                'email' => $Faker->email(),
                'telefono' => $Faker->phoneNumber(),
                'password' => Hash::make($Faker->password()),
                'fecha_nacimiento' => $Faker->date(),
                'img_perfil' => $Faker->imageUrl(),
                'api_token' => $Faker->regexify('[A-Za-z0-9]{60}'),
                'estado' == 1,
                'roles_id' => $Faker->numberBetween(1,6),
                'areas_id' => $Faker->numberBetween(1,10),
                'created_at' => now(),
                'updated_at' => now()
            ];
            DB::table('users')->insert($data);
        }
    }

    public function setFakeAreas()
    {
        for ($i=0; $i < 10 ; $i++) {

            $Faker = Faker::create();
            $data = [
                'name' => $Faker->name(),
                'extencion_tel' => $Faker->randomElement(),
                'horas_consumidas' => $Faker->randomFloat(),
                'estado' == 1
            ];
            DB::table('areas')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeClientes()
    {
        for($i = 0; $i < 10; $i++ )
        {
            $Faker = Faker::create();

            $data = [
                'nombre' => $Faker->name(),
                'nit' => $Faker->regexify(),
                'email' => $Faker->email(),
                'telefono' => $Faker->phoneNumber(),
                'nombre_contacto' => $Faker->name(),
                'razon_social' => $Faker->word(),
                'user_id'=> $Faker->numberBetween(1,10),
                'estado' == 1

            ];

            Db::table('clientes')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeComentarios()
    {
        for ($i=0; $i <10 ; $i++) {

            $Faker = Faker::create();
            $data = [
                'comentarios' => $Faker->sentence(),
                'usuarios_comentarios_id' => $Faker->numberBetween(1,10)
            ];
            DB::table('comentarios')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeTareas()
    {
        for($i=0; $i < 10; $i++)
        {
            $Faker = Faker::create();
            $data = [

                'nombre_tarea' => $Faker->randomElement([
                'Pauta Descuento Droguerías - Gif días de descuento por iniciar mes ',
                'Pauta Tennis de campo',
                'Pauta Descuento Droguerías - Gif días de descuento...',
                'Pauta concierto de la cuna a la jungla - Cali',
                'Informe Resultados Pauta descuentos Droguerìas',
                'Pauta cursos Cali Abril - Preparación a base de cafe',
                'Pauta cursos Cali Abril Automaquillaje',
                'Pauta cursos Cali Abril Decoración y extensión de ...',
                'Pauta cursos Cali Abril - Secretariado sistematizado contable',
                'Pauta cursos Cali Abril - Cocina mexicana',
                'Capacitación Directivos de Comfandi',
                ]),
                'fecha_entrega_area' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'fecha_entrega_cuentas' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'descripcion' => implode('/n',$Faker -> paragraphs(3)),
                'enlaces_externos' => $Faker->sentence(),
                'id_evento' => $Faker->regexify(),
                'fecha_inicio_programa' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'fecha_fin_programa' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'fecha_tentativa_cliente' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'fecha_entrega_cliente_real' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'tiempo_estimado' => $Faker->randomFloat(15,2),
                'tiempo_real' => $Faker->randomFloat(15,2),
                'tiempo_mapa_cliente' => $Faker->randomFloat(15,2),
                'recurrente' => 1,
                'fecha_entrega_cliente' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'fecha_inicio_recurrencia' => now(),
                'fecha_final_recurrencia' => now(),
                'estados_id' => $Faker->numberBetween(1,10),
                'areas_id' => $Faker->numberBetween(1,10),
                'usuarios_id' => $Faker->numberBetween(1,10),
                'ots_id' => $Faker->numberBetween(1,10),
                'planeaciones_fases_id' => $Faker->numberBetween(1,10),
                'requerimientos_clientes_id' => $Faker->numberBetween(1,10),
                'created_at'=> Carbon::now('America/Bogota')->format('Y,m,d H:i:s'),
                'updated_at'=> Carbon::now('America/Bogota')->format('Y,m,d H:i:s'),
                'deleted_at'=> Carbon::now('America/Bogota')->format('Y,m,d H:i:s'),

            ];
            DB::table('tareas')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }


    public function setFakeOts()
    {
        for ($i=0; $i < 10 ; $i++) {

            $Faker = Faker::create();
            $data = [
                'nombre' => $Faker->randomElement([
                    'Pauta Descuentos Droguerias',
                    'Pauta Escuelas Deportiva Tennis deCampo',
                    'Pauta Concierto de la Cuna a la Jungla',
                    'Pauta Cursos Abril',
                    'Himalaya - Coordinación',
                    'Fee de Mantenimiento al E-Commerce',
                    'Fee Posicionamiento SEO ',
                    'Fee de SEO mes de Abril',
                    'Fee Mensual Abril',
                    'Sitio de Constructora Meléndez - Renovación Host, ...',
                    'Fee de Soporte en Desarrollo para sitio web'
                ]),
                'referencia'=> $Faker->numberBetween(1000, 100000),
                'valor' => $Faker->regexify(),
                'fee' == 1,
                'horas_totales' => $Faker->randomFloat(15,2),
                'horas_disponibles' => $Faker->randomFloat(15,2),
                'total_horas_extra' => $Faker->randomFloat(15,2),
                'observaciones' => $Faker->paragraphs(),
                'fecha_inicio' =>  $Faker->date(),
                'fecha_final' => $Faker->date(),
                'estado' == 1,
                'users_id' => $Faker->numberBetween(1,10),
                'estados_id' => $Faker->numberBetween(1,10),
                'clientes_id' => $Faker->numberBetween(1,10),
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
            DB::table('ots')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeTraficoTareas()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'nombre' => $Faker->name(),
                'fecha_entrega_estimada' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'descripcion' => $Faker->sentence(),
                'enlaces_externos' => $Faker->url(),
                'tiempo_estimado' => $Faker->randomFloat(15,2),
                'tiempo_real' => $Faker->randomFloat(15,2),
                'fecha_entrega_cliente' => $Faker->dateTime()->format('Y-m-d H:i:s'),
                'estados_id' => $Faker->numberBetween(1,10),
                'areas_id' => $Faker->numberBetween(1,10),
                'users_id' => $Faker->numberBetween(1,10),
                'roles_id' => $Faker->numberBetween(1,6),
                'ots_id' => $Faker->numberBetween(1,10),
                'created_at'=> Carbon::now('America/Bogota')->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now('America/Bogota')->format('Y-m-d H:i:s'),
            ];
            DB::table('trafico_tareas')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }


    public function setFakeEstado_X_Roles()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'estado_id' => $Faker->numberBetween(1,25),
                'roles_id' => $Faker->numberBetween(1,6)
            ];
            DB::table('Estado_x_roles')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeRoleUser()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'user_id' => $Faker->numberBetween(1,10),
                'roles_id' => $Faker->numberBetween(1,6)
            ];
            DB::table('role_user')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }


    public function setFaketiempoArea()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'tiempo_estimado_ot' => $Faker->randomFloat(15,2),
                'tiempo_extra' => $Faker->randomFloat(15,2),
                'ots_id' => $Faker->numberBetween(1,10),
                'areas_id' => $Faker->numberBetween(1,10),
            ];
            DB::table('tiempo_x_area')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }


    public function setFakeHistoricoClientes()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'nombre' => $Faker->name(),
                'nit' => $Faker->regexify(),
                'email' => $Faker->email(),
                'telefono' => $Faker->phoneNumber(),
                'nombre_contacto' => $Faker->name(),
                'razon_social' => $Faker->sentence(),
                'cliente_id' => $Faker->numberBetween(1,10),
                'users_id' => $Faker->numberBetween(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('historico_clientes')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeHistoricoOts()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'nombre' => $Faker->name(),
                'referencia' => $Faker->sentence(),
                'valor' => $Faker->regexify(),
                'fee' == 1,
                'horas_totales' => $Faker->randomFloat(),
                'horas_disponibles' => $Faker->randomFloat(),
                'total_horas_extra' => $Faker->randomFloat(),
                'observaciones' => $Faker->paragraph(),
                'requerimiento_ot' => $Faker->sentence(),
                'fecha_inicio' => $Faker->dateTime(),
                'fecha_fin' => $Faker->dateTime(),
                'clientes_id' => $Faker->numberBetween(1,10),
                'user_id' => $Faker->numberBetween(1,10),
                'estados_id' => $Faker->numberBetween(1,25),

            ];
            DB::table('historico_ots')->insert($data);
        }
        return "<h2>Datos insertados correctamente!!</h2>";
    }

    public function setFakeHistoricoTareas()
    {
        for ($i=0; $i < 10 ; $i++) {
            $Faker = Faker::create();
            $data = [
                'tiempo_estimado' => $Faker->randomFloat(),
                'tiempo_real' => $Faker->randomFloat(),
                'comentarios_id' => $Faker->numberBetween(1,10),
                'tareas_id' => $Faker->numberBetween(1,10),
                'usuarios_id' => $Faker->numberBetween(1,10),
                'estados_id' => $Faker->numberBetween(1,10),
                'fecha_entrega_area' => $Faker->dateTime(),
                'fecha_entrega_cuentas' => $Faker->dateTime(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('historico_ots')->insert($data);
        }

    }
}
