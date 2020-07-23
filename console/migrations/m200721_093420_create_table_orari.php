<?php

use yii\db\Migration;

/**
 * Class m200721_093420_create_table_orari
 */
class m200721_093420_create_table_orari extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this -> createTable('{{%orario}}',[
        'id' => $this -> primarykey(),
        'risorsa_id' => $this -> integer(),
        'struttura_id' => $this -> integer(),
        'giorno' => $this -> string(),
        'inizio_orario' => $this -> time(),
        'fine_orario' => $this -> time(),
        'data_inizio' => $this -> date(),
        'data_fine' =>  $this -> date(),
        "created_at" => $this -> dateTime(),
        "updated_at" => $this -> dateTime(),
        "created_by" => $this -> integer(),
        "updated_by" => $this -> integer(),
        "deleted_by" => $this -> integer() ->defaultValue(0),
        "deleted_at" => $this -> dateTime(),
        "lock" => $this -> integer(),
      ]);

      $this->createIndex("idx-orario-risorsa_id", "{{%orario}}","risorsa_id");
      $this->addForeignKey("fk-orario-risorsa_id","{{%orario}}","risorsa_id","{{%risorsa}}","id");

      $this->createIndex("idx-orario-struttura_id", "{{%orario}}","struttura_id");
      $this->addForeignKey("fk-orario-struttura_id","{{%orario}}","struttura_id","struttura","id");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-orario-risorsa_id","{{%orario}}");
        $this->dropIndex("idx-orario-risorsa_id","{{%orario}}");
        $this -> dropForeignKey('fk-orario-struttura_id','{{%orario}}');
        $this->dropIndex("idx-orario-struttura_id","{{%orario}}");

        $this -> dropTable('orario');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_093420_create_table_orari cannot be reverted.\n";

        return false;
    }
    */
}
