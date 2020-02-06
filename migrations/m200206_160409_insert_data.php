<?php

use yii\db\Migration;

/**
 * Class m200206_160409_insert_data
 */
class m200206_160409_insert_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert("language", ["name" => "Английский", "code" => "en"]);
        $this->insert("language", ["name" => "Русский", "code" => "ru"]);
        $this->insert("city", ["name" => "Пермь"]);
        $this->insert("city", ["name" => "Москва"]);
        $this->insert("city", ["name" => "Челябинск"]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200206_160409_insert_data cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200206_160409_insert_data cannot be reverted.\n";

        return false;
    }
    */
}
