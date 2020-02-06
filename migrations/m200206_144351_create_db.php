<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m200206_144351_create_db
 */
class m200206_144351_create_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("language", [
            "language_id" => $this->primaryKey(),
            "code" => $this->string()->notNull(),
            "name" => $this->string()->notNull()
        ]);
        $this->createTable("city", [
            "city_id" => $this->primaryKey(),
            "name" => $this->string()->notNull()
        ]);
        $this->createTable("point", [
            "point_id" => $this->primaryKey(),
            "city_id" => $this->integer()->notNull(),
            "language_id" => $this->integer()->notNull(),
            "name" => $this->string()->notNull()
        ]);
        $this->addForeignKey("city_id", "point", "city_id", "city", "city_id", "RESTRICT");
        $this->addForeignKey("language_id", "point", "language_id", "language", "language_id", "RESTRICT");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200206_144351_create_db cannot be reverted.\n";
        $this->dropForeignKey("city_id", "point");
        $this->dropForeignKey("language_id", "point");
        $this->dropTable("language");
        $this->dropTable("city");
        $this->dropTable("point");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200206_144351_create_db cannot be reverted.\n";

        return false;
    }
    */
}
