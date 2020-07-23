<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m200720_094326_create_tables
 */
class m200720_094326_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%struttura}}",[
          "id" => Schema::TYPE_PK,
          "nome" => Schema::TYPE_STRING,
          "indirizzo" => Schema::TYPE_STRING,
          "created_at" => Schema::TYPE_DATETIME,
          "updated_at" => Schema::TYPE_DATETIME,
          "created_by" => Schema::TYPE_INTEGER,
          "updated_by" => Schema::TYPE_INTEGER,
          "deleted_by" => Schema::TYPE_INTEGER,
          "deleted_at" => Schema::TYPE_DATETIME,
          "lock" => Schema::TYPE_INTEGER,
        ]);

        $this->createTable("{{%risorsa}}",[
          "id" => Schema::TYPE_PK,
          "struttura_id" => Schema::TYPE_INTEGER,
          "nome" => Schema::TYPE_STRING,
          "created_at" => Schema::TYPE_DATETIME,
          "updated_at" => Schema::TYPE_DATETIME,
          "created_by" => Schema::TYPE_INTEGER,
          "updated_by" => Schema::TYPE_INTEGER,
          "deleted_by" => Schema::TYPE_INTEGER,
          "deleted_at" => Schema::TYPE_DATETIME,
          "lock" => Schema::TYPE_INTEGER,
        ]);

        $this->createIndex("idx-risorsa-struttura_id", "{{%risorsa}}","struttura_id");
        $this->addForeignKey("fk-risorsa-struttura_id","{{%risorsa}}","struttura_id","{{%struttura}}","id");

        $this->createTable("{{%prenotazione}}",[
          "id" => Schema::TYPE_PK,
          "risorsa_id" => Schema::TYPE_INTEGER,
          "user_id" => Schema::TYPE_INTEGER,
          "data_inizio" => Schema::TYPE_DATETIME,
          "data_fine" => Schema::TYPE_DATETIME,
          "created_at" => Schema::TYPE_DATETIME,
          "updated_at" => Schema::TYPE_DATETIME,
          "created_by" => Schema::TYPE_INTEGER,
          "updated_by" => Schema::TYPE_INTEGER,
          "deleted_by" => Schema::TYPE_INTEGER,
          "deleted_at" => Schema::TYPE_DATETIME,
          "lock" => Schema::TYPE_INTEGER,
        ]);

        $this->createIndex("idx-prenotazione-risorsa_id", "{{%prenotazione}}","risorsa_id");
        $this->addForeignKey("fk-prenotazione-risorsa_id","{{%prenotazione}}","risorsa_id","{{%risorsa}}","id");

        $this->createIndex("idx-prenotazione-user_id", "{{%prenotazione}}","user_id");
        $this->addForeignKey("fk-prenotazione-user_id","{{%prenotazione}}","user_id","user","id");

        $this->createTable("{{%disponibilita}}",[
          "id" => Schema::TYPE_PK,
          "risorsa_id" => Schema::TYPE_INTEGER,
          "data" => Schema::TYPE_DATE,
          "orario_00_00" => Schema::TYPE_INTEGER,
          "orario_00_15" => Schema::TYPE_INTEGER,
          "orario_00_30" => Schema::TYPE_INTEGER,
          "orario_00_45" => Schema::TYPE_INTEGER,
          "orario_01_00" => Schema::TYPE_INTEGER,
          "orario_01_15" => Schema::TYPE_INTEGER,
          "orario_01_30" => Schema::TYPE_INTEGER,
          "orario_01_45" => Schema::TYPE_INTEGER,
          "orario_02_00" => Schema::TYPE_INTEGER,
          "orario_02_15" => Schema::TYPE_INTEGER,
          "orario_02_30" => Schema::TYPE_INTEGER,
          "orario_02_45" => Schema::TYPE_INTEGER,
          "orario_03_00" => Schema::TYPE_INTEGER,
          "orario_03_15" => Schema::TYPE_INTEGER,
          "orario_03_30" => Schema::TYPE_INTEGER,
          "orario_03_45" => Schema::TYPE_INTEGER,
          "orario_04_00" => Schema::TYPE_INTEGER,
          "orario_04_15" => Schema::TYPE_INTEGER,
          "orario_04_30" => Schema::TYPE_INTEGER,
          "orario_04_45" => Schema::TYPE_INTEGER,
          "orario_05_00" => Schema::TYPE_INTEGER,
          "orario_05_15" => Schema::TYPE_INTEGER,
          "orario_05_30" => Schema::TYPE_INTEGER,
          "orario_05_45" => Schema::TYPE_INTEGER,
          "orario_06_00" => Schema::TYPE_INTEGER,
          "orario_06_15" => Schema::TYPE_INTEGER,
          "orario_06_30" => Schema::TYPE_INTEGER,
          "orario_06_45" => Schema::TYPE_INTEGER,
          "orario_07_00" => Schema::TYPE_INTEGER,
          "orario_07_15" => Schema::TYPE_INTEGER,
          "orario_07_30" => Schema::TYPE_INTEGER,
          "orario_07_45" => Schema::TYPE_INTEGER,
          "orario_08_00" => Schema::TYPE_INTEGER,
          "orario_08_15" => Schema::TYPE_INTEGER,
          "orario_08_30" => Schema::TYPE_INTEGER,
          "orario_08_45" => Schema::TYPE_INTEGER,
          "orario_09_00" => Schema::TYPE_INTEGER,
          "orario_09_15" => Schema::TYPE_INTEGER,
          "orario_09_30" => Schema::TYPE_INTEGER,
          "orario_09_45" => Schema::TYPE_INTEGER,
          "orario_10_00" => Schema::TYPE_INTEGER,
          "orario_10_15" => Schema::TYPE_INTEGER,
          "orario_10_30" => Schema::TYPE_INTEGER,
          "orario_10_45" => Schema::TYPE_INTEGER,
          "orario_11_00" => Schema::TYPE_INTEGER,
          "orario_11_15" => Schema::TYPE_INTEGER,
          "orario_11_30" => Schema::TYPE_INTEGER,
          "orario_11_45" => Schema::TYPE_INTEGER,
          "orario_12_00" => Schema::TYPE_INTEGER,
          "orario_12_15" => Schema::TYPE_INTEGER,
          "orario_12_30" => Schema::TYPE_INTEGER,
          "orario_12_45" => Schema::TYPE_INTEGER,
          "orario_13_00" => Schema::TYPE_INTEGER,
          "orario_13_15" => Schema::TYPE_INTEGER,
          "orario_13_30" => Schema::TYPE_INTEGER,
          "orario_13_45" => Schema::TYPE_INTEGER,
          "orario_14_00" => Schema::TYPE_INTEGER,
          "orario_14_15" => Schema::TYPE_INTEGER,
          "orario_14_30" => Schema::TYPE_INTEGER,
          "orario_14_45" => Schema::TYPE_INTEGER,
          "orario_15_00" => Schema::TYPE_INTEGER,
          "orario_15_15" => Schema::TYPE_INTEGER,
          "orario_15_30" => Schema::TYPE_INTEGER,
          "orario_15_45" => Schema::TYPE_INTEGER,
          "orario_16_00" => Schema::TYPE_INTEGER,
          "orario_16_15" => Schema::TYPE_INTEGER,
          "orario_16_30" => Schema::TYPE_INTEGER,
          "orario_16_45" => Schema::TYPE_INTEGER,
          "orario_17_00" => Schema::TYPE_INTEGER,
          "orario_17_15" => Schema::TYPE_INTEGER,
          "orario_17_30" => Schema::TYPE_INTEGER,
          "orario_17_45" => Schema::TYPE_INTEGER,
          "orario_18_00" => Schema::TYPE_INTEGER,
          "orario_18_15" => Schema::TYPE_INTEGER,
          "orario_18_30" => Schema::TYPE_INTEGER,
          "orario_18_45" => Schema::TYPE_INTEGER,
          "orario_19_00" => Schema::TYPE_INTEGER,
          "orario_19_15" => Schema::TYPE_INTEGER,
          "orario_19_30" => Schema::TYPE_INTEGER,
          "orario_19_45" => Schema::TYPE_INTEGER,
          "orario_20_00" => Schema::TYPE_INTEGER,
          "orario_20_15" => Schema::TYPE_INTEGER,
          "orario_20_30" => Schema::TYPE_INTEGER,
          "orario_20_45" => Schema::TYPE_INTEGER,
          "orario_21_00" => Schema::TYPE_INTEGER,
          "orario_21_15" => Schema::TYPE_INTEGER,
          "orario_21_30" => Schema::TYPE_INTEGER,
          "orario_21_45" => Schema::TYPE_INTEGER,
          "orario_22_00" => Schema::TYPE_INTEGER,
          "orario_22_15" => Schema::TYPE_INTEGER,
          "orario_22_30" => Schema::TYPE_INTEGER,
          "orario_22_45" => Schema::TYPE_INTEGER,
          "orario_23_00" => Schema::TYPE_INTEGER,
          "orario_23_15" => Schema::TYPE_INTEGER,
          "orario_23_30" => Schema::TYPE_INTEGER,
          "orario_23_45" => Schema::TYPE_INTEGER,
          "orario_24_00" => Schema::TYPE_INTEGER,
          "created_at" => Schema::TYPE_DATETIME,
          "updated_at" => Schema::TYPE_DATETIME,
          "created_by" => Schema::TYPE_INTEGER,
          "updated_by" => Schema::TYPE_INTEGER,
          "deleted_by" => Schema::TYPE_INTEGER,
          "deleted_at" => Schema::TYPE_DATETIME,
          "lock" => Schema::TYPE_INTEGER,
        ]);

        $this->createIndex("idx-disponibilita-risorsa_id","{{%disponibilita}}","risorsa_id");
        $this->addForeignKey("fk-disponibilita-risorsa_id","{{%disponibilita}}","risorsa_id","{{%risorsa}}","id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey("fk-disponibilita-risorsa_id","{{%disponibilita}}");
      $this->dropIndex("idx-disponibilita-risorsa_id","{{%disponibilita}}");
      $this->dropTable("{{%disponibilita}}");

      $this->dropForeignKey("fk-prenotazione-user_id","{{%prenotazione}}",);
      $this->dropIndex("idx-prenotazione-user_id", "{{%prenotazione}}");
      $this->dropForeignKey("fk-prenotazione-risorsa_id","{{%prenotazione}}",);
      $this->dropIndex("idx-prenotazione-risorsa_id", "{{%prenotazione}}");
      $this->dropTable("{{%prenotazione}}");

      $this->dropForeignKey("fk-risorsa-struttura_id","{{%risorsa}}",);
      $this->dropIndex("idx-risorsa-struttura_id", "{{%risorsa}}");
      $this->dropTable("{{%risorsa}}");

      $this->dropTable("{{%struttura}}");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200720_094326_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
