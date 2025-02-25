<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Users
            ['name' => 'create-users', 'display_name' => 'إنشاء المستخدمين', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-users', 'display_name' => 'عرض المستخدمين', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-users', 'display_name' => 'تحديث المستخدمين', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-users', 'display_name' => 'حذف المستخدمين', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Roles
            ['name' => 'create-roles', 'display_name' => 'إنشاء الأدوار', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-roles', 'display_name' => 'عرض الأدوار', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-roles', 'display_name' => 'تحديث الأدوار', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-roles', 'display_name' => 'حذف الأدوار', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Blogs
            ['name' => 'create-blogs', 'display_name' => 'إنشاء المدونات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-blogs', 'display_name' => 'عرض المدونات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-blogs', 'display_name' => 'تحديث المدونات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-blogs', 'display_name' => 'حذف المدونات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Offers
            ['name' => 'create-offers', 'display_name' => 'إنشاء العروض', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-offers', 'display_name' => 'عرض العروض', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-offers', 'display_name' => 'تحديث العروض', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-offers', 'display_name' => 'حذف العروض', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Contacts
            ['name' => 'view-contacts', 'display_name' => 'عرض جهات الاتصال', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-contacts', 'display_name' => 'حذف جهات الاتصال', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Services
            ['name' => 'create-services', 'display_name' => 'إنشاء الخدمات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-services', 'display_name' => 'عرض الخدمات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-services', 'display_name' => 'تحديث الخدمات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-services', 'display_name' => 'حذف الخدمات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Testimonials
            ['name' => 'create-testimonials', 'display_name' => 'إنشاء الشهادات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-testimonials', 'display_name' => 'عرض الشهادات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-testimonials', 'display_name' => 'تحديث الشهادات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-testimonials', 'display_name' => 'حذف الشهادات', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Opportunities
            ['name' => 'view-opportunities', 'display_name' => 'عرض الفرص', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-opportunities', 'display_name' => 'حذف الفرص', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Mail Subscriptions
            ['name' => 'view-mail-subscriptions', 'display_name' => 'عرض اشتراكات البريد الإلكتروني', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-mail-subscriptions', 'display_name' => 'حذف اشتراكات البريد الإلكتروني', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Partners
            ['name' => 'create-partners', 'display_name' => 'إنشاء الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-partners', 'display_name' => 'عرض الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-partners', 'display_name' => 'تحديث الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-partners', 'display_name' => 'حذف الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],

            // Clients
            ['name' => 'create-clients', 'display_name' => 'إنشاء الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'view-clients', 'display_name' => 'عرض الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update-clients', 'display_name' => 'تحديث الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete-clients', 'display_name' => 'حذف الشركاء', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
