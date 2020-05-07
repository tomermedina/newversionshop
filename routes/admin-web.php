<?php
  // Products
   Route::group(['prefix'=>'admin',],
       function() {
         Route::group(['prefix'=>'qr',],
             function() {
               Route::get('/generate/{valueToGenerate}', 'Admin\QRGeneratorController@generateQRByValue')->name('admin.qr.generator');
               Route::get('/scanner', 'Admin\QRGeneratorController@scannerIndex')->name('admin.qr.scanner');
         });
         Route::group(['prefix'=>'products',],
             function() {
               Route::group(['prefix'=>'type',],
                   function() {
                     Route::post('/new', 'Admin\ProductTypeController@createOrEditProductType')->name('admin.products.type.new');
                     Route::post('/edit', 'Admin\ProductTypeController@createOrEditProductType')->name('admin.products.type.edit');
                     Route::get('/edit/status/{productId}/{status}', 'Admin\ProductTypeController@changeProductTypeStatus')->name('admin.products.type.status.edit');
                     Route::get('/all','Admin\ProductTypeController@getAllType')->name('admin.products.type.all');

               });
               Route::post('/new', 'Admin\ProductController@createOrEditProduct')->name('admin.products.new');
               Route::post('/edit', 'Admin\ProductController@createOrEditProduct')->name('admin.products.edit');
               Route::get('/edit/status/{productId}/{status}', 'Admin\ProductController@changeProductStatus')->name('admin.products.status.edit');
               Route::get('/all/{status}' ,'Admin\ProductController@getAllProductsByStatus')->name('admin.products.all');
               Route::get('/all' ,'Admin\ProductController@getAllProducts')->name('admin.products.all');
               Route::get('/page/{start}/{end}' ,'Admin\ProductController@getPaginatedProducts')->name('admin.products.page');

              Route::get('/image/{productId}', 'Admin\ImageController@getProductImages')->name('admin.products.image');
         });

         Route::group(['prefix'=>'services',],
            function() {
              Route::group(['prefix'=>'type',],
                  function() {
                    Route::post('/new', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.new');
                    Route::post('/edit', 'Admin\ServiceTypeController@createOrEditServiceType')->name('admin.services.type.edit');
                    Route::get('/edit/status/{serviceTypeId}/{status}', 'Admin\ServiceTypeController@changeServiceTypeStatus')->name('admin.services.type.status.edit');
                    Route::get('/all','Admin\ServiceTypeController@getAllType')->name('admin.service.type.all');

              });
              Route::post('/new', 'Admin\ServiceController@createOrEditService')->name('admin.services.new');
              Route::post('/edit', 'Admin\ServiceController@createOrEditService')->name('admin.services.edit');
              Route::get('/edit/status/{serviceId}/{status}', 'Admin\ServiceController@changeServiceStatus')->name('admin.service.status.edit');
              Route::get('/all','Admin\ServiceController@getAllServices')->name('admin.services.all');
              Route::get('/all/{status}','Admin\ServiceController@getAllServicesByStatus')->name('admin.services.all');

              Route::group(['prefix'=>'booking',],
                  function() {
                    Route::get('/all/new', 'Admin\BookingController@getAllNewBookings')->name('front.bookings.new');
              });
         });

         Route::group(['prefix'=>'car',],
           function() {
             Route::post('/new', 'Admin\CarController@createOrEditCar')->name('admin.car.new');
             Route::post('/edit', 'Admin\CarController@createOrEditCar')->name('admin.car.new');
             Route::get('/edit/status/{carId}/{status}', 'Admin\CarController@changeCarStatus')->name('admin.products.car.status.edit');
             Route::get('/all','Admin\CarController@getAllCar')->name('admin.car.all');
             Route::get('/image/{carId}', 'Admin\ImageController@getCarImages')->name('admin.products.image');
        });

         Route::group(['prefix'=>'upload',],
             function() {
              Route::post('/new/image/{type}', 'Admin\ImageController@uploadImage')->name('admin.image.new');
              Route::post('/delete/image/{type}', 'Admin\ImageController@deletetImage')->name('admin.image.delete');
         });
         Route::get('/image/first/{type}/{id}', 'Admin\ImageController@getFirstImage')->name('admin.image.delete');

         Route::group(['prefix'=>'orders',],
             function() {
               Route::get('/all','Admin\OrderController@getAllOrders')->name('admin.orders.all');
               Route::post('/edit/status','Admin\OrderController@changeOrderStatus')->name('admin.orders.status.edit');
               Route::get('/filter/{method}/{filter}','Admin\OrderController@filterOrders')->name('admin.orders.filter');
               Route::get('/items/{orderId}','Admin\OrderController@getOrderItems')->name('admin.orders.items');
               Route::get('/items/total/{orderId}','Admin\OrderController@getOrderTotals')->name('admin.orders.items');

         });
         Route::group(['prefix'=>'checklist',],
             function() {
               Route::post('/new', 'Admin\CheckListController@createOrEditCheckList')->name('admin.checklist.new');
               Route::get('/new/{id}', 'Admin\CheckListController@getChecklistIndex')->name('admin.checklist.index');
               Route::get('/list/all', 'Admin\CheckListController@getChecklistAll')->name('admin.checklist.list');
               Route::get('/details/{checklistId}', 'Admin\CheckListController@getChecklistDetailsIndex')->name('admin.checklist.details.index');
         });
         Route::group(['prefix'=>'job',],
             function() {
               Route::get('/new/{id}', 'Admin\JobOrderController@getJobOrderIndex')->name('admin.job.new.index');
               Route::post('/new', 'Admin\JobOrderController@createJobOrder')->name('admin.job.new');
               Route::get('/list/{filter}', 'Admin\JobOrderController@getJobOrders')->name('admin.job.list');
               Route::get('/list/items/{id}', 'Admin\JobOrderController@getJobOrderItems')->name('admin.job.list');
               Route::get('/details/{jobId}', 'Admin\JobOrderController@getJobOrderDetailsIndex')->name('admin.job.details.index');
               Route::group(['prefix'=>'assignment',],
                   function() {
                     Route::post('/new', 'Admin\JobOrderController@assignJob')->name('admin.assignment.new');
                     Route::post('/evaluate', 'Admin\JobOrderController@evaluateJob')->name('admin.assignment.evaluate');
                     Route::get('/{joId}', 'Admin\JobOrderController@getAssignedEmployee')->name('admin.job.assigned');
                     Route::get('/list/{filter}', 'Admin\JobOrderController@getAssignmentList')->name('admin.job.assignment.list');

               });
         });
         Route::group(['prefix'=>'invoice',],
             function() {
               Route::get('/new/{id}', 'Admin\InvoiceController@getInvoiceIndex')->name('admin.invoice.index');
               Route::post('/new', 'Admin\InvoiceController@createInvoice')->name('admin.invoice.new');
               Route::get('/list/all', 'Admin\InvoiceController@getAllInvoiceList')->name('admin.invoice.list');
               Route::get('/details/{invoiceId}', 'Admin\InvoiceController@getInvoiceDetails')->name('admin.invoice.list');
         });

         Route::group(['prefix'=>'employee',],
             function() {
               Route::get('/list/{status}', 'Admin\EmployeeController@getEmployeeByStatus')->name('admin.employee.list');
         });
         // dashboard
         // parts-and-materials-inventory
         //vehicle-check-list
         // booked-services-summary
         // invoicing
         Route::get('/page/{pageName}', 'Admin\BladePagesController@getAdminBladeIndex')->name('admin.blade.pages.index');
         Route::get('/home', 'Admin\BladePagesController@getAdminHomeIndex')->name('admin.blade.home.index');
         Route::post('/login', 'Admin\PanelUserController@validateAccount')->name('admin.users.login');

         Route::group(['prefix'=>'pdf',],
             function() {
               Route::get('/invoice', 'Admin\PDFController@generateInvoicePDF')->name('admin.pdf.invoice');
               Route::get('/checklist', 'Admin\PDFController@generateChecklistPDF')->name('admin.pdf.checklist');
         });
   });


   Route::get('/page/job-order', function(){
     return view('admin.pages.job-order');
   });

   Route::get('/pages/service-warranty', function(){
     return view('admin.pages.service-warranty');
   });

   Route::get('/pages/releasing-module', function(){
     return view('admin.pages.releasing-module');
   });

   Route::get('/pages/featured-products', function(){
     return view('admin.pages.featured-products');
   });

   Route::get('/pages/promo-and-sales', function(){
     return view('admin.pages.promo-and-sales');
   });
