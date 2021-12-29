 <?= $this->extend('layouts/main') ?>
 <?= $this->section('content') ?>
 <?php $config = config('Site'); ?>
 <div class="container">
   <div class="row">
     <div class="col-12 col-sm-12 col-md-12 mt-5 pt-3 pb-3 bg-white mb-5 shadow">
       <div class="container">
         <h4 class="d-flex-inline text-center text-sm-left">
           <div class="width-100 d-inline-block mr-2"><img src="<?= base_url(); ?>/public_html/assets/images/<?= $config->siteDefaultDP ?>" alt="..." class="img-thumbnail rounded-circle"></div><span class="text-info"><?= $user->firstname . ' ' . $user->lastname ?></span>
         </h4>
         <hr>
         <?php if (session()->get('success')) : ?>
           <div class="alert alert-success" role="alert">
             <?= session()->get('success') ?>
           </div>
         <?php endif; ?>
         <form class="mt-3 mt-sm-5" action="<?= base_url(); ?><?= (session()->get('role') == "admin" || session()->get('role') == "super-admin") ? "/admin" : ((session()->get('role') == "staff") ? "/home" : "/dashboard") ?>/profile" method="post">
           <div class="row">
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="firstname">First Name</label>
                 <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname', $user->firstname) ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="lastname">Last Name</label>
                 <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname', $user->lastname) ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="email">Email address</label>
                 <input type="text" class="form-control" readonly id="email" value="<?= set_value('email', $user->email) ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="email">Phone Number</label>
                 <input type="text" class="form-control" readonly id="phone_number" value="<?= set_value('phone_number', $user->phone_number) ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="email">Home Address</label>
                 <input type="text" class="form-control" name="address1" id="address1" placeholder="Enter Your Full Address" value="<?= set_value('address1', isset($address[0]->address1) ? $address[0]->address1 : "") ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                 <label for="email">Office Address</label>
                 <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Your Full Address" value="<?= set_value('address2', isset($address[0]->address2) ? $address[0]->address2 : "") ?>">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                 </div>
                 <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="password" id="password" value="">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                 </div>
                 <input type="password" class="form-control" placeholder="Confirm Password" aria-label="password_confirm" aria-describedby="basic-addon1" name="password_confirm" id="password_confirm" value="">
               </div>
             </div>
             <?php if (isset($validation)) : ?>
               <div class="col-12">
                 <div class="alert alert-danger" role="alert">
                   <?= $validation->listErrors() ?>
                 </div>
               </div>
             <?php endif; ?>
           </div>

           <div class="row my-3">
             <div class="col-6">
               <a href="<?= base_url(); ?>/home" class="btn btn-danger btn-block mb-1"><i class="fa fa-history mr-2" aria-hidden="true"></i>Back</a>
             </div>
             <div class="col-6">
               <button type="submit" class="btn btn-info btn-block mb-1 tcolor-1"><i class="fa fa-save mr-2" aria-hidden="true"></i>Save</button>
             </div>

           </div>
         </form>
       </div>
     </div>
   </div>
 </div>

 <?= $this->endSection() ?>