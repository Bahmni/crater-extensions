<?php

namespace Database\Seeders;

use Crater\Models\CustomField;
use Illuminate\Database\Seeder;

class CustomFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(CustomField::count())) {

            $custom_fields = json_decode(file_get_contents(
                "database/seeders/json/custom_fields.json"
            ), true);
            foreach ($custom_fields as $custom_field) {
                CustomField::create([
                    'name' => $custom_field['name'],
                    'slug' => $custom_field['slug'],
                    'label' => $custom_field['label'],
                    'model_type' => $custom_field['model_type'],
                    'type' => $custom_field['type'],
                    'is_required' => $custom_field['is_required'],
                    'order' => $custom_field['order'],
                    'company_id' => $custom_field['company_id'],
                ]);
            }
        }
    }
}
