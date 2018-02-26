
 <!-- reset modal -->
   <div class="modal fade" id="resetPwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <div class="modal-dialog modal-md loginModalWidth" role="document">
       <div class="modal-content">
         <div class="modal-header" style="background-color: #aaa">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title loginModalHeader">Log In</h4>
         </div>
         <div class="modal-body">
           <form class="form-horizontal" method="post" id="resetPwdForm">
             <div class="form-group">
               <label for="oldPassword" class="sr-only control-label">Email<sup>*</sup></label>
               <div class="col-sm-12">
                 <input type="password"  class="form-control" placeholder="Old Password" id="oldPassword" value="<?php echo $oldPassword; ?>" autocomplete="off">  
                  <span class="help-block"><?php echo $oldPassword_err; ?></span>
               </div>
             </div>
             <div class="form-group">
               <label for="newPassword" class="sr-only control-label">New Password<sup>*</sup></label>
               <div class="col-sm-12">
                 <input type="password"  class="form-control" placeholder="New Password" id="newPassword" value="<?php echo $newPassword; ?>"  autocomplete="off">
                  <span class="help-block"><?php echo $newPassword_err; ?></span>
               </div>
             </div>
             <div class="form-group ">
               <label for="confirmPassword" class=" sr-only control-label">New Password<sup>*</sup></label>
               <div class="col-sm-12">
                 <input type="password"  class="form-control" id="confirmPassword" placeholder="Confirm Password" autocomplete="off" value="<?php echo $confirmPassword; ?>">
                 <span class="help-block"><?php echo $pass_err; ?></span>
               </div>
             </div>
             <div id="resetPasswordDiv"></div>
             <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                 <a class="btn btn-primary" onclick="resetPassword();">Reset Password</a>
               </div>
             </div>
         </form>
         </div>
      </div>
     </div>
   </div>
