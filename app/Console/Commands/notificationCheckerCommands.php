<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class notificationCheckerCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notification-checker-commands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notification alerts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $selectAdmin = DB::table('admins')->get();
        
      foreach ($selectAdmin as $admin)  
      {

      $nearExpiryItems = DB::table('stock_records')
                          ->whereDate('item_expDate', '<=', now()->addDays(30))
                          ->get();

      $outOfStockItems = DB::table('stock_records')
                          ->where('item_qtv', '=', 0)
                          ->get();

      $notifications = [];

      if (!$outOfStockItems->isEmpty()) {
          foreach ($outOfStockItems as $item) {
              array_push($notifications, "Out of stock: " . $item->item_name);
          }
      } else {
          return redirect()->back()->with('error_message','Not Data Founded');
      }

      if (!$nearExpiryItems->isEmpty()) {
          foreach ($nearExpiryItems as $item) {
              array_push($notifications, "This item is near by expire: " . $item->item_name);
          }
      } else {
          return redirect()->back()->with('error_message','Not Data Founded');
      }

      foreach ($notifications as $notification) {
          DB::table('notifications')->insert([
              'message'     => $notification,
              'read_status' => 0,
              'readByAdmin' => $admin->id,
              'created_at'  => NOW(),
              'updated_at'  => NOW(),
          ]);
      }
    }
    //
    $selectEmployee = DB::table('employees')->get();
      
      foreach ($selectEmployee as $selectEmployees)  
      {

      $nearExpiryItems = DB::table('stock_records')
                          ->whereDate('item_expDate', '<=', now()->addDays(30))
                          ->get();

      $outOfStockItems = DB::table('stock_records')
                          ->where('item_qtv', '=', 0)
                          ->get();

      $notifications = [];

      if (!$outOfStockItems->isEmpty()) {
          foreach ($outOfStockItems as $item) {
              array_push($notifications, "Out of stock: " . $item->item_name);
          }
      }

      if (!$nearExpiryItems->isEmpty()) {
          foreach ($nearExpiryItems as $item) {
              array_push($notifications, "This item is near by expire: " . $item->item_name);
          }
      }

      foreach ($notifications as $notification) {
          DB::table('notifications')->insert([
              'message'     => $notification,
              'read_status' => 0,
              'readByAdmin' => $selectEmployees->id,
              'created_at'  => NOW(),
              'updated_at'  => NOW(),
          ]);
      }
  }  
  }
}
