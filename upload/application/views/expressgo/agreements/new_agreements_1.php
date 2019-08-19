<?php defined('BASEPATH') OR exit('Not found'); ?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="header">
						<h4 class="title"><?=$this->lang->line('new_agreement');?></h4>
					</div>
					<div class="content">
						<?php echo form_open_multipart('agreement/new/step2'); ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><?=$this->lang->line('start_date');?></label>
									<input type="date" id="n_from" name="from" value="" class="form-control border-input">
									<?php echo form_error('from', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><?=$this->lang->line('end_date');?></label>
									<input type="date" min="" id="n_to" name="to" value="" class="form-control border-input">
									<?php echo form_error('to', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label><?=$this->lang->line('branch');?></label>
									<select name="branch" id="n_agreements_branch" class="form-control border-input">
										<option value="0"></option>
										<?php
										if(!empty($branch)){
											foreach($branch as $_branch){
												?>

												<option value="<?=$_branch['id'];?>"><?=$_branch['name'];?></option>
												<?php } }?>
											</select>
										</div>
									</div>
								</div>
								<label><?=$this->lang->line('available_vehicles');?></label>
								<table class="table table-striped" id="n_agreements_vehicles">
									<thead>
										<tr>
											<th>#</th>
											<th><?=$this->lang->line('license_plate');?></th>
											<th><?=$this->lang->line('make_model');?></th>
											<th><?=$this->lang->line('year');?></th>
											<th><?=$this->lang->line('class');?></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<input type="hidden" name="vehicle_id" id="vehicle_id"/>
								<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd"><?=$this->lang->line('continue');?></button>
								</div>
								<div class="clearfix"></div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
