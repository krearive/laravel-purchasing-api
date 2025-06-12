<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Division;
use App\Models\Item;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // INSERT A DIVISION
        Division::insert([
            [
                'name' => 'Finance',
            ],
            [
                'name' => 'Procurement',
            ],
            [
                'name' => 'HR',
            ],
        ]);

        // INSERT A CATEGORY
        Category::insert([
            [
                'name' => 'Alat Tulis',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'name' => 'Perangkat IT',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'name' => 'Konsumsi',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
        ]);

        // INSERT A ITEM
        Item::insert([
            [
                'code' => 'ITEM001',
                'name' => 'Pulpen',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'code' => 'ITEM002',
                'name' => 'Laptop',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'code' => 'ITEM003',
                'name' => 'Air Mineral',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
        ]);

        // INSERT PURCHASE REQUEST
        PurchaseRequest::insert([
            // January
            [
                'division_id' => 1,
                'doc_no' => 'DOC001',
                'doc_date' => '2025-01-10',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 2,
                'doc_no' => 'DOC002',
                'doc_date' => '2025-01-15',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 3,
                'doc_no' => 'DOC003',
                'doc_date' => '2025-01-20',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            // February
            [
                'division_id' => 1,
                'doc_no' => 'DOC004',
                'doc_date' => '2025-02-05',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 2,
                'doc_no' => 'DOC005',
                'doc_date' => '2025-02-18',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 3,
                'doc_no' => 'DOC006',
                'doc_date' => '2025-02-25',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            // March
            [
                'division_id' => 1,
                'doc_no' => 'DOC007',
                'doc_date' => '2025-03-03',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 2,
                'doc_no' => 'DOC008',
                'doc_date' => '2025-03-12',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'division_id' => 3,
                'doc_no' => 'DOC009',
                'doc_date' => '2025-03-22',
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
        ]);

        // INSERT PURCHASE REQUEST DETAILS
        PurchaseRequestDetail::insert([
            [
                'purchase_request_id' => 1,
                'category_id' => 1,
                'item_id' => 1,
                'qty' => 10,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 1,
                'category_id' => 2,
                'item_id' => 2,
                'qty' => 2,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 2,
                'category_id' => 2,
                'item_id' => 2,
                'qty' => 3,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 3,
                'category_id' => 3,
                'item_id' => 3,
                'qty' => 5,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 4,
                'category_id' => 1,
                'item_id' => 1,
                'qty' => 7,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 5,
                'category_id' => 2,
                'item_id' => 2,
                'qty' => 1,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 6,
                'category_id' => 3,
                'item_id' => 3,
                'qty' => 12,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 7,
                'category_id' => 1,
                'item_id' => 1,
                'qty' => 15,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 8,
                'category_id' => 2,
                'item_id' => 2,
                'qty' => 1,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
            [
                'purchase_request_id' => 9,
                'category_id' => 3,
                'item_id' => 3,
                'qty' => 6,
                'status' => 0,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ],
        ]);
    }
}
