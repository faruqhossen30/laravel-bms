<div class="modal fade" id="betModal" tabindex="-1" role="dialog" aria-labelledby="bet" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="modelHeading">Place Bet</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" style="margin: 2%;">
            <form method="post" action="{{ route('user.bet') }}" enctype="multipart/form-data" style="padding: 0;box-shadow: none">
               {{csrf_field()}}
               <div class="signup-form">
                  <div id="formData">
                     <div class="bit_dtl">
                        <span class="optionTitle"></span>
                        <span class="status badge rounded-0 badge-danger text-capitalize"></span>
                        <br>
                        <span class="questionName"></span>
                        <br>
                        <span class="optionName"></span> <span class="ratio badge rounded badge-info"></span>
                     </div>
                     <input type="hidden" name="option_id" id="option_id">
                     <div class="purches1">
                        <label>
                           <input type="radio" class="plan_name" name="amount" id="amount" value="100" checked>
                           <p> 100 </p>
                        </label>
                        <label>
                           <input type="radio" class="plan_name" name="amount" id="amount" value="500">
                           <p> 500 </p>
                        </label>
                        <label>
                           <input type="radio" class="plan_name" name="amount" id="amount" value="1000">
                           <p> 1000 </p>
                        </label>
                        <label>
                           <input type="radio" class="plan_name" name="amount" id="amount" value="3000">
                           <p> 3000 </p>
                        </label>
                        <label>
                           <input type="radio" class="plan_name" name="amount" id="amount" value="5000">
                           <p> 5000 </p>
                        </label>
                     </div>
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control selected_plan" step="any" min="20" name="predict_amount" value="" id="inputAmount">
                  </div>
                  <div class="total_tk">
                     <div class="total_tk_txt">
                        <p>Total Stake</p>
                        <p>Possible Winning</p>
                     </div>
                     <div class="total_tk_amount">
                        <span class="stake"></span>
                        <br>
                        <span class="retunt"></span>
                     </div>
                     <div class="clr"></div>
                  </div>
                  <div class="form-group">
                     <button type="submit" id="userSignIn" name="registration" class="btn btn-success btn-lg btn-block mh-color"> Submit </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>