<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
class CreatePostProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `get_posts_by_userid`;
            CREATE PROCEDURE `get_posts_by_userid` (IN idx int)
            BEGIN
             SELECT * FROM users WHERE id = idx;
            END;";
  
        \DB::unprepared($procedure);
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         
    }
}