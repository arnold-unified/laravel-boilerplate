<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('CREATE VIEW vw_user_permissions 
            AS 
            SELECT ru.user_id, p.name 
            FROM role_user ru 
            INNER JOIN permission_role pr 
            ON ru.role_id = pr.role_id 
            INNER JOIN permissions p 
            ON pr.permission_id = p.id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP VIEW vw_user_permissions');
    }
}
