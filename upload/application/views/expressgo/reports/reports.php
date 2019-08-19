<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="header">
						<h4 class="title"><?=$this->lang->line('reports');?></h4>
					</div>

					<div class="content">

						<?php echo form_open('reports'); ?>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div>
										<label><?=$this->lang->line('report_type');?></label>
										<select name="report_type" class="form-control border-input">
											<option></option>
											<option value="rentals"><?=$this->lang->line('rentals');?></option>
											<option value="payments"><?=$this->lang->line('payments');?></option>
											<option value="vehicle_list"><?=$this->lang->line('vehicle_list');?></option>
											<option value="vehicle_on_rent"><?=$this->lang->line('vehicle_on_rent');?></option>
											<option value="vehicle_available"><?=$this->lang->line('vehicle_available');?></option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<div>
										<label><?=$this->lang->line('start_date');?></label>
										<input type="date" name="date_from" value="" class="form-control border-input" placeholder="">
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<div>
										<label><?=$this->lang->line('end_date');?></label>
										<input type="date" name="date_to" value="" class="form-control border-input" placeholder="">
									</div>
								</div>
							</div>

							<div class="text-center">
								<button type="submit" name="confirm" class="btn btn-info btn-fill btn-wd" ><?=$this->lang->line('get_report');?></button>
							</div>

						</div>
						<?php echo form_close();?>




						<div class="row">
							<div class="col-md-12">
								<div class="content table-responsive table-full-width">
									
										<?=$result;?>
								</div>
							</div>  
						</div>



					</div>


				</div>
			</div>
		</div>


	</div>
</div>


</div>




