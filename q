[33mcommit fca4acff1053a7522dc970777b3cae6c6ed788e4[m[33m ([m[1;36mHEAD -> [m[1;32mmaster[m[33m)[m
Author: Handika Dwi Julianto <dadangsukatoro@gmail.com>
Date:   Wed Jun 13 13:03:20 2018 +0700

    Omit the else statement

[1mdiff --git a/app/Http/Controllers/TransactionDetailController.php b/app/Http/Controllers/TransactionDetailController.php[m
[1mindex 34def50..42521ce 100644[m
[1m--- a/app/Http/Controllers/TransactionDetailController.php[m
[1m+++ b/app/Http/Controllers/TransactionDetailController.php[m
[36m@@ -28,18 +28,16 @@[m [mclass TransactionDetailController extends Controller[m
                 $kode = "TR" . date('ym') . '001';                [m
                 return $kode;[m
             }[m
[31m-            else [m
[31m-            {[m
[31m-                $transactionid = substr($transactionselect->id_transaksi, 6);[m
[31m-                $transactionid = (int)$transactionid;[m
[31m-                $transactionid++;[m
[32m+[m[41m            [m
[32m+[m[32m            $transactionid = substr($transactionselect->id_transaksi, 6);[m
[32m+[m[32m            $transactionid = (int)$transactionid;[m
[32m+[m[32m            $transactionid++;[m
 [m
[31m-                // Conjure automatic code[m
[31m-                $data =  sprintf('%03d', $transactionid);[m
[31m-                $kode = $kdotomatis . $data;[m
[31m-                [m
[31m-                return $kode;[m
[31m-            } // end of else[m
[32m+[m[32m            // Conjure automatic code[m
[32m+[m[32m            $data =  sprintf('%03d', $transactionid);[m
[32m+[m[32m            $kode = $kdotomatis . $data;[m
[32m+[m[41m            [m
[32m+[m[32m            return $kode;[m
 [m
         } // end of if(empty $kode) [m
     }[m
