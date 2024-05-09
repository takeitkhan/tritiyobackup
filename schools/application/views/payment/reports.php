<div class="row">
    <div class="row col-md-12 col-xs-12 col-sm-12">
        <?php echo form_start_divs('Payment Reports', 'Payment Reports'); ?>        
                  
          <?php if ($results): //owndebugger($students); ?>
              <div id="printresults" class="">
                  <div id="modifyresult" class="">
                      <form method="post" action="result_processor">
                          <table id="table" class="table table-bordered">
                              <tr id="tr">
                                  <th id="td">Payment ID</th>
                                  <th id="td">Payment Type</th>
                                  <th id="td">Ledger Name</th>
                                  <th id="td">Income</th>
                                  <th id="td">Expense</th>
                                  <th id="td">Transaction With</th>
                                  <th id="td">Payment Date</th>
                                  <th id="td">Note</th>
                                  <th id="td">Payment Method</th>
                                  <th id="td">Mobile Number</th>
                                  <th id="td">Transaction ID</th>
                              </tr>    
                              <?php
								$incomes = array();
								$expenses = array();
								foreach ($results as $row) { 
                              ?>
                                  <tr>                              
                                      <td><?php echo $row->PaymentId ?? NULL; ?></td>
                                      <td><?php echo $row->PaymentType ?? NULL; ?></td>
                                      <td><?php echo tableSingleColumn('acc_ledgernames', 'LedgerNameBn', ['TypeId' => $row->LedgerNameId]); ?></td>
                                      <td>
                                        <?php
  											if($row->PaymentType == 'Income') {
  												echo $incomes[] = $row->Amount ?? NULL; 
  											}
                                        ?>
                                      </td>
                                      <td>
                                        <?php
  											if($row->PaymentType == 'Expense') {
  												echo $expenses[] = $row->Amount ?? NULL; 
  											}
                                        ?>
                                      </td>
                                      <td><?php echo $row->TransactionWith ?? NULL; ?></td>
                                      <td><?php echo date('H:i:s d-M-Y',  $row->PaymentDate+36000) ?? NULL; ?></td>
                                      <td><?php echo $row->AdditionalNote ?? NULL; ?></td>
                                      <td>
                                        <?php
                                  			echo $pay_method[$row->PaymentMethod];                                  			
                                        ?>
                                      </td>
                                      <td><?php echo $row->TransactionMobileNumber ?? NULL; ?></td>
                                      <td><?php echo $row->TransactionId ?? NULL; ?></td>                              
                                  </tr>							
                              <?php } ?>
                              <tr id="tr">
                                <th colspan="3">Total Income</th>
                                <th id="td"><?php echo array_sum($incomes); ?></th>
                                <th colspan="7"></th>
                              </tr> 
                              <tr id="tr">
                                <th colspan="3">Total Expense</th>
                                <th id="td"></th>
                                <th id="td"><?php echo array_sum($expenses); ?></th>
                                <th colspan="6"></th>
                              </tr> 
                              <tr id="tr">
                                <th colspan="3">Total Profit</th>                                
                                <th id="td"><?php echo array_sum($incomes) - array_sum($expenses); ?></th>
                                <th colspan="7"></th>
                              </tr> 
                            
                            
                          </table>
                      </form>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-xs-12">
                      <ul class="pagination" style="display: table;margin:auto;">
                          <li class="for_active">
                              <?php //echo $paging; ?>
                          </li>
                      </ul>
                  </div>
              </div>
          <?php endif; ?>
      </div>
  	<?php echo form_end_divs(); ?>
</div>
<style>
    .modal-body {
        overflow-x: auto;
    }
</style>
