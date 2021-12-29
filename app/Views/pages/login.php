 <?= $this->extend('layouts/main') ?>

 <?= $this->section('content') ?>

 <?php $config = config('Site'); ?>

 <body style="background-image: url('./public_html/assets/images/<?= $config->LoginBackgroundImage ?>') !important; background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center center;
">
   <div class="container ">
     <div class="row full-height">
       <div class="col-12 col-xl-4 col-md-6 col-sm-9 bg-white mx-auto my-auto">
         <div class="container  py-3">
           <h2 class="text-center py-3 brand-logo"> <?= $config->siteName ?></h2>
           <hr>
           <?php if (session()->get('success')) : ?>
             <div class="alert alert-success" role="alert">
               <?= session()->get('success') ?>
             </div>
           <?php endif; ?>
           <form class="" action="<?= base_url(); ?>/authenticate" method="post">

             <div class="input-group mb-3 rounded-0">
               <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-user tcolor-2"></i></span>
               </div>
               <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" id="email" value="<?= set_value('email') ?>">
             </div>

             <div class="input-group mb-3">
               <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-key tcolor-2"></i></span>
               </div>
               <input type="password" class="form-control" placeholder="Password" aria-label="email" aria-describedby="basic-addon1" name="password" id="password" value="">
             </div>

             <?php if (isset($validation)) : ?>
               <div class="">
                 <div class="alert alert-danger" role="alert">
                   <?= $validation->listErrors() ?>
                 </div>
               </div>
             <?php endif; ?>
             <div class="row">
               <div class="col-12 mb-1">
                 <button type="submit" class="btn btn-primary btn-block mb-1 tcolor-1">Login</button>
               </div>
               <div class="col-12 text-center d-none">
                 <a href="<?= base_url(); ?>/register">Don't have an account yet?</a>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
   <?= $this->endSection() ?>