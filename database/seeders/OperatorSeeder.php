<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operators = [
          [
              'name' => 'operator2',
              'password' => 'operator2',
              'role' => 2
          ],
          [
              'name' => 'operator3',
              'password' => 'operator3',
              'role' => 2
          ],
          [
              'name' => 'operator4',
              'password' => 'operator4',
              'role' => 2
          ],
          [
              'name' => 'operator5',
              'password' => 'operator5',
              'role' => 2
          ],
          [
              'name' => 'operator6',
              'password' => 'operator6',
              'role' => 2
          ],
          [
              'name' => 'operator7',
              'password' => 'operator7',
              'role' => 2
          ],
          [
              'name' => 'operator8',
              'password' => 'operator8',
              'role' => 2
          ],
          [
              'name' => 'operator9',
              'password' => 'operator9',
              'role' => 2
          ],
          [
              'name' => 'operator10',
              'password' => 'operator10',
              'role' => 2
          ],
          [
              'name' => 'operator11',
              'password' => 'operator11',
              'role' => 2
          ],
          [
              'name' => 'operator12',
              'password' => 'operator12',
              'role' => 2
          ],
          [
              'name' => 'operator13',
              'password' => 'operator13',
              'role' => 2
          ],
          [
              'name' => 'operator14',
              'password' => 'operator14',
              'role' => 2
          ],
          [
              'name' => 'operator15',
              'password' => 'operator15',
              'role' => 2
          ],
          [
              'name' => 'operator16',
              'password' => 'operator16',
              'role' => 2
          ],
          [
              'name' => 'operator17',
              'password' => 'operator17',
              'role' => 2
          ],
          [
              'name' => 'operator18',
              'password' => 'operator18',
              'role' => 2
          ],
          [
              'name' => 'operator19',
              'password' => 'operator19',
              'role' => 2
          ],
          [
              'name' => 'operator20',
              'password' => 'operator20',
              'role' => 2
          ],
          [
              'name' => 'operator21',
              'password' => 'operator21',
              'role' => 2
          ],
          [
              'name' => 'operator22',
              'password' => 'operator22',
              'role' => 2
          ],
          [
              'name' => 'operator23',
              'password' => 'operator23',
              'role' => 2
          ],
          [
              'name' => 'operator24',
              'password' => 'operator24',
              'role' => 2
          ],
        ];

        foreach ($operators as $operator) {
            User::create([
                'name' => $operator['name'],
                'password' => bcrypt($operator['password']),
                'role_id' => $operator['role']
            ]);
        }
    }
}
